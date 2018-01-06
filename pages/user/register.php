<?php
	include_once('../../config/init.php');

	if (isset($_SESSION['username'])){
		header('Location'. $BASE_URL . 'pages/films/home.php');
		exit;
	}

	if (isset($_SESSION["form_values"])){
		$smarty->assign('FORM_VALUES', $_SESSION["form_values"]);
		unset($_SESSION["form_values"]);
	}

	$smarty->assign('TITLE', 'Registar');
	$smarty->display('user/register.tpl');
?>
