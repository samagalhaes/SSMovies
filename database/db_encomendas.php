<?php
    function check_encomenda_estado_db ($user_id, $estado){
        global $conn;

        $query = "SELECT *
                  FROM encomenda
                  WHERE estado = $estado AND
                        utilizador = $user_id
                  ORDER BY codigo DESC";
        
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

    function actualiza_estado_encomenda_db ($cod_encomenda, $estado){
        global $conn;

        $query = "UPDATE encomenda
                  SET estado = '$estado'
                  WHERE codigo = $cod_encomenda";

        return pg_exec($conn, $query);
    }

    function adiciona_produto_db ($cod_encomenda, $film_id, $qt){
        global $conn;

        $query = "INSERT INTO encomenda_filme
                  VALUES ('$cod_encomenda',
                          '$film_id',
                          '$qt')";

        return pg_exec ($conn, $query);
    }

    function lista_encomenda_produtos_db ($cod_encomenda) {
        global $conn;

        $query = "SELECT * 
                  FROM encomenda_filme
                  WHERE cod_encomenda = $cod_encomenda";

        return pg_exec($conn, $query);
    }

    function lista_estados_encomenda_db (){
        global $conn;

        $query = "SELECT *
                  FROM estado
                  ORDER BY id";

        return pg_exec($conn, $query);
    }

	function lista_todas_encomendas_db (){
		global $conn;
		
		$query = "SELECT *
                  FROM encomenda
				  ORDER BY codigo ASC";
				  
		return pg_exec($conn, $query);
	}
	
	function get_encomenda_db ($cod_encomenda) {
        global $conn;

        $query = "SELECT * 
                  FROM encomenda
                  WHERE codigo = $cod_encomenda";

        return pg_exec($conn, $query);
    }

    function apaga_produto_encomenda_db ($cod_encomenda, $id_filme){
        global $conn;

        $query = "DELETE FROM encomenda_filme
                  WHERE cod_encomenda = $cod_encomenda AND
                        id_filme = $id_filme";
        
        return pg_exec ($conn, $query);
    }
?>
