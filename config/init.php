<?php
  include_once('session.php');

  //$BASE_DIR = "/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/";
  //$BASE_URL = "https://gnomo.fe.up.pt/~up201304932/trabalhosSiem/TrabalhoPHP-2/";
  $BASE_DIR = "C:\www\TrabalhoPHP-2/";
  $BASE_URL = "http://localhost/TrabalhoPHP-2/";
  $INIT_PAGE = $BASE_URL.'pages/films/home.php';

  include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');
  include_once($BASE_DIR . 'database/menus.php');

  /* Database connection */
  $conn = new PDO('pgsql:host=db.fe.up.pt;dbname=siem1742', 'siem1742', 'LrYaFMWy');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SET SCHEMA 'ssmovies2'");
  $stmt->execute();

  $smarty = new Smarty;

  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';

  $smarty->assign('BASE_URL', $BASE_URL);
  $smarty->assign('INIT_PAGE', $INIT_PAGE);
  $smarty->assign('REQUEST_URI', $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);

  $smarty->assign('CART_QT', getCartSize());

  /* Success and error messages */
  if (isset($_SESSION["error_messages"])) {
      $smarty->assign('ERROR_MESSAGES', $_SESSION["error_messages"]);
      unset($_SESSION["error_messages"]);
  }
  if (isset($_SESSION["success_messages"])) {
      $smarty->assign('SUCCESS_MESSAGES', $_SESSION["success_messages"]);
      unset($_SESSION["success_messages"]);
  }

  if (isset($_SESSION['user'])) {
    $smarty->assign('user', $_SESSION['user']);
  }
  else {
    $smarty->assign('user', false);
  }

    /* Query main menu */
  $mainMenu = listMenuItens(0);
  $smarty->assign('mainMenu', $mainMenu);

  /* Query secondary menu */
  $secundaryMenuUser = listMenuItens(1);

  $smarty->assign('secundaryMenuUser', $secundaryMenuUser);
  if (isset($_SESSION['admin']) AND $_SESSION['admin'] == true){
    $secundaryMenuAdmin = listmenuItens(2);
    $smarty->assign('secundaryMenuAdmin', $secundaryMenuAdmin);

    $smarty->assign('admin', true);
  }
  else {
    $smarty->assign('admin', false);
  }
