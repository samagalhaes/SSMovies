<?php
  function isLoginCorrect($username)
  {
    global $conn;

    $options = ['cost' => 12];

    $stmt = $conn->prepare('SELECT *
						FROM utilizador
						WHERE username=?');
    $stmt->execute(array($username));

    return $stmt->fetch();
  }

  function createUser($name, $email, $username, $password, $telephone, $nif, $address, $postcode, $locality)
  {
    global $conn;

		$stmt = $conn->prepare("INSERT INTO utilizador (username, nome, email, password, telefone, nif, morada, codigo_postal, localidade)
														VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$stmt->execute(array($username, $name, $email, $password, $telephone, $nif, $address, $postcode, $locality));
  }
?>
