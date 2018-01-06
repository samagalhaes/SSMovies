//let BASE_URL = 'https://gnomo.fe.up.pt/~up201304932/trabalhosSiem/TrabalhoPHP-2/';
let BASE_URL = 'http://localhost/TrabalhoPHP-2';

/*
* Load functions after page loads 
*/
$(document).ready(function(){
  resetBodyLayout();
  if($('#message').length){
    initMessagesClose();
  }
});

/*
* Resets the body Layout when the aside bar doesn't exit
* the content section will be centered at the screen
*/
function resetBodyLayout(){
  if ($("aside").length == 0){
    $("body").css({
      "grid-template-columns": "1fr 50em 1fr",
      "grid-template-rows": "auto auto auto 1fr auto",
      "grid-template-areas": "'header header header' 'nav nav nav' '. message . ' '. content .' 'footer footer footer'"
    });
  }
}

/*
* Ability to close messages
*/
function initMessagesClose(){
  $('#message .close').click(function() {

    $(this).parent().fadeOut();

  });

  /* Succsess messages clouse automatically after 2s */
  if ($('#message .success').length){
    setTimeout(function() {
      $('.success').fadeOut('slow');
    }, 2000);
  }
}
