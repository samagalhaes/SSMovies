<!DOCTYPE html>
<html>
  <head>
    <title>SS Movies</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{$BASE_URL}css/style.css">
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
            <a href="{$BASE_URL} {$menuItem.url}">{$menuItem.nome}</a>
          </li>
        {/foreach}
      </ul>
    </nav>
