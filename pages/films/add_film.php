<?php
  include_once('../../config/init.php');
	include_once($BASE_DIR.'database/films.php');

  if (!(isset($_SESSION['admin'])) OR ($_SESSION['admin'] == false)){
    header('Location: '.$INIT_PAGE);
    exit;
  }

  if (isset($_SESSION['form_values'])){
    $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
    unset($_SESSION['form_values']);
  }

	$smarty->assign('genres', listGenres());
  $smarty->assign('TITLE', 'Adicionar filme');
  $smarty->display('films/add_film.tpl');
?>
