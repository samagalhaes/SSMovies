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
?>