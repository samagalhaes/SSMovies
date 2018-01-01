{include file="common/header.tpl"}

<section id="gerir_encomenda">
	<h1>
		Gerir encomenda
	</h1>
	<section class=tabela_encomendas>
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
	<section id="estado_encomenda" style="text-align: right; padding:1em 0 1.5em 0">
		<form method="POST" action="../../actions/encomendas/edit_estado.php?cod_encomenda={$estado.codigo}" autocomplete="on">
			{html_options name=estado options=$myOptions selected=$estado.id}
			<button class="check" type="submit" name="confirmar"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i></button>
		</form>
	</section>
	<section id="info_client">
			<p><b>Nome:</b> {$info.nome}</p>
			<p><b>E-mail:</b> {$info.email}</p>
			<p><b>Telefone:</b> {$info.telefone}</p>
			<p><b>NIF:</b> {$info.nif}</p>
			<p><b>Morada:</b> {$info.morada}</p>
			<p><b>Código Postal:</b> {$info.codigo_postal}</p>
	</section>
	
{include file="common/footer.tpl"}
