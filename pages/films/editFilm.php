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
  $film = film($_GET['id']);
  $smarty->assign('film', $film);
	$smarty->assign('genres', listGenres());

  $smarty->assign('TITLE', "Editar filme | ".$film['nome']);
  $smarty->display('films/editFilm.tpl');
?>
