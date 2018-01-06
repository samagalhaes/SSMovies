//let BASE_URL = 'https://gnomo.fe.up.pt/~up201304932/trabalhosSiem/TrabalhoPHP-2/';
let BASE_URL = 'http://localhost/TrabalhoPHP-2';

$(document).ready(function(){
  resetBodyLayout();
});

function resetBodyLayout(){
  if ($("aside").length == 0){
    $("body").css({
      "grid-template-columns": "1fr 50em 1fr",
      "grid-template-rows": "auto auto auto 1fr auto",
      "grid-template-areas": "'header header header' 'nav nav nav' '. message . ' '. content .' 'footer footer footer'"
    });
  }
}
