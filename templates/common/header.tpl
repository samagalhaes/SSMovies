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

    <a href="{$BASE_URL}pages/order/cart.php" id="cart">
      <i class="fas fa-shopping-cart fa-lg"></i>
      <span>{$CART_QT}</span>
    </a>
  </nav>

  {if isset($SUCCESS_MESSAGES) OR isset($ERROR_MESSAGES)}
  <section id="message">
    {if isset($SUCCESS_MESSAGES)} {foreach $SUCCESS_MESSAGES as $success}
      <div class="success">{$success}</div>
    {/foreach} {/if}

    {if isset($ERROR_MESSAGES)} {foreach $ERROR_MESSAGES as $error}
      <div class="error">{$error}</div>
    {/foreach} {/if}
  </section>
  {/if}
