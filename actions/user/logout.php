<?php
  include_once('../../config/init.php');

  unset($_SESSION['user']);
  unset($_SESSION['admin']);

  $_SESSION['success_messages'][] = 'Logout efectuado com sucesso!';
  header('Location: '.$INIT_PAGE);
?>
