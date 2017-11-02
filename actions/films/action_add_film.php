<?php
    include_once ("../../actions/common/session.php");
    include_once ("../../database/db_connect.php");
    include_once ("../../database/db_films.php");

    connect_db();

    check_session("../../pages/films/home.php");
    check_admin("../../pages/user/personal.php");

    $nome                 = $_GET["nome"];
    $ano                  = intval($_GET["ano"]);
    $classificacao_etaria = intval($_GET["classificacao_etaria"]);
    $duracao              = intval($_GET["duracao"]);
    $imdb                 = floatval($_GET["imdb"]);
    $genero               = intval($_GET["genero"]);
    $trailer              = $_GET["trailer"];
    $cover                = $_GET["cover"]; 
    $sinopse              = $_GET["sinopse"];
    $preco                = floatval($_GET["preco"]);
    $stock                = intval($_GET["stock"]);

    if (isset($_GET["add"])){
        $result = add_film_db ($nome, $ano, $classificacao_etaria, $duracao, $imdb, $genero, $trailer, $cover, $sinopse, $preco, $stock);

        if ($result == FALSE){
            echo "<html><body>";
            echo "Erro ao criar o filme";
            echo "</body></html>";
        }
        else {
            header ("Location: ../../pages/films/add_film.php");
        }
    }

    if (isset($_GET["modificar"])){
        $result = modify_film_db ($_GET["film_id"],$nome, $ano, $classificacao_etaria, $duracao, $imdb, $genero, $trailer, $cover, $sinopse, $preco, $stock);

        if ($result == FALSE){
            echo "<html><body>";
            echo "Erro ao criar o filme";
            echo "</body></html>";
        }
        else {
            $film_id = $_GET["film_id"];
            header ("Location: ../../pages/films/film_details.php?film-id=$film_id");
        }
    }
?>