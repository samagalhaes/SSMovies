<?php
    include_once("../../actions/common/session.php");
    check_session ("../../pages/films/home.php");
    
    include_once("../../database/db_connect.php");
    include_once("../../database/db_encomendas.php");
    include_once("../../database/db_films.php");

    connect_db();

    if (isset($_GET["apagar"])){
        apaga_produto_encomenda_db($_GET["cod_encomenda"], $_GET["filme_id"]);
        header ("Location: ../../pages/encomendas/carrinho.php");
    }
    if (isset($_GET["confirmar"])){
        actualiza_quantidade_produto_db($_GET["cod_encomenda"], $_GET["filme_id"], $_GET["qt"]);
        header ("Location: ../../pages/encomendas/carrinho.php");
    }
?>