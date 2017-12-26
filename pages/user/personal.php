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
  if (strcmp($userData['codigo_postal'], ' ') == 0){
    $postcode2 = intval(intval($userData['codigo_postal'])/1000);
    $postcode1 = intval((intval($userData['codigo_postal'])-($postcode2*1000))/1000);

    $smarty->assign('postcode1', $postcode1);
    $smarty->assign('postcode2', $postcode2);
  }

  $smarty->display('user/personal.tpl');
?>
