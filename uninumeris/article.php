
<?php 
require_once("include/init.inc.php");
require_once('include/header.inc.php' );

$contenu = "";
// requete de selection on recupere les articles de la  BDD
$resultat = $bdd->query("SELECT * FROM article");
while ($article = $resultat->fetch(PDO::FETCH_ASSOC)) 
{
    // On affiche la card via la variable $contenu  
        $contenu.= '<h2 class=" font-weight-bold text-uppercase mb-4" href="article.php?idArticle=' . $article['idArticle'] . ' text-center">' . $article['artTitle'] . '</a></h2>';
        $contenu.= '<div class="card card-cascade wider reverse">';
        $contenu.= '<div class="view view-cascade overlay">';
            $contenu.= '<img class="card-img-top" src="img/'.$article['photoArticle'].'" alt="Card image cap"><a href="#!"><div class="mask rgba-white-slight"></a></div>';
             $contenu.= '<p class="card-text mt-3" .>'.$article['content'].'</p>';
             $contenu.= '<div class="card-body card-body-cascade text-center">';
             $contenu.='<p class="card-text text-justify">'.$article['dateArt'].'</p>';
             $contenu.='<p class="card-text text-justify">'.$article['fNameAuteurArt'].'</p>';
             $contenu.='<p class="card-text text-justify">'.$article['lNameAuteurArt'].'</p>';
      $contenu.= '</div>';$contenu .=  '<a href="'.$article["linkArticle"].'" class="btn btn-outline-info" target="_blank">Lire</a>';
  $contenu.= '</div>';
    

}
?>


<section class="container">
    <div class="row">
        <?= $contenu; ?>
    </div>
</section>

<?php require_once 'include/footer.inc.php' ?>  