<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/films.php');
    
  $films = listLatestFilms(5);
	
	$smarty->assign ('films', $films);

  $smarty->display('films/home.tpl');
?>
