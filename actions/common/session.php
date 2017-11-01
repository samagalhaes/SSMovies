<?php

    /* Permite bloquear páginas com acesso restrito a utilizadores com login efectuado */
    function check_session ($path) {
        if ($_SESSION["user_id"] == NULL){
            header("Location: $path");
        }
    }

    session_start();
    if (!isset($_SESSION["user_id"])){
        $_SESSION["user_id"] = NULL;
    }
?>