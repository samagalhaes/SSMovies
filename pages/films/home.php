<?php
  include_once('../../config/init.php');

	include_once($BASE_DIR . 'database/films.php');

	$latestFilms = listLatestFilms();
	
	$smarty->assign ('latestFilms', $latestFilms);

  $smarty->display('films/home.tpl');
?>
