<?php
    include_once ("../../actions/common/session.php");
    include_once ("../../database/db_connect.php");
    include_once ("../../database/db_films.php");

    connect_db();

    check_session("../../pages/films/home.php");

    $film_id = $_GET["film_id"];

    if (isset($_GET["remover"]) or isset($_GET["editar"])){
        check_admin("../../pages/films/film_details.php?film-id=$film_id");
    }

    if (isset($_GET["editar"])) {
        header("Location: ../../pages/films/edit_film.php?film-id=$film_id");
    }

    if (isset($_GET["remover"])) {
        delete_film_db ($film_id);
        header("Location: ../../pages/films/home.php");
    }

    if (isset($_GET["comprar"])){
        header("Location: ../../actions/encomendas/action_add_product.php?film-id=$film_id");
    }
?>