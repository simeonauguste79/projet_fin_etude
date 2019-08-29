$(function () {
    console.log('JQ chargé');



});


 jQuery(document).ready(function () {
    jQuery('.skillbar').each(function () {
        jQuery(this).find('.skillbar-bar').animate({
            width: jQuery(this).attr('data-percent')
         }, 6000);
     });
 });


//  Video

// SMOOTH SCROLL


{/* <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script>

        $(document).ready(function() {

            $('.js-scrollTo').on('click', function () { // Au clic sur un élément

                var page = $(this).attr('href'); // Page cible

                var speed = 750; // Durée de l'animation (en ms)

                $('html, body').animate({ scrollTop: $(page).offset().top }, speed); // Go

                return false;

            });

        });
        
</script> */}

