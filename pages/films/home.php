<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/menus.php');
    
  $mainMenu = listMenuItens(0);
	
	$smarty->assign ('mainMenu', $mainMenu);

  $smarty->display('films/home.tpl');
?>
