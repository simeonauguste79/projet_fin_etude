<?php
require_once("../include/init.inc.php");
var_dump($_FILES);
// if(!empty($_FILES))
// {
//     $file_name = $_FILES['fichier'] ['nameFile'];
//     $nameType = $_FILES['fichier'] ['nameType'];
//     $file_type = $_FILES['fichier'] ['type'];
//     echo 'Nom' . $file_name;
//     echo 'Type' . $fileType;
//     echo 'urlFile' . $file_type;
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
    <!-- Lien CDN bootswatch -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">
    <!-- Lien CSS personel -->
    <link rel="stylesheet" href="../css/style_admin.css">
    <title>Formulaire telechager</title>
</head>
<body>  
    <div class="container">
        <h1 class="text-center">Formulaire Telecharger</h1>
        <form class="form-data col-md-5 offset-3" method="POST" enctype="multipart/form-data">
        
        

            <input type="file" class="btn btn-primary btn-mg btn-block col-md-5 offset-4 rounded-pill border border-primary hover"  name="fichier" placeholder="choisir fichier">

            <input type="submit" class="btn btn-secondary btn-mg btn-block col-md-5 offset-4 rounded-pill border border-primary hover" value="envoyer le fichier">
            
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

</body>
</html>   