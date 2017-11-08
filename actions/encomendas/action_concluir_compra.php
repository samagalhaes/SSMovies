<?php
    include_once("../../actions/common/session.php");
    check_session ("../../pages/films/home.php");

    include_once("../../database/db_connect.php");
    include_once("../../database/db_encomendas.php");
    include_once("../../database/db_films.php");

    connect_db();

    $user_id = $_SESSION["user_id"];
    $cod_encomenda = $_GET["cod_encomenda"];

    if (isset($_GET["comprar"])){

        $filmes = lista_encomenda_produtos_db($cod_encomenda);

        for ($i = 0; $i < pg_numrows($filmes); $i++){
            $filme = pg_fetch_assoc($filmes);
            $film_details = get_film_details_db($filme["id_filme"]);

            if ($filme["quantidade"] > $film_details["quantidade_disponivel"]){
                header("Location: ../../pages/encomenda/carrinho.php?erro_qt=" . $filme["id_filme"]);
            }
        }

        for ($i = 0; $i < pg_numrows($filmes); $i++){
            $filme = pg_fetch_assoc($filmes, $i);
            $film_details = get_film_details_db($filme["id_filme"]);
            $new_qt = $film_details["quantidade_disponivel"] - $filme["quantidade"];

            update_available_qt_db ($filme["id_filme"], $new_qt);
        }

        actualiza_estado_encomenda_db ($cod_encomenda, 2);
        header("Location: ../../pages/encomendas/list_encomendas.php");
        }
    else {
        header("Location: ../../pages/encomenda/carrinho.php");
    }
?>