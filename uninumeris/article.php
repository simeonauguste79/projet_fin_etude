
<?php 
require_once("include/init.inc.php");
require_once('include/header.inc.php' );

$contenu = "";
// requete de selection on recupere les articles de la  BDD
$resultat = $bdd->query("SELECT * FROM article");
while ($article = $resultat->fetch(PDO::FETCH_ASSOC)) 
{
    // On affiche la card via la variable $contenu 
    $contenu.='<div class="col-md-12 card m-2" style="width: 18rem;">';
      $contenu.='<div class="card-body">';
        $contenu.='<h5><a class="card-title" href="article.php?idArticle=' . $article['idArticle'] . '">' . $article['artTitle'] . '</a></h5>';
        $contenu.='<p class="card-text text-justify">'.$article['content'].'</p>';
        $contenu.='<p class="card-text text-justify">'.$article['dateArt'].'</p>';
        $contenu.='<p class="card-text text-justify">'.$article['fNameAuteurArt'].'</p>';
        $contenu.='<p class="card-text text-justify">'.$article['lNameAuteurArt'].'</p>';
        $contenu.='<p class="card-text text-justify">'.$article['emailAuteurArt'].'</p>';
        $contenu.='<img src="img/'.$article['photoArticle'].'" alt=" class="cardImage">;</p>';
     $contenu .=  '<a href="'.$article["linkArticle"].'" class="btn btn-outline-info" target="_blank">Lire</a>';
      $contenu .= '</div>';
    $contenu .= '</div>';
  
    
    
}
?>


<section class="container">
    <div class="row">
        <?= $contenu; ?>
    </div><!--  Fin row -->
</section>
<!--  -->
    <!-- <div class="media bg-light p-3 mt-5">
      <img class="d-flex align-self-center mr-3 img-fluid" src="img/apprendre-html-css-pour-les-nuls.jpg">
      <div class="media-body">
        <h5 class="mt-0">Article</h5>
        <p>N'est-il pas majestueux ?</p>
        <p>Le Tigre (Panthera tigris) est un mammifère carnivore de la famille des félidés (Felidae) du genre Panthera. Aisément reconnaissable à sa fourrure rousse rayée de noir, il est le plus grand félin sauvage et l'un des plus grands carnivores du monde.</p>
      </div>
    </div>
    <hr class="style1">
        <div class="media bg-secondary p-3">
      <img class="mr-3" src="img/imagesWGBXQ9SB.jpg">
      <div class="media-body">
        <h5 class="mt-0">Un beau tigre</h5>
        <p>N'est-il pas majestueux ?</p>
      </div>
    </div>
    <hr class="style1"> -->

<?php require_once 'include/footer.inc.php' ?>  