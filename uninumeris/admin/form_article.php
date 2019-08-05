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
if ($_POST) {

    // Je vérifie que chaque champs n'esxistent pas ou bien qu'il ne correspondent pas à ce que j'attend. Dans ce cas un message d'erreur sera affiché.
    if (empty($artTitle) || iconv_strlen($artTitle) < 7 || iconv_strlen($artTitle) > 100) {
        $msgArtTitleError .= '<span class="text-danger text-center"> ** Veuillez saisir votre titre entre 7 et 50 caractères</span>';
    } // FIN if (empty($_POST['title'])

    if (empty($_POST['linkArticle']) || !preg_match('#^(http|https)://[\w-]+[\w.-]+\.[a-zA-Z]{2,6}#i', $_POST['linkArticle'])) {
        $msgLinkArticleError .= '<span class="text-danger text-center"> ** Veuillez mettre URL valide</span>';
    } // FIN if (empty($_POST['linkArticle'])

    if (empty($_POST['photoArticle'])) {
        $msgPhotoArticleError .= '<span class="text-danger text-center"> ** Veuillez mettre image valide</span>';
    }  // FIN if (empty($_POST['photo'])

    if (empty($_POST['content'])) {
        $msgContentError.= '<span class="text-danger text-center"> ** Veuillez saisir votre article</span>';
    }  // FIN if (empty($_POST['content'])

    // Champ fNameAuteurArt
    if (empty($_POST['fNameAuteurArt']) || iconv_strlen($_POST['fNameAuteurArt']) < 2 || iconv_strlen($_POST['fNameAuteurArt']) > 50) {
        $msgFNameAuteurArtError.= '<span class="text-danger text-center"> ** Veuillez saisir votre prenom entre 7 et 50 caractères</span>';
    } // FIN if (empty($_POST['fNameAuteurArt'])
    // Champ nom
    if (empty($_POST['lNameAuteurArt']) || iconv_strlen($_POST['lnameAuteurArt']) < 2 || iconv_strlen($_POST['lnameAuteurArt']) > 50) {
        $msgLNameAuteurArtError .= '<span class="text-danger text-center"> ** Veuillez saisir votre nom entre 7 et 50 caractères</span>';
    } // FIN if (empty($_POST['fNameAuteurArt'])

        // verif champ email
    if (empty($_POST['emailAuteurArt']) || !preg_match('/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/', $_POST['emailAuteurArt'])) {
        $msgEmailAuteurArtError .= '<span class="text-danger text-center"> ** Veuillez saisir un mail valid</span>';
    } // FIN if (empty($_POST['link'])

    // SI VERIFIE => 
    // si Je n'ai pas de message d'erreur j'effectue l'insertion à ma BDD 
    if (empty($msgArtTitleError || $msgLinkArticleError || $msgPhotoArticleError || $msgContentError || $msgArtTitleError || $msgFNameAuteurArtError || $msgLNameAuteurArtError || $msgEmailAuteurArtError)) {
        
        
        
    // a) assainissement des saisies de l'intertnaute
    foreach ($_POST as $indice => $valeur) {$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);}
        $requet = $bdd->prepare("INSERT INTO article (artTitle, content, dateArt, fNameAuteurArt, lnameAuteurArt, emailAuteurArt, photoArticle, linkArticle ) VALUES (:artTitle, :content, :dateArt, :fNameAuteurArt, :lnameAuteurArt, :emailAuteurArt, :photoArticle, :linkArticle)");
    
        // J'associe les les valeurs saisies dans le  formulaire avec les marqueurs de securité php (:title,:content,:link, :photo)")
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
    } //Fin if (empty($msg_title || $msg_content || $msg_link || $msg_photo))

} //Fin de $_POST 
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
    <link rel="stylesheet" href="css/style_admin.css">
    <title>siteDeFinDeFormation</title>
</head>
<body>  
    
    <div class="container">
    <h1 class="text text-center mb-5">Formulaire</h1>
    <a href="gestion_article.php" class="return" title="retour"><i
            class="fas fa-hand-point-left fa-2x text-dark"></i></a>
    <form class="col-md-6 offset-3" method="post">
        <div class="col" >
            <input type="hidden" name="idArticle">
        </div>
        <!-- 1 -->
        <div class="row mt-3">
            <div class="col-md-12 text-center ">
                <?= $msgArtTitleError; ?>
            </div>
            <div class="col">
                <input type="text" class="form-control text-center rounded-pill border border-primary hover" name="artTitle"
                    placeholder="titre">
            </div>
        </div>

        <!-- photo ------------------------------------------------------------------------------------------>
        <!-- Debut div row photo link -->
        <div class="row">
            <div class="col mb-3 mt-3">
                  
                    <?= $msgPhotoArticleError; ?>
                <label for="photo"></label>
                <input type="file" id="photo" aria-describedby="" name="photoArticle">
                <?php if (!empty($photoArticle)) : ?>
                <img src="<?= $photoArticle?>" alt="" class="card-img-top">
                <?php endif; ?>
            </div>
            <!-- ------------------------- -->
            <div class="col mb-3 mt-3 ">
                  
                    <?= $msgLinkArticleError; ?>
                <input type="text" class="form-control text-center rounded-pill border border-primary hover" name="linkArticle"
                    placeholder="link">
            </div>
        </div>
        <!-- Fin div row photo et link  -->
        
        <!-- Content -->
        <div class="mb-3 mt-3">
            <?= $msgContentError; ?>
            <textarea class="form-control text-center border border-primary rounded" id="validationTextarea"
                name="content" placeholder="Contenu de l'article"></textarea>
            <div class="invalid-feedback">
            </div>
        </div>

        <!-- Date -->
        <div class="mb-3 mt-3 offset-4">
            <input class="mb-3 mt-3" type="date" max="2020-06-25" min="2019-03-30" name="dateArt">
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
                    placeholder="First Name">
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
                    placeholder="Last name">
            </div>
        </div>
        <!-- Auteur email -->

        <div class="row mt-3">
            <div class="col-md-12 text-center ">
                <?= $msgEmailAuteurArtError; ?>
            </div>
            <div class="col">
                <input type="text" class="form-control text-center rounded-pill border border-primary hover" name="emailAuteurArt"
                    placeholder="Votre Email">
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