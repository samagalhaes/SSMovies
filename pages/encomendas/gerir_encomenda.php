<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/encomendas.php');
  
  if(!$_SESSION['admin']) {
		header('Location: ../../pages/films/home.php');
		exit();
  }
  
  try {
    $encomenda = gerirEncomenda($_GET['cod_encomenda']);
  } catch (\Exception $e) {
    $_SESSION['error_messages'][] = 'O código que introduziu não é válido!';
    header('Location: '.$BASE_URL.'pages/encomendas/gerir_encomendas.php');
  }
  
  $info = getInfo($_GET['cod_encomenda']);
  
  $estado = getEstado($_GET['cod_encomenda']);
  
  $smarty->assign('myOptions', array(
                                1 => 'Em aberto',
                                2 => 'A aguardar pagamento',
                                3 => 'A processar',
								4 => 'A enviar',
								5 => 'Concluído')
                                );
  $smarty->assign('encomenda', $encomenda);
  $smarty->assign('info', $info);
  $smarty->assign('estado', $estado);
  $smarty->display('encomendas/gerir_encomenda.tpl');
?>
