<?php

 /* Se clicar no botão de registar, sou encaminhado para a página de registo de utilizadores */
    if ($_POST["registar"]) {
        header("Location: ../../pages/user/register.php");
    }

include("../../database/db_connect.php");
session_start();

connect_db();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT id FROM utilizador WHERE username = '$username' and password = '$password'";
$result = pg_exec($conn, $query);

$num_linhas = pg_numrows($result);

if($num_linhas == 1) {
	/* session_register("username"); */
	$_SESSION["user_id"] = $result; 
	header("location: ../../pages/films/home.php");
}
else {
	$error = "Combinação utilizador/password inválida.";
}
	
?>
