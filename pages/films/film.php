<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/films.php');

  try {
    $film = film($_GET['id']);
  } catch (\Exception $e) {
    $_SESSION['error_messages'][] = 'O filme procurado não existe!';
    header('Location: '.$BASE_URL.'pages/films/films.php');
  }

  $smarty->assign('TITLE', $film['nome']);
  $smarty->assign('film', $film);
  $smarty->display('films/film.tpl');
?>
