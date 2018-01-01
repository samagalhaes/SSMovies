<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR.'database/encomendas.php');
	
	$estado = $_POST["estado"];
	
	if(!$_SESSION['admin']) {
		header('Location: ../../pages/films/home.php');
		exit();
	}
	
	if (!is_numeric($_GET['cod_encomenda'])) {
		header('Location: ../../pages/encomendas/gerir_encomendas.php');
		exit();
	}
	else $cod_encomenda = $_GET['cod_encomenda'];
	
	if(isset($_POST["confirmar"])) {
		updateEstado($cod_encomenda, $estado);
		if ($estado == 5){
			addFinalDate ($cod_encomenda, 0);
		}
		else {
			addFinalDate ($cod_encomenda, 1);
		}

		header('Location: ../../pages/encomendas/gerir_encomendas.php');
	}


?>
