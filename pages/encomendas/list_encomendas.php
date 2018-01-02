<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/encomendas.php');
  
  if(!isset($_SESSION['user'])) {
		header('Location: '.$BASE_URL.'pages/films/home.php');
		exit();
	}
  
  $encomendas = listUserEncomendas();
  
  $smarty->assign('encomendas', $encomendas);
  $smarty->display('encomendas/list_encomendas.tpl');
?>
