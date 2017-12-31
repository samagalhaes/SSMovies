{include file='common/header.tpl'}

<section>
  <h1>
    Filmes
  </h1>

  <section class="flexbox">
	{foreach $films as $film}
	<section class="filmbox">
		<img src="{$film.cover}" alt="{$film.nome}" height="150px">
		<p class="filmname">{$film.nome}</p>
		<div class="years">
			<span class="filmyear">{$film.ano}</span>
			<span class="filmetar">{$film.classificacao_etaria}</span>
      </div>
      <p class="filmpreco">{$film.preco}</p>
	</section>
	{/foreach}
  </section>

</section>

<aside id="filters">
  <h1>
    Filtros
  </h1>

  <form method="POST" action="../../actions/films/filter.php" autocomplete="on">
	<table>
		<tr>
			<td>
				<b>Ano</b>
			</td>
		</tr>
		<tr>
			<td>
				<input type="number" class="text-input" name="ano" size = "30" maxlength="4" />
			</td>
		</tr>
		<tr>
			<td>
				<b>Género</b>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao1" value="1">	Acção
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao2" value="2"> Aventura
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao3" value="3"> Animação
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao4" value="4"> Biografia
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao5" value="5"> Comédia
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao6" value="6"> Crime
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao7" value="7"> Documentário
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao8" value="8"> Drama
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao9" value="9"> Família
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao10" value="10"> Fantasia
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao11" value="11"> Filme Negro
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao12" value="12"> História
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao13" value="13"> Horror
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao14" value="14"> Música
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao15" value="15"> Musical
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao16" value="16"> Mistério
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao17" value="17"> Romance
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao18" value="18"> Ficção Científica
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao19" value="19"> Desporto
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao20" value="20"> Thriller
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="opcao21" value="21"> Guerra
			</td>
		</tr>
		<tr>
			<td>
				<b>Classificação Etária</b>
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="grupo1" value="3"> M/3
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="grupo1" value="6"> M/6
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="grupo1" value="12"> M/12
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="grupo1" value="14"> M/14
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="grupo1" value="16"> M/16
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="grupo1" value="18"> M/18
			</td>
		</tr>
	</table>
	<div style="text-align:right">
		<input type="submit" name="filtrar" value="Filtrar"/>
	</div>
  </form>
  
</aside>

{include file='common/footer.tpl'}