<?php
	include_once('../../config/init.php');

	if (isset($_SESSION['username'])){
		header('Location'. $BASE_URL . 'pages/films/home.php');
		exit;
	}

	$smarty->display('user/register.tpl');
?>
