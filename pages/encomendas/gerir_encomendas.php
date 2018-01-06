<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/encomendas.php');
  
  if(!$_SESSION['admin']) {
		header('Location: '.$BASE_URL.'pages/films/home.php');
		exit();
	}
  
  $encomendas = gerirEncomendas();
  
  $smarty->assign('myOptions', array(
                                1 => 'Em aberto',
                                2 => 'A aguardar pagamento',
                                3 => 'A processar',
								4 => 'A enviar',
								5 => 'Concluído')
                                );
  $smarty->assign('encomendas', $encomendas);
  $smarty->display('encomendas/gerir_encomendas.tpl');
?>
