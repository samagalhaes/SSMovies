<?php
/*  function addOrder ($userId){
    global $conn;

    try {
      createOrder($userId);
    } catch (PDOException $error) {
      $_SESSION['error_messages'][] = 'Erro ao criar a encomenda!';
      header('Location: '.$_SERVER['HTTP_REFERER']);
      exit;
    }

    try {
      $order = getLastOrderId($userId)
    } catch (PDOException $error) {
      $_SESSION['error_messages'][] = 'Erro ao ler a encomenda!';
      header('Location: '.$_SERVER['HTTP_REFERER']);
      exit;
    }

    foreach ($_SESSION['cart'] as $film => $qt) {
      try {
        addFilm($order, $film, $qt)
      } catch (PDOException $error) {
        $_SESSION['error_messages'][] = 'Erro ao adicionar filmes à sua compra!';
        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
      }
    }
  }
*/
  function createOrder($id){
    global $conn;

    $stmt = $conn->prepare(
      "INSERT INTO encomenda (utilizador, estado, data_inicio)
      VALUES (?, ?, ?)");

    $stmt -> execute(array($id, 2, now));
  }

  function getLastOrderId ($id) {
    global $conn;

    $stmt = $conn->prepare(
      'SELECT *
      FROM encomenda
      WHERE utilizador = ?
      ORDER BY data_inicio DESC, codigo DESC
      LIMIT 1');

    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function addFilm ($cod, $id, $qt)
  {
    global $conn;

    $stmt = $conn->prepare(
      'INSERT INTO encomenda_filme (cod_encomenda, id_filme, quantidade)
      VALUES (?, ?, ?)'
    );

    $stmt->execute(array($cod, $id, $qt));
  }

  function updateAvailableFilmQt($id, $qt){
    global $conn;

    $stmt = $conn->prepare(
      'UPDATE filme
      SET quantidade_disponivel = ?
      WHERE id = ?'
    );

    $stmt->execute(array($qt, $id));
  }

?>
