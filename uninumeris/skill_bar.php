

<?php 
  require_once("include/init.inc.php");
  require_once('include/header.inc.php' );
  ?>
<!--  -->
    <hr class="style1">
    <div class="card bg-dark text-white">
  <img src="img/slide_one.jpg" class="card-img" alt="">

</div>
    <hr class="style1">
    <!-------------------------------------------------------------------------------------------------------------------->
      <!-- Compétences -->
<?php 
$contenu = '';
$competences = '';


$resultat = $bdd->query("SELECT * FROM competence");
$contenu.='<div class="row">';
while($competences = $resultat->fetch(PDO::FETCH_ASSOC))
{
  
  $contenu.='<div class="space "></div>';
     $contenu.='<div class="col-md-3 service">';
      $contenu.='<div class="text text-center mt-4"><i class="'.$competences['photo_competence'].' hover"></i></div>';
      $contenu.='<h5 class="card-title text-center">'.$competences['title_competence'].'</h5>';
      $contenu.='<br><p class="card-text text-light text text-center">'.$competences['content_competence'].'</p>';
     $contenu.='</div>';
     
}
$contenu.='</div>';
   ?>
    <!---->
        <div class="container ">

        <?php echo $contenu;?>

    </div>
    <!-- FIN row -->
    <!-------------------------------------------------------------------------------------------------------------------->
    <hr class="style1">
<?php
  // requete de selection on recupere les articles de la  BDD
  $resultat = $bdd->query("SELECT * FROM skill_bar");
  while ($niveau = $resultat->fetch(PDO::FETCH_ASSOC)):
  ?>
<div class="skillbar clearfix mt-5 " data-percent="<?=$niveau['niveau']?>%">
  <div class="skillbar-title" style="background: <?=$niveau['background_title']?>;"><span><?=$niveau['niveau_title']?></span></div>
  <div class="skillbar-bar " style="background: <?=$niveau['background_bar']?>;"></div>
  <!-- ANCIEN CODE DE NIVEAU -->
  <!-- <div class="skill-bar-percent">
	  </?=$niveau'niveau'?>%
	</div> -->
	<!-- NOUVEAU CODE DE NIVEAU -->
  <div class="skill-bar-percent">
	 <?php if($niveau['niveau'] <= 50 ){?>
			<div class="skill-bar-percent">
	  			<?= '<h6 class="font-weight-bold text-uppercase text-center text-danger mt-2">Débutant</h6>' ?>
			</div> 
		  <?php } elseif($niveau['niveau'] > 50 && $niveau['niveau'] <= 65 ) {?>
			<div class="skill-bar-percent">
	  			<?= '<h6 class="font-weight-bold text-uppercase text-center text-warning mt-2">Intermédiaire</h6>' ?>
			</div> 
			<?php } elseif($niveau['niveau'] > 65 && $niveau['niveau'] <= 80 ){?>
				<div class="skill-bar-percent">
	  			<?= '<h6 class="font-weight-bold text-uppercase text-center text-info mt-2">Avancé</h6>' ?>
				</div> 
			<?php }elseif($niveau['niveau'] > 80 && $niveau['niveau'] <= 100 ){?>
				<div class="skill-bar-percent progress-bar-striped">
	  			<?= '<h6 class="font-weight-bold text-uppercase text-center text-success mt-2">Maîtrise</h6>' ?>
				</div> 
			<?php }?>
  </div>
</div>
<?php endwhile; ?>
<section class="container">
<div class="row">
</div>
<hr class="style1">
<?php require_once('include/footer.inc.php') ?>

