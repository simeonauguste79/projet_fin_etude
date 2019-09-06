<?php
require_once("../include/init.inc.php");

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion')
 {
    session_destroy();
    header('Location:../index.php');
    echo "<pre>";var_dump($admin);echo "</pre>";
}
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
    <script type="text/javascript" src="/js/index.js"></script>
    <!-- Lien CDN bootswatch -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">
    <!-- Lien CSS personel -->
    <link rel="stylesheet" href="../css/style_admin.css">
    <title>siteDeFinDeFormation</title>
</head>
<body>  
<nav class="navbar navbar-dark bg-dark">
  <!-- Navbar content -->

</nav>
    <!--Debut div container-fluid-->
    <div class="container-fluid">
        

    <div class="">
<!--Bouton de deconnexion-->

    <button class="btn btn-lg btn-outline-danger rounded offset-10 mt-5" type="button text"><a href="?action=deconnexion" role="button">Deconnexion</a></button>   
    </div>
<!--Le titre panel-->
    <h2 class="login_panel">Panel</h2>
        
<div class="container">
<form>
  <fieldset>
    <div class="form-group row">
      <i class="fas fa-tasks text-light fa-2x"></i>
      <div class="col-sm-4">    
            <button class="btn btn-outline-primary btn-block hover" type="button"><a href="gestion_article.php">G° article</a> </button>
      </div>
    </div>
    <!--Fin gestion article-->
    <div class="form-group row">
            <i class="fas fa-tasks text-light fa-2x"></i>
            <div class="col-sm-4">
                <button class="btn btn-outline-success btn-block hover" type="button"><a href="gestion_contact.php">G° contact</a> </button>
            </div>
          </div>
    <!--Fin gestion contact-->
          <div class="form-group row">
              <i class="fas fa-tasks text-light fa-2x"></i>
              <div class="col-sm-4">
                  <button class="btn btn-outline-info btn-block hover" type="button"><a href="gestion_formation.php">G° format°</a> </button>
                </div>
            </div>
            <!--Fin gestion formation-->
            <div class="form-group row">
                <i class="fas fa-tasks text-light fa-2x"></i>
                <div class="col-sm-4">
                    <button class="btn btn-outline-warning btn-block hover" type="button"><a href="gestion_realisation.php">G° realisat°</a> </button>
                </div>
            </div>
            <!--Fin gestion formulaire article-->
            <div class="form-group row">
                <i class="fas fa-tasks text-light fa-2x"></i>
                <div class="col-sm-4">
                    <button class="btn btn-outline-light btn-block hover" type="button"><a href="form_article.php">G° Form Art</a> </button>
                </div>
            </div>
            <!--Fin gestion realisation-->
            <div class="form-group row">
                <i class="fas fa-tasks text-light fa-2x"></i>
                <div class="col-sm-4">
                    <button class="btn btn-outline-info btn-block hover" type="button"><a href="gestion_competence.php">G° comptence</a> </button>
                    <!--Fin Gestion comptence-->
                    </div>
                </div>
    </fieldset>
  </fieldset>
</form>
</div></div><!--Fin di container-->
    
</div><!--Fin di container fluid-->



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