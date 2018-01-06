<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/films.php');

  $TITLE = 'Carrinho de Compras';

  try {
    $films = getCart();
  } catch (PDOException $error) {
    $_SESSION['error_messages'][] = 'Erro ao listar o carrinho de compras!';
    header('Location: '.$INIT_PAGE);
    exit;
  }

  $total = 0;
  foreach ($films as $film) {
    $total = $total + $film['preco']*$film['qt'];
  }

  $smarty->assign('cart', $films);
  $smarty->assign('total', $total);
  $smarty->display('order/cart.tpl');

?>
