<?php
	/**
	* Query the last films
	*/
   function listLatestFilms ($qt){
        global $conn;

        $stmt = $conn->prepare("SELECT *
                                FROM filme
                                ORDER BY id DESC
								LIMIT ?");
        $stmt->execute(array($qt));

        return $stmt->fetchAll();
    }

/**
	* Query all films
	*/

	function listAllFilms (){
        global $conn;

        $stmt = $conn->prepare("SELECT *
                                FROM filme
                                ORDER BY id DESC");
        $stmt->execute();

        return $stmt->fetchAll();
    }

	/**
	* Query filtered films
	*/

	function filterFilms ($ano, $genero1, $genero2, $genero3, $genero4, $genero5, $genero6, $genero7, $genero8, $genero9, $genero10, $genero11, $genero12, $genero13, $genero14, $genero15, $genero16, $genero17, $genero18, $genero19, $genero20, $genero21, $cl_etar) {
		global $conn;
		$stmt = $conn->prepare("SELECT *
			     FROM filme
				 WHERE ano = $ano
				 AND (genero = $genero1 OR genero = $genero2 OR genero = $genero3  OR genero = $genero4  OR genero = $genero5  OR genero = $genero6  OR genero = $genero7  OR genero = $genero8  OR genero = $genero9  OR genero = $genero10  OR genero = $genero11  OR genero = $genero12  OR genero = $genero13  OR genero = $genero14  OR genero = $genero15  OR genero = $genero16  OR genero = $genero17  OR genero = $genero18  OR genero = $genero19  OR genero = $genero20  OR genero = $genero21)
				 AND classificacao_etaria = $cl_etar
				 ORDER BY id DESC");
		$stmt->execute();

		return $stmt->fetchAll();
	}

  /**
   * Query film details
   */
   function film ($id){
    global $conn;

    $stmt = $conn->prepare(
      "SELECT filme.id, filme.nome, ano, pontuacao_imdb, classificacao_etaria, duracao, sinopse, link_trailer, preco, quantidade_disponivel, cover, genero.nome AS genero
      FROM filme , genero
      WHERE
        filme.genero = genero.id AND
        filme.id = ?");

    $stmt->execute(array($id));

    return $stmt->fetch();
   }
?>
