<?php
  session_start();

  //$BASE_DIR = "/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/";
  //$BASE_URL = "https://gnomo.fe.up.pt/~up201304932/trabalhosSiem/TrabalhoPHP-2/";
  $BASE_DIR = "C:\www\TrabalhoPHP-2/";
  $BASE_URL = "http://localhost/TrabalhoPHP-2/";

  include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');
  include_once($BASE_DIR . 'database/menus.php');

  /* Database connection */
  $conn = new PDO('pgsql:host=db.fe.up.pt;dbname=siem1742', 'siem1742', 'LrYaFMWy');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SET SCHEMA 'ssmovies'");
  $stmt->execute();

  $smarty = new Smarty;

  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';

  $smarty->assign('BASE_URL', $BASE_URL);

  /* Success and error messages */
  if (isset($_SESSION["error_messages"])) {
      $smarty->assign('ERROR_MESSAGES', $_SESSION["error_messages"]);
      unset($_SESSION["error_messages"]);
  }
  if (isset($_SESSION["success_messages"])) {
      $smarty->assign('SUCCESS_MESSAGES', $_SESSION["success_messages"]);
      unset($_SESSION["success_messages"]);
  }

    /* Query main menu */
  $mainMenu = listMenuItens(0);
  $smarty->assign('mainMenu', $mainMenu);
