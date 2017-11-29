{include file='common/header.tpl'}

<section>
  <h1>
    Últimos Filmes
  </h1>

	<section>
		{foreach $latestFilms as $film}
			<section class="film-box">
				<img src={$film.cover} alt="{$film.nome}">
				<p class="nome"> {$film.nome} </p>
				<div>
					<span class="ano"> {$film.ano} </span>
					<span class="classificacaoEtaria"> {$film.classificacao_etaria} </span>
				</div>
			</section>	
		{/foreach}
	</section>

</section>

<aside>
  <h1>
    Dados de Login
  </h1>

  <section>
		username: user
		password: user
	</section>

  kndlvks
</aside>

{include file='common/footer.tpl'}
