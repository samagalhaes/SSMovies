<?php
    function lista_generos_db (){
        global $conn;

        $query = "SELECT *
                  FROM genero";
    
        return pg_exec($conn, $query);
    } 

    function add_film_db ($nome, $ano, $classificacao_etaria, $duracao, $imdb, $genero, $trailer, $cover, $sinopse, $preco, $stock){
        global $conn;

        $query = "INSERT INTO filme (nome,
                                      ano,
                                      pontuacao_imdb,
                               classificacao_etaria,
                               duracao,
                               sinopse,
                               link_trailer,
                               preco,
                               quantidade_disponivel,
                               cover,
                               genero)
                  VALUES ('$nome',
                          '$ano',
                          '$imdb',
                          '$classificacao_etaria',
                          '$duracao',
                          '$sinopse',
                          '$trailer',
                          '$preco',
                          '$stock',
                          '$cover',
                          '$genero')";
        
        return pg_exec($conn, $query);
    }

    function modify_film_db ($film_id,$nome, $ano, $classificacao_etaria, $duracao, $imdb, $genero, $trailer, $cover, $sinopse, $preco, $stock){
        global $conn;

        $query = "UPDATE filme 
                  SET nome                  = '$nome',
                      ano                   = '$ano',
                      pontuacao_imdb        = '$imdb',
                      classificacao_etaria  = '$classificacao_etaria',
                      duracao               = '$duracao',
                      sinopse               = '$sinopse',
                      link_trailer          = '$trailer',
                      preco                 = '$preco',
                      quantidade_disponivel = '$stock',
                      cover                 = '$cover',
                      genero                = '$genero'
                  WHERE id = $film_id";
        
        return pg_exec($conn, $query);
    }

    function get_films_db($conn) {
        global $conn;

		$query = "SELECT *
                  FROM filme;";
        return pg_exec($conn, $query);
    }
    
    function get_film_details_db($film_id) {
        global $conn;

        $query = "SELECT *
                  FROM filme
                  WHERE filme.id = $film_id";

        $result = pg_exec($conn, $query);
        return pg_fetch_assoc($result);
    }

    function get_film_genero_db ($film_genero) {
        global $conn;

        $query = "SELECT *
                  FROM genero
                  WHERE id = $film_genero";

        $result = pg_exec($conn, $query);
        return pg_fetch_assoc($result);
    }

    function delete_film_db ($film_id) {
        global $conn;

        $query = "DELETE FROM filme
                  WHERE id = '$film_id'";

        return pg_exec($conn, $query);
    }
?>
