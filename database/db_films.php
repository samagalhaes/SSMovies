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
?>