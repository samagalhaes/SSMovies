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
?>
