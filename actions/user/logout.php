<?php

session_start();
session_destroy();

echo 'Logout efetuado com sucesso. <a href="../../pages/films/home.php">Voltar à página de inicial</a>';

?>