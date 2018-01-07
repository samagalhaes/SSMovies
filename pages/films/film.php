<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/films.php');

  try {
    $film = film($_GET['id']);
  } catch (\Exception $e) {
    $_SESSION['error_messages'][] = 'O filme procurado não existe!';
    header('Location: '.$BASE_URL.'pages/films/films.php');
  }

  $checkId = checkId($_GET['id']);

  if ($checkId == 0) {
	$_SESSION['error_messages'][] = 'O filme procurado não existe!';
  header('Location: '.$BASE_URL.'pages/films/films.php');
  }

  if ($film['quantidade_disponivel'] <= 0){
    $available = 'red';
  }
  elseif ($film['quantidade_disponivel'] <= 10) {
    $available = 'yellow';
  }
  else {
    $available = 'green';
  }

  $smarty->assign('TITLE', $film['nome']);
  $smarty->assign('film', $film);
  $smarty->assign('available', $available);

  $smarty->display('films/film.tpl');
?>
