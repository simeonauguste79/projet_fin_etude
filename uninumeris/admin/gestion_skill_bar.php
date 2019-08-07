<?php
require_once("../include/init.inc.php");
require_once("../include/init.inc.php");
/*Verification des champs du formulaire
-> parcourir dejà la BDD et repertorier les champs à utiliser
Table cpLevel 
_	id_competenceLevel à ignorer 
_cpTitle -> pour le titre à mettre en anglais 
_cpLevel
*/
// Ici j'affiche les infos que récupère grâce à la methode "post" du formulaire. Ceci m'aide à voir que mon formulaire envoie bien les données saisies
echo '<pre style="background:DarkSlateGray;color:white;" >';
var_dump($_POST);
echo '</pre>';
extract($_POST);
// je créé ma variable d'affichage
$msgcpTitleError = "";
$msgcpLevelError = "";

 $contenu = "";
// Je vérifie les champs de mon formulaire
if ($_POST) {

    // Je vérifie que chaque champs n'esxistent pas ou bien qu'il ne correspondent pas à ce que j'attend. Dans ce cas un message d'erreur sera affiché.
    if (empty($cpTitle) || iconv_strlen($cpTitle) < 2 || iconv_strlen($cpTitle) > 100) {
        $msgcpTitleError .= '<span class="text-danger text-center"> ** Veuillez saisir votre titre competence entre 7 et 100 caractères</span>';
    } // FIN if (empty($_POST['cpTitle'])


    if (empty($_POST['cpLevel'])) {
        $msgcpLevelError.= '<span class="text-danger text-center"> ** Veuillez saisir votre niveau</span>';
    }  // FIN if (empty($_POST['content'])

    // SI VERIFIE => 
    // si Je n'ai pas de message d'erreur j'effectue l'insertion à ma BDD 
    if (empty($msgcpTitleError || $msgcpLevelError))
    {
        
        
        // a) assainissement des saisies de l'intertnaute
    foreach ($_POST as $indice => $valeur) {$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);}
        $requet = $bdd->prepare("INSERT INTO skill_bar (cpTitle, cpLevel ) VALUES (:cpTitle, :cpLevel)");
    
        // J'associe les les valeurs saisies dans le  formulaire avec les marqueurs de securité php (:title,:content,:link, :photo)")
        $requet->bindParam(':cpTitle', $_POST['cpTitle']);
        $requet->bindParam(':cpLevel', $_POST['cpLevel']);
        // J'éxecute l'insertion en BDD
        $requet->execute();
    } //Fin if (empty($msgcpTitle || $msgcpLevel))

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
    <link rel="stylesheet" href="../css/style_admin.css">
    <title>siteDeFinDeFormation</title>
</head>
<body>  
    <!--Debut div container-fluid-->
    <div class="container-fluid">
        
<div class="container">
    

<h1 class="display-4 text-center"> Competence</h1>
        <a href="accueil_admin.php" class="return" title="retour"><i class="fas fa-hand-point-left fa-2x text-dark"></i></a>
        <a class="offset-11 mb-5 btn btn-outline-dark" href="form_article.php" title="ajouter un article"><i
                class="fas fa-pencil-alt fa-2x"></i></a>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col-md-2" class="text-center">title_competence</th>
                    <th scope="col-md-2" class="text-center">content_competence</th>
                    <th scope="col-md-2" class="text-center">Photo</th>
                    <th colspan="2">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php echo $contenu; ?>

            </tbody>
        </table>


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