<?php
    include_once("../../database/db_user.php");
    include_once("../../database/db_connect.php");

    /* Permite bloquear páginas com acesso restrito a utilizadores com login efectuado */
    function check_session ($path) {
        if ($_SESSION["user_id"] == NULL){
            header("Location: $path");
            die();
        }
    }
    
    function check_admin ($path) {
            connect_db();

        if (!check_admin_db()){
            header("Location: $path");
            die();
        }
    }

    session_start();
    if (!isset($_SESSION["user_id"])){
        $_SESSION["user_id"] = NULL;
    }
?>