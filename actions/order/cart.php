<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/films.php');
  include_once($BASE_DIR.'database/user.php');
  include_once($BASE_DIR.'database/order.php');

  if (isset($_GET['buy'])) {
    addToCart($_GET['id']);
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;
  }

  if (isset($_GET['updateQt'])) {
    updateCart($_GET['id'], $_GET['qt']);
    header('Location: '.$BASE_URL.'pages/order/cart.php');
    exit;
  }

  if (isset($_GET['delete'])) {
    updateCart($_GET['id'], 0);
    header('Location: '.$BASE_URL.'pages/order/cart.php');
    exit;
  }

  if (isset($_POST['confirm'])) {
    /* Check if login was done */
    if (!(isset($_SESSION['user']))) {
      $_SESSION['error_messages'][] = 'Por favor, registe-se ou efetue login!';
      header('Location: '.$BASE_URL.'pages/order/cart.php');
      exit;
    }

    /* Get user data */
    try {
      $user = isLoginCorrect($_SESSION['user']);
    } catch (PDOException $error) {
      $_SESSION['error_messages'][] = 'Erro ao aceder ao dados de utilizador!';
      header('Location: '.$BASE_URL.'pages/order/cart.php');
      exit;
    }

    /* Check if user is real */
    if ($user == NULL) {
      die();
    }

    /* Check if the requested quantity is available */
    foreach ($_SESSION['cart'] as $filmId => $qt) {
      try {
        $film = film($filmId);
      } catch (PDOException $error) {
        $_SESSION['error_messages'][] = 'Filme inexistente!';
        header('Location: '.$BASE_URL.'pages/order/cart.php');
        exit;
      }

      if ($film['quantidade_disponivel'] == 0){
        $_SESSION['error_messages'][] = $film['nome'].' está indisponível!';
      }
      if ($film['quantidade_disponivel'] < $qt) {
        $_SESSION['error_messages'][] = $film['nome'].': apenas existem '. $film['quantidade_disponivel'].' produtos.';
      }
    }


    if (isset($_SESSION['error_messages'])){
      header('Location: '.$BASE_URL.'pages/order/cart.php');
      exit;
    }

    /* Create order */
    try {
      createOrder($user['id']);
    } catch (PDOException $error) {
      $_SESSION['error_messages'][] = 'Erro ao criar a encomenda!';
      header('Location: '.$BASE_URL.'pages/order/cart.php');
      exit;
    }

    /* Request the created order */
    try {
      $order = getLastOrderId($user['id']);
    } catch (PDOException $error) {
      $_SESSION['error_messages'][] = 'Erro ao ler a encomenda!';
      header('Location: '.$BASE_URL.'pages/order/cart.php');
      exit;
    }

    /* Add films to order */
    foreach ($_SESSION['cart'] as $filmId => $qt) {
      try {
        $film = film($filmId);
      } catch (PDOException $error) {
        $_SESSION['error_messages'][] = 'Filme inexistente!';
        header('Location: '.$BASE_URL.'pages/order/cart.php');
        exit;
      }

      /* Add film to order */
      try {
        addFilm($order['codigo'], $filmId, $qt);
      } catch (PDOException $error) {
        $_SESSION['error_messages'][] = $film['nome'].': erro ao adicionar à sua compra!';
        header('Location: '.$BASE_URL.'pages/order/cart.php');
        exit;
      }

      /* Update available quantity */
      try {
        updateAvailableFilmQt($filmId, $film['quantidade_disponivel']-$qt);
      } catch (PDOException $error) {
        $_SESSION['error_messages'][] = $film['nome'].': erro ao atualizar a quantidade disponível!';
        header('Location: '.$BASE_URL.'pages/order/cart.php');
        exit;
      }
    }

    /* Clear cart */
    unset($_SESSION['cart']);
    $_SESSION['success_messages'][] = 'Compra efetuada com sucesso!';
    header('Location: '.$BASE_URL);
  }
?>
