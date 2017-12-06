{include file='common/header.tpl'}

<section>
  <h1>
    Últimos Filmes
  </h1>

<section class="flexbox">
	{foreach $films as $film}
		<section class="filmbox">
			<img src="{$film.cover}" alt="{$film.nome}" height="150px">
			<div class="filmname">{$film.nome}</div>
			<div class="filmyear">{$film.ano}</div><div class="filmetar">{$film.classificacao_etaria}</div>
			<div class="filmpreco">{$film.preco}</div>
		</section>
	{/foreach}
  </section>

</section>

<aside>
  <h1>
    Dados de Login
  </h1>

  <b>Conta de Utilizador</b>
	<br><b>Username:</b> user
	<br><b>Password:</b> user

	<p><b>Conta de Administrador</b>
	<br><b>Username:</b> admin
	<br><b>Password:</b> admin
</aside>

{include file='common/footer.tpl'}
