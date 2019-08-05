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
        
<div id="container">
    

<h1 id="adminConnect" class="text-primary">Gestion Header</h1>
<form class="col-md-3 offset-md-5 mt-5 text-center form" method="Post" action="">
  <!-- firstname -->
  <div class="form col-md-7">
  <i class="fas fa-file-signature fa-2x text-light"></i>
    <input type="text" class="form-control rounded-pill text-center m-3 bordered-primary hover" name="firstNameAdmin" placeholder="Votre prenom">
<?php echo $firstNameAdminError  ?>
  
  </div>
  <div class="form col-md-7">
  <i class="fas fa-file-signature fa-2x text-light"></i>
    <input type="tex" class="form-control rounded-pill text-center m-3 bordered-primary hover" name="lastNameAdmin" placeholder="Votre nom">
  <?php echo $lastNameAdminError  ?>
  <!-- lastName -->
  </div>
  <div class="form col-md-7">
  <i class="fas fa-envelope-open-text fa-2x text-light"></i>
    <input type="text" class="form-control rounded-pill text-center m-3 bordered-primary hover" name="emailAdmin" placeholder="Votre@Email.com">
  <?php echo $emailAdminError  ?>
  <!--votre email-->
  </div>
  <div class="form col-md-7">
  <i class="fas fa-unlock-alt fa-2x text-light"></i>
    <input type="password" class="form-control rounded-pill text-center m-3 bordered-primary hover" name="pwAdmin" placeholder="Votre pwAdmin">
  <?php echo $pwAdminError  ?>
  <!-- mdp -->
  </div>
  <!-- le bouton submit -->
  <!-- <a  >Connexion</a> -->
  <div class="form col-md-4 offset-md-2">
  
    <input type="submit" class="btn btn-light rounded-pill hover text-center m-3 bordered-primary bg-none" value="connexion">
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