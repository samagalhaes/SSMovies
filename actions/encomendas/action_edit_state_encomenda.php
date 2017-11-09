<?php
    include_once ("../../actions/common/session.php");
    include_once ("../../database/db_connect.php");
    include_once ("../../database/db_encomendas.php");

    connect_db();

    $estado = $_POST["estado"];
	$cod_encomenda = $_GET["cod_encomenda"];
	
	if(isset($_POST["confirmar"])) {
		actualiza_estado_encomenda_db($cod_encomenda, $estado);
		header("Location: ../../pages/encomendas/gerir_encomendas.php");
	}
	
	?>
	
