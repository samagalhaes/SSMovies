<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/encomendas.php');
  
  if(!isset($_SESSION['user'])) {
		header('Location: '.$BASE_URL.'pages/films/home.php');
		exit();
	}

  try {
    $encomenda = listEncomenda($_GET['cod_encomenda']);
  } catch (\Exception $e) {
    $_SESSION['error_messages'][] = 'O código que introduziu não é válido!';
    header('Location: '.$BASE_URL.'pages/encomendas/list_encomendas.php');
  }

  $smarty->assign('encomenda', $encomenda);
  $smarty->display('encomendas/list_encomenda.tpl');
?>
