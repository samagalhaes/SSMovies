<?php

session_start();

$conn = pg_connect("host=db.fe.up.pt dbname=siem1742 user=siem1742 password=LrYaFMWy");
if(!conn) {
	print "Não foi possível estabelecer a ligação à BD";
	exit;
}

$query = "set schema 'ssmovies';";
pg_exec($conn, $query);

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT id FROM utilizador WHERE username = '$username' and password = '$password'";
$result = pg_exec($conn, $query);

$num_linhas = pg_numrows($result);

if($num_linhas == 1) {
	session_register("username");
	$_SESSION['login_user'] = $username;
	header("location: ../../pages/films/home.php");
}
else {
	$error = "Combinação utilizador/password inválida.";
}
	
?>