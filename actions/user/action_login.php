<?php

    function verifica_login ($username, $password){
        $password_md5 = md5($password);
        global $conn;

        include_once ("../../database/db_connect.php");
        include_once ("../../database/db_user.php");

        if (!isset($conn)){
            connect_db();
        }

        return check_login_db($username, $password);
    }

    session_start();

    /* Se clicar no botão de registar, encaminha para a página de registo de utilizadores */
    if (isset($_POST["registar"])){
        header("Location: ../../pages/user/register.php");
    }

    /* Se clicar em login, verifica a validade dos dados o utilizador */
    elseif (isset($_POST["login"])){
        $id = verifica_login($_POST["username"], $_POST["password"]);
        $_SESSION["user_id"] = $id;
        header("Location: ../../pages/films/home.php"); // Depois do login confirmado, encaminha para a página inicial
    }

?>