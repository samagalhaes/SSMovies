<?php

	function isLoginCorrect ($username){
		global $conn;

		$options = ['cost' => 12];

		$stmt = $conn->prepare('SELECT *
														FROM utilizador
														WHERE username=?');
		$stmt->execute(array($username));

		return $stmt->fetch();
	}

?>
