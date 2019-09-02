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

// TOOLTIP

$(function () { 
    $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
  });  
  
  // $( window ).scroll(function() {   
   // if($( window ).scrollTop() > 10){  // scroll down abit and get the action   
    $(".skillbar").each(function(){
      each_bar_width = $(this).attr('aria-valuenow');
      $(this).width(each_bar_width + '%');
    });
         
   //  }  
  // });

