<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/user.php');
  include_once($BASE_DIR.'database/menus.php');

  if (!isset($_SESSION['user'])){
    header('Location: ' . $BASE_URL);
    exit;
  }

  $username = $_SESSION['user'];

  $userData = userData($username);
  $smarty->assign('userData', $userData);

  /* Separate the code post into two elements */
  if (!strcmp($userData['codigo_postal'], '') == 0){
    $postcode = explode('-', $userData['codigo_postal']);
    $smarty->assign('postcode', $postcode);
  }

  $smarty->assign('TITLE', 'Dados pessoais');
  $smarty->display('user/personal.tpl');
?>
