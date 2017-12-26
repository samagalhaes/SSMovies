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

  function isAdmin($username) {
    global $conn;

    $stmt = $conn->prepare('
      SELECT *
      FROM utilizador
      WHERE
        username = ? AND
        admin = true');
    $stmt->execute(array($username));

    if ($stmt->fetch != NULL)
      return true;
    else
      return false;
  }

  function createUser($name, $email, $username, $password, $telephone, $nif, $address, $postcode, $locality)
  {
    global $conn;

		$stmt = $conn->prepare("INSERT INTO utilizador (username, nome, email, password, telefone, nif, morada, codigo_postal, localidade)
														VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$stmt->execute(array($username, $name, $email, $password, $telephone, $nif, $address, $postcode, $locality));
  }

  function userData($username){
    global $conn;

    $stmt = $conn->prepare('
      SELECT username, nome, email, telefone, nif, morada, codigo_postal, localidade
      FROM utilizador
      WHERE username = ?');

    $stmt->execute (array($username));
    return $stmt->fetch();
  }
?>
