<?php
  session_start();

  function getCartSize()
  {
      if (!isset($_SESSION['cart'])) {
          return 0;
      }
      $cart_size = 0;
      foreach ($_SESSION['cart'] as $id => $qty) {
          $cart_size += $qty;
      }
      return $cart_size;
  }

  function addToCart($id)
  {
      if (!isset($_SESSION['cart'])) {
          $_SESSION['cart'] = array();
      }
      if (!isset($_SESSION['cart'][$id])) {
          $_SESSION['cart'][$id] = 0;
      }
      $_SESSION['cart'][$id]++;
  }

  function updateCart($id, $qt)
  {
      if (!isset($_SESSION['cart'])) {
          $_SESSION['cart'] = array();
      }
      if (!isset($_SESSION['cart'][$id])) {
          $_SESSION['cart'][$id] = 0;
      }
      if ($qt == 0) {
        unset($_SESSION['cart'][$id]);
        return;
      }
      $_SESSION['cart'][$id] = $qt;
  }
