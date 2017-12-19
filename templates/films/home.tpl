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

<aside id="loginData">
  <h1>
    Dados de Login
  </h1>

  <section id="user">
	  <p class="title">Conta de Utilizador</p>
	  <p><b>Username:</b> user</p>
	  <p><b>Password:</b> user</p>
	</section>
	<section id="admin">
	  <p class="title">Conta de Administrador</p>
	  <p><b>Username:</b> admin</p>
	  <p><b>Password:</b> admin</p>
  </section>
</aside>

{include file='common/footer.tpl'}
