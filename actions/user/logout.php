<?php
  include_once('../../config/init.php');

  unset($_SESSION['user']);
  unset($_SESSION['admin']);

  header('Location: '.$BASE_URL);
?>
