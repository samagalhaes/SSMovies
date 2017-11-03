<?php
    function check_encomenda_estado_db ($user_id, $estado){
        global $conn;

        $query = "SELECT *
                  FROM encomenda
                  WHERE estado = $estado AND
                        utilizador = $user_id";
        
        return pg_exec($conn, $query);
    }

    function cria_nova_encomenda_db ($user_id){
        global $conn;

        $query = "INSERT INTO encomenda (utilizador,
                                         estado,
                                         data_inicio)
                   VALUES ('$user_id',
                           '1',
                           'now')";
    
        pg_exec ($conn, $query);

        /* Retorna a encomenda criada */
        return check_encomenda_estado_db($user_id, 1);
    }

    function check_producto_adicionado_db ($cod_encomenda, $film_id){
        global $conn;

        $query = "SELECT * 
                  FROM encomenda_filme
                  WHERE cod_encomenda = $cod_encomenda AND
                        id_filme = $film_id";

        return pg_exec($conn, $query);
    }

    function actualiza_quantidade_produto_db ($cod_encomenda, $film_id, $qt){
        global $conn;

        $query = "UPDATE encomenda_filme
                  SET quantidade = '$qt'
                  WHERE cod_encomenda = $cod_encomenda AND
                        id_filme = $film_id";

        return pg_exec ($conn, $query);
    }

    function adiciona_produto_db ($cod_encomenda, $film_id, $qt){
        global $conn;

        $query = "INSERT INTO encomenda_filme
                  VALUES ('$cod_encomenda',
                          '$film_id',
                          '$qt')";

        return pg_exec ($conn, $query);
    }
?>