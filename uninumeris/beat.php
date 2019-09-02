<?php require_once ('include/header.inc.php' );
require_once("include/init.inc.php");
?>

<hr class="style1">
    <!-- hr-------------------------------------------------------------------------------------------------- -->
    <section  class="row">
            <h6 class="font-weight-bold text-uppercase"><a href="beat.php">Vidéo</a></h6>
            <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <div class="container">


                <!-- taille en 16/9 -->
                    <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0vG0s7yl2Lk" width="300" height="150"></iframe></div>

            </div>
    </section>
    <hr class="style1">
    <!-- hr-->
    <section id="section-music">
        <h6 class="font-weight-bold text-uppercase"><a href="beat.php">Musique</a></h6>
        <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <div class="row rounde-5">
            <div class="musique col-md-4 offset-2 mt-3">
                <audio controls="controls" src="audio/Come_Away/01 Bright Soul.mp3" loop="loop" autoplay="autoplay" class="mt-5 ml-5²">
                    <source src="magics.mp3">
                    <source src="magics.ogg">
                </audio>
            </div>
            <!--Shazam-->
            <div class="shazam col-md-6">
                <img class="shazam col rounded-circle" src="img/gif/logo-2-2.gif" alt="">
            </div>
        </div>
    </section>
    <hr class="style1">
<?php require_once 'include/footer.inc.php' ?>