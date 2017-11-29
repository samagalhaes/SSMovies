<?php
	/**
	* Query the last films
	*/
  function listLatestFilms (){
    global $conn;

    $stmt = $conn->prepare("SELECT *
                            FROM filme
                            ORDER BY id DESC");
    $stmt->execute();

    return $stmt->fetchAll();
  } 
?>
