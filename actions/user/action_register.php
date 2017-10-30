<?php

    /* Recebe a variáveis por POST e cria as diferentes strings */
    $name = $_POST["first_name"] . " " . $_POST["last_name"];
    $email = $_POST["e_mail"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $telephone = $_POST["telephone"];
    $nif = $_POST["nif"];
    $address = $_POST["addroess"];
    $postcode = $_POST["postcod1"] . "-" . $_POST["postcode2"];
    $localidade = $_POST["localidade"];

?>