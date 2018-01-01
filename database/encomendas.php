<?php

	function listUserEncomendas (){
        global $conn;
		
		$stmt = $conn->prepare("SELECT codigo, data_inicio, data_fim, preco, designacao
                  FROM encomenda
                  JOIN estado ON encomenda.estado = estado.id
				  JOIN encomenda_filme ON encomenda.codigo = encomenda_filme.cod_encomenda
				  JOIN filme ON encomenda_filme.id_filme = filme.id
				  JOIN utilizador ON encomenda.utilizador = utilizador.id
                  WHERE utilizador.username = ?");
		
		$stmt->execute(array($_SESSION['user']));

        return $stmt->fetchAll();
    }
	
	function listEncomenda ($cod){
        global $conn;
		
		$stmt = $conn->prepare("SELECT cover, nome, quantidade, preco
                  FROM encomenda_filme
                  JOIN filme ON encomenda_filme.id_filme = filme.id
                  WHERE encomenda_filme.cod_encomenda = ?");
		
		$stmt->execute(array($cod));

        return $stmt->fetchAll();
    }
	 
	function gerirEncomendas() {
		global $conn;
		
		$stmt = $conn->prepare("SELECT codigo, data_inicio, data_fim, nome, designacao, estado.id
                  FROM encomenda
                  JOIN estado ON encomenda.estado = estado.id
				  JOIN utilizador ON encomenda.utilizador = utilizador.id
				  ORDER BY codigo ASC");
		
		$stmt->execute();

        return $stmt->fetchAll();
	}
	
	function updateEstado ($cod_encomenda, $estado){
        global $conn;

        $stmt = $conn->prepare("UPDATE encomenda
                  SET estado = ?
                  WHERE codigo = ?");

        $stmt->execute(array($estado, $cod_encomenda));
    }
	
	function addFinalDate ($cod_encomenda, $write) {
        global $conn;

        if (!$write){
            $stmt = $conn->prepare("UPDATE encomenda
                      SET data_fim = 'now'
                      WHERE codigo = ?");
			$stmt->execute(array($cod_encomenda));
        }
        else{
            $stmt = $conn->prepare("UPDATE encomenda
                      SET data_fim = NULL
                      WHERE codigo = ?");
			$stmt->execute(array($cod_encomenda));
        }
    }
	
	 function gerirEncomenda($cod) {
		global $conn;
		
		$stmt = $conn->prepare("SELECT cover, nome, quantidade, preco
		FROM encomenda_filme
		JOIN filme ON encomenda_filme.id_filme = filme.id
		WHERE encomenda_filme.cod_encomenda = ?");
		
		$stmt->execute(array($cod));
		
		return $stmt->fetchAll();
	} 
	
	function getInfo($cod) {
		global $conn;
		
		$stmt = $conn->prepare("SELECT utilizador.nome, email, telefone, nif, morada, codigo_postal, designacao
		FROM encomenda
		JOIN utilizador ON encomenda.utilizador = utilizador.id
		JOIN estado ON encomenda.estado = estado.id
		WHERE encomenda.codigo = ?");
		
		$stmt->execute(array($cod));
		
		return $stmt->fetch();
	} 
	
	function getEstado($cod) {
		global $conn;
		
		$stmt = $conn->prepare("SELECT codigo, designacao, id
		FROM encomenda
		JOIN estado ON encomenda.estado = estado.id
		WHERE encomenda.codigo = ?");
		
		$stmt->execute(array($cod));
		
		return $stmt->fetch();
	}
?>
