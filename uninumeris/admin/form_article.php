<?php 
require_once("../include/init.inc.php");
/*Verification des champs du formulaire
-> parcourir dejà la BDD et repertorier les champs à utiliser
Table article 
_idArticle à ignorer 
_title -< pour le titre à mettre en anglais 
_content
*/
// Ici j'affiche les infos que récupère grâce à la methode "post" du formulaire. Ceci m'aide à voir que mon formulaire envoie bien les données saisies
 echo '<pre style="background:DarkSlateGray;color:white;" >';
 var_dump($_POST);
 echo '</pre>';
 extract($_POST);
// je créé ma variable d'affichage
$msgArtTitleError = "";
$msgContentError = "";
$msgDateArtError = "";
$msgFNameAuteurArtError = "";
$msgLNameAuteurArtError = "";
$msgEmailAuteurArtError = "";
$msgPhotoArticleError = "";
$msgLinkArticleError = "";

// Je vérifie les champs de mon formulaire

// Ajout et modification Article 
// a_Je recupere les infos pour la modification.
if(isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id']) ){
    $modifier = $bdd->prepare("SELECT * FROM article WHERE idArticle = :idArticle");
    $modifier->bindValue(':idArticle', $_GET['id'], PDO::PARAM_INT);
    $modifier->execute();
    
    if($modifier->rowCount() > 0 ){
        // Je recupere les informations en bdd pour afficher dans le formulaire de modification
        $modif = $modifier->fetch(PDO::FETCH_ASSOC);
    }
}//Fin if(isset($_GET['action']) && $_GET['action']

// b Traitement du formulaire pour insertion
 if ($_POST) {

    // Je vérifie que chaque champs n'esxistent pas ou bien qu'il ne correspondent pas à ce que j'attend. Dans ce cas un message d'erreur sera affiché.
    if (empty($artTitle) || iconv_strlen($artTitle) > 255) {
     $msgArtTitleError .= '<span class="text-danger text-center"> ** Veuillez saisir votre titre entre  et 50 caractères</span>';
     } // FIN if (empty($_POST['title'])

     if (empty($_POST['linkArticle']) || !preg_match('#^(http|https)://[\w-]+[\w.-]+\.[a-zA-Z]{2,6}#i', $_POST['linkArticle'])) {
         $msgLinkArticleError .= '<span class="text-danger text-center"> ** Veuillez mettre URL valide</span>';
     } // FIN if (empty($_POST['linkArticle'])
// ********************************************************************************************************************
     if (empty($_POST['photoArticle'])) {
         $msgPhotoArticleError .= '<span class="text-danger text-center"> ** Veuillez mettre image valide</span>';
    }  // FIN if (empty($_POST['photo'])

    /***************************INSERTION DE PHOTO*******************************/
     if (!empty($_FILES['img']['name'])) 
                // on vérifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploader une photo

             {
                 $photoArticle = $reference . '-' . $_FILES['img']['name']; 
                 // on redéfinit le nom de la photo en concaténant la référence saisi dans le formulaire avec le nom de la photo
                echo $photoArticle . '<br>';
                 $photoArticle_bdd = URL . "photo/$photoArticle"; // on définit l'URL de la photo, c'est ce que l'on conservera en BDD
                echo $photo_bdd . '<br>';
                 $photo_dossier = RACINE_SITE . "img/$nom_photo"; // on définit le chemin physique de la photo sur le disque dur du serveur, c'est ce qui nous permettra de copier la photo dans le dossier photo
                 echo $photo_dossier . '<br>';
                 copy($_FILES['photo']['tmp_name'], $photo_dossier); // copy() est une fonction prédéfinie qui permet de copier la photo dans le dossier photo. arguments: copy(nom_temporaire_photo, chemin de destinati


    /***************************Fin D'INSERTION DE PHOTO*******************************/
// ********************************************************************************************************************
     if (empty($_POST['content'])) {
         $msgContentError.= '<span class="text-danger text-center"> ** Veuillez saisir votre article</span>';
     }  // FIN if (empty($_POST['content'])

    // Champ fNameAuteurArt
     if (empty($_POST['fNameAuteurArt']) || iconv_strlen($_POST['fNameAuteurArt']) < 2 || iconv_strlen($_POST['fNameAuteurArt']) > 255) {
         $msgFNameAuteurArtError.= '<span class="text-danger text-center"> ** Veuillez saisir votre prenom entre 7 et 255 caractères</span>';
     } // FIN if (empty($_POST['fNameAuteurArt'])
    // Champ nom
    if (empty($_POST['lNameAuteurArt']) || iconv_strlen($_POST['lnameAuteurArt']) < 2 || iconv_strlen($_POST['lnameAuteurArt']) > 50) {
         $msgLNameAuteurArtError .= '<span class="text-danger text-center"> ** Veuillez saisir votre nom entre 7 et 255 caractères</span>';
     } // FIN if (empty($_POST['fNameAuteurArt'])


    // SI VERIFIE => 
    // si Je n'ai pas de message d'erreur j'effectue l'insertion à ma BDD 
     if (empty($msgArtTitleError || $msgLinkArticleError || $msgPhotoArticleError || $msgContentError || $msgArtTitleError || $msgFNameAuteurArtError || $msgLNameAuteurArtError || $msgEmailAuteurArtError)) {
        
        
        
    // a) assainissement des saisies de l'intertnaute
     foreach ($_POST as $indice => $valeur) {$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);}
         $requet = $bdd->prepare("REPLACE INTO article VALUES (:idArticle, :artTitle, :content, :dateArt, :fNameAuteurArt, :lnameAuteurArt, :photoArticle, :linkArticle)", array(
             ':idArticle' => $_POST['idArticle'],
             ':artTitle'  => $_POST['artTitle'],
             ':content'   => $_POST['content'],
             ':dateArt'   => $_POST['dateArt'],
             ':fNameAuteurArt' => $_POST['fNameAuteurArt'],
             ':lnameAuteurArt' => $_POST['lnameAuteurArt'], 
             ':photoArticle' => $_POST['photoArticle'],
             ':linkArticle' => $_POST['linkArticle'],

         ));
    
        // J'associe les les valeurs saisies dans le  formulaire avec les marqueurs de securité php (:title,:content,:link, :photo)")
         $requet->bindParam(':idArticle', $_POST['idartTitle']);
         $requet->bindParam(':artTitle', $_POST['artTitle']);
         $requet->bindParam(':content', $_POST['content']);
         $requet->bindParam(':dateArt', $_POST['dateArt']);
         $requet->bindParam(':fNameAuteurArt', $_POST['fNameAuteurArt']);
         $requet->bindParam(':lNameAuteurArt', $_POST['lNameAuteurArt']);
         $requet->bindParam(':emailAuteurArt', $_POST['emailAuteurArt']);
         $requet->bindParam(':linkArticle', $_POST['linkArticle']);
        $requet->bindParam(':photoArticle', $_POST['photoArticle']);
        // J'éxecute l'insertion en BDD
         $requet->execute();
     } 
     //Fin if (empty($msg_title || $msg_content || $msg_link || $msg_photo))

 } 
 } 

//Fin de $_POST 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Lien fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Lien CDN bootswatch -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">
    <!-- Lien CSS personel -->
    <link rel="stylesheet" href="../css/style_admin.css">
    <title>siteDeFinDeFormation</title>
</head>
<body>  
    
    
    <!-- Une condition pour eviter qu'on sache que nous sommes sur une même page -->
    <div class="container">
    <?php if(isset($_GET['action']) && $_GET['action'] == 'modifier'){ ?>
    <h1 class="text text-center mb-5 text-warning">Modifier votre article</h1>
    <?php }else{ ?>
    <h1 class="text text-center mb-5 text-success">Ajouter un article</h1>
   <?php } ?>
    <!-- Fin de la condition  -->
    <a href="gestion_article.php" class="return" title="retour"><i
            class="fas fa-hand-point-left fa-2x text-dark"></i></a>
    <form class="col-md-6 offset-3" method="post">
        <div class="col" >
            <input type="hidden" name="idArticle" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modifier' ){
                        echo $modif['idArticle'];}else{echo "0";} ?>">
        </div>
        <!-- 1 -->
        <div class="row mt-3">
            <div class="col-md-12 text-center ">
                <?= $msgArtTitleError; ?>
            </div>
            <div class="col">
                <input type="text" class="form-control text-center rounded-pill border border-primary hover" name="artTitle"
                    placeholder="titre" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modifier' ){
                        echo $modif['artTitle'];}else{echo "0";} ?>">
            </div>
        </div>

        <!-- photo ------------------------------------------------------------------------------------------>
        <!-- Debut div row photo link -->
        <div class="row">
            <div class="col mb-3 mt-3">
                  
                <?= $msgPhotoArticleError; ?>
                <label for="photo"></label>
                <?php if (!empty($photoArticle)) : ?>
                <img src="<?= $photoArticle?>" alt="" class="card-img-top" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modifier' ){echo $modif['photoArticle'];}else{echo "";} ?>">
                <?php else : ?>
                <input type="file" aria-describedby="" name="photoArticle" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modifier' ){echo $modif['photoArticle'];}else{echo "";} ?>">
                <?php endif; ?>
            </div>
            <!-- ------------------------- ------------------------------------------------------>
            <div class="col mb-3 mt-3 ">
                  
                    <?= $msgLinkArticleError; ?>
                <input type="text" class="form-control text-center rounded-pill border border-primary hover" name="linkArticle"
                    placeholder="link" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modifier' ){
                        echo $modif['linkArticle'];}else{echo "";} ?>">
            </div>
        </div>
        <!-- Fin div row photo et link  -->
        
        <!-- Content -->
        <div class="mb-3 mt-3">
            <?= $msgContentError; ?>
            <textarea class="form-control text-center border border-primary rounded" id="validationTextarea"
                name="content" placeholder="Contenu de l'article" value=""><?php if(isset($_GET['action']) && $_GET['action'] == 'modifier' ){
                        echo $modif['content'];}else{echo "";} ?></textarea>
            <div class="invalid-feedback">
            </div>
        </div>

        <!-- Date -->
        <div class="mb-3 mt-3 offset-4">
            <input class="mb-3 mt-3" type="date" max="2020-06-25" min="2019-03-30" name="dateArt" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modifier' ){
                        echo $modif['dateArt'];}else{echo "";} ?>">
            <?= $msgDateArtError; ?>
            <div class="invalid-feedback"></div>
        </div>
        <!-- firstname -->

        <div class="row mt-3">
            <label for="">Prenom</label>
            <div class="col-md-12 text-center ">
                <?= $msgFNameAuteurArtError ; ?>
            </div>
            <div class="col mt-3">
                <input type="text" class="form-control text-center rounded-pill border border-primary hover" name="fNameAuteurArt"
                    placeholder="First Name" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modifier' ){
                        echo $modif['fNameAuteurArt'];}else{echo "";} ?>">
            </div>
        </div>
        <!-- lastname -->

        <div class="row mt-3">
        <label for="">Nom</label>
            <div class="col-md-12 text-center ">
                <?= $msgLNameAuteurArtError; ?>
            </div>
            <div class="col">
                <input type="text" class="form-control text-center rounded-pill border border-primary hover" name="lNameAuteurArt"
                    placeholder="Last name" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modifier' ){
                        echo $modif['lNameAuteurArt'];}else{echo "";} ?>">
            </div>
        </div>
        <!-- Submit -->
        <div class="row mt-3 offset-4">
            <div class="col">
                <button type="submit"class="btn btn-lg btn-outlines-secondary border border-secondary hover rounded-pill" value="envoeyr">Validez</button>
            </div>
    </form>
</div>
<!-- Lien CDN JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
</div>
</body>
</html>   