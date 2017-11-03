<?php
    include_once ("../../actions/common/session.php");
    include_once ("../../database/db_connect.php");
    include_once ("../../database/db_encomendas.php");

    connect_db();

    check_session("../../pages/films/home.php");

    $film_id = $_GET["film-id"];
    $s_user = $_SESSION["user_id"];

    /* Verifica se existe alguma compra em aberto */
    $encomenda_aberto = check_encomenda_estado_db ($s_user, 1);

    /* Se não existir, cria uma nova */
    if (!pg_numrows($encomenda_aberto)){
        $encomenda_aberto = cria_nova_encomenda_db ($s_user);
    }

    $encomenda_aberto = pg_fetch_assoc($encomenda_aberto);
    $codigo_encomenda_aberto = $encomenda_aberto["codigo"];

    /* Verifica se o produto que queremos adicionar já existe na encomenda */
    $existe_produto = check_producto_adicionado_db ($codigo_encomenda_aberto, $film_id);

    if (!pg_numrows($existe_produto)){
        /* Se não existir, adiciona o filme à encomenda */
        adiciona_produto_db ($codigo_encomenda_aberto, $film_id, 1);
    }
    else { 
        /* Se já existir incrementa a quantidade de produtos */
        actualiza_quantidade_produto_db ($codigo_encomenda_aberto, $film_id, intval($existe_produto["quantidade"])+1);
    }
    
    header ("Location: ../../pages/encomendas/carrinho.php")
?>