<!DOCTYPE html>
<html>

<head>
  <title>SS Movies {if (isset($TITLE))} | {$TITLE} {/if} </title>
  <link rel="icon" href="{$BASE_URL}img/logo/favicon.png">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{$BASE_URL}css/style.css">
  <link rel="stylesheet" href="{$BASE_URL}css/fonts.css">
  <link rel="stylesheet" href="{$BASE_URL}css/fontawesome-all.css">

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="{$BASE_URL}javascript/main.js"></script>

</head>

<body>
  <header>
    <section class="flexbox2">
      <div id="logo">
        <img src="{$BASE_URL}img/logo/logo.png" alt="SS Movies">
      </div>
      {include file='common/login.tpl'}
    </section>
  </header>

  <nav>
    <ul>
      {foreach $mainMenu as $menuItem}
      <li>
        <a href="{$BASE_URL}{$menuItem.url}" {if ($BASE_URL|cat:$menuItem.url == $REQUEST_URI)} class="selected" {/if}>{$menuItem.nome}</a>
      </li>
      {/foreach}
    </ul>

    <form id="search" action="{$BASE_URL}pages/films/films.php" method="GET">
      <input type="text" name="search" value="" placeholder="Pesquisar">
      <button type="submit" name="searchButton"><i class="fas fa-search fa-lg"></i></button>
    </form>

    <a href="{$BASE_URL}pages/order/cart.php" id="cart">
      <i class="fas fa-shopping-cart fa-lg"></i>
      <span>{$CART_QT}</span>
    </a>
  </nav>

  {if isset($SUCCESS_MESSAGES) OR isset($ERROR_MESSAGES)}
  <section id="message">
    {if isset($SUCCESS_MESSAGES)} {foreach $SUCCESS_MESSAGES as $success}
      <div class="success">{$success} <a class="close" href="#">&#215;</a></div>
    {/foreach} {/if}

    {if isset($ERROR_MESSAGES)} {foreach $ERROR_MESSAGES as $error}
      <div class="error">{$error}<a class="close" href="#">&#215;</a></div>
    {/foreach} {/if}
  </section>
  {/if}
