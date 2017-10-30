<?php

session_start();

$conn = pg_connect("host=db.fe.up.pt dbname=siem1742 user=siem1742 password=LrYaFMWy");
if(!conn) {
	print "Não foi possível estabelecer a ligação à BD";
	exit;
}

$query = "set schema 'ssmovies';";
pg_exec($conn, $query);

$user_session_check = $_SESSION['login_user'];

$query = "SELECT username FROM utilizador WHERE username = '$user_session_check'";
$result = pg_exec($conn, $query);

$login_session = $result['username'];

    if (!session_id()){
        session_start();
        $_SESSION["user_id"] = NULL;
    }
?>
