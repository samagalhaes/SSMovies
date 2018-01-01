{include file="common/header.tpl"}

<section id="list_encomenda">
	<h1>
		Encomenda
	</h1>
	<section class="tabela_encomendas">
		<table class="list">
			<tr>
				<th></th>
				<th class="left">Nome do filme</th>
				<th>qt</th>
				<th>Preço un.</th>
				<th>Preço</th>
			</tr>
			{foreach $encomenda as $film}
				<tr style="text-align:center">
					<td>
						<img src="{$film.cover}" alt="{$film.nome}">
					</td>
					<td class="left"> 
						{$film.nome}
					</td>
					<td>
							{$film.quantidade}
					</td>
					<td>
						{$film.preco} €
					</td>
					<td>
						{if $film.quantidade and $film.preco}
						 {math equation="x * y" x=$film.quantidade y=$film.preco} €
						{/if}
					</td>
				</tr>
			{/foreach}
		</table>
	</section>
</section>
	
{include file="common/footer.tpl"}
