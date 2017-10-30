<?php

include("../../database/db_connect.php");
session_start();

connect_db();

$user_session_check = $_SESSION["user_id"];
$query = "SELECT username FROM utilizador WHERE username = '$user_session_check'";
$result = pg_exec($conn, $query);

$login_session = $result['username'];
    if (!session_id()){
        session_start();
        $_SESSION["user_id"] = NULL;
    }
?>