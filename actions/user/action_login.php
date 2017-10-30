<?php

    /* Se clicar no botão de registar, sou encaminhado para a página de registo de utilizadores */
    if ($_POST["registar"]) {
        header("Location: ../../pages/user/register.php");
    }
?>