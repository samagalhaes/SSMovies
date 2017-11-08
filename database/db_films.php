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

    function update_available_qt_db ($film_id, $qt){
        global $conn;
        
        $query = "UPDATE filme 
                SET quantidade_disponivel = '$qt'
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

function filter_films_db($ano, $genero1, $genero2, $genero3, $genero4, $genero5, $genero6, $genero7, $genero8, $genero9, $genero10, $genero11, $genero12, $genero13, $genero14, $genero15, $genero16, $genero17, $genero18, $genero19, $genero20, $genero21, $cl_etar) {
		global $conn;
		$query = "SELECT *
			     FROM filme
				 WHERE ano = $ano
				 AND (genero = $genero1 OR genero = $genero2 OR genero = $genero3  OR genero = $genero4  OR genero = $genero5  OR genero = $genero6  OR genero = $genero7  OR genero = $genero8  OR genero = $genero9  OR genero = $genero10  OR genero = $genero11  OR genero = $genero12  OR genero = $genero13  OR genero = $genero14  OR genero = $genero15  OR genero = $genero16  OR genero = $genero17  OR genero = $genero18  OR genero = $genero19  OR genero = $genero20  OR genero = $genero21)
				 AND classificacao_etaria = $cl_etar";
		return pg_exec($conn, $query);
	}
?>
