<?php require_once('../include/init.inc.php');
/* Je fais appelle à la base données sur ma page de gestions de la table article.
Verification des champs du formulaire
-> Parcourir dejà la BDD et repertorier les champs à utiliser Table article 
_ idArticle à ignorer 
_ title -> pour le titre à mettre en anglais 
_ content

*/ 
// Variable d'affichage 
$art = "";

// $resultat -> me permet de récuperer ma table article. $resultat n'est pas exploitable dans l'etat.
$resultat = $bdd->query("SELECT * FROM article");
// echo '<pre class="text-danger">';
// print_r($resultat);
// echo '</pre>';
// La boucle while qui veut dire "tant qu'il y a", permet de parcourir toutes les lignes de mon tableau article. La variable "$art", elle me permet de recuperer toutes les informations de mon tableau article. En crochetant "$art['indice que je souhaite utiliser']"
while($article=$resultat->fetch(PDO::FETCH_ASSOC)){
 $art.='<tr>';
      $art.='<th scope="row">'.$article['idArticle'].'</th>';
      $art.='<td>'.$article['artTitle'].'</td>';
      $art.='<td>'.$article['content'].'</td>';
      $art.='<td>'.$article['dateArt'].'</td>';
      $art.='<td>'.$article['fNameAuteurArt'].'</td>';
      $art.='<td>'.$article['emailAuteurArt'].'</td>';
      $art.='<td>'.$article['photoArticle'].'</td>';
      $art.='<td>'.$article['linkArticle'].'</td>';
    $art.='</tr>';
}
// ---------------SUPPRESSION DE PRODUIT-----------------------
    // Si mon action existe et que l'action est egale à la suppression et mon Id existe
    // je lance ma requete de suppression, il faut if (isset($_GET['action'])+ && $_GET['action'] == 'suppression' && isset($_GET['id']))
// if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])) {

    // $article_delete = $bdd->prepare("DELETE FROM articles WHERE idArticle = :idArticle");
    // Je recupere l'Id qui se trouve dans l'URL
    // $article_delete->bindValue(':idArticle', $_GET['id'], PDO::PARAM_INT);

    // echo 'suppression article';

    // $article_delete->execute();

    // $_GET['action'] = 'affichage'; // on rédirige vers l'affichage des produits
// }
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
    <!-- Lien CDN bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">

    <!-- Lien CSS personel -->
    <link rel="stylesheet" href="css/style_admin.css">
    <title>siteDeFinDeFormation</title>
</head>
<body>  
    <!--Debut div container-fluid-->
<div class="container-fluid">    
    <h1 class="col-md-12 text-center">Gestion Article</h1>
    <a href="accueil_admin.php" class="return" title="retour"><i class="fas fa-hand-point-left fa-2x text-dark"></i></a>
    <a class="offset-11 mb-5 btn btn-outline-dark" href="gestion_article.php" title="ajouter un article"><i
            class="fas fa-pencil-alt fa-2x"></i></a>
    <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col-md-2" class="text-center">idArticle</th>
                    <th scope="col-md-2" class="text-center">artTitle</th>
                    <th scope="col-md-2" class="text-center">Contenu</th>
                    <th scope="col-md-2" class="text-center">dateArt</th>
                    <th scope="col-md-2" class="text-center">fNameAuteurArt</th>
                    <th scope="col-md-2" class="text-center">lNameAuteurArt</th>
                    <th scope="col-md-2" class="text-center">emailAuteurArt</th>
                    <th scope="col-md-2" class="text-center">photoArticle</th>
                    <th scope="col-md-2" class="text-center">linkArticle</th>
                    <th colspan="2">Action</th>

                </tr>
            </thead>
            <tbody>
                <?= $art; ?>

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