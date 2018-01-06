{include file="common/header.tpl"}

<section id="gerir_encomendas">
	<h1>
		Gerir encomendas
	</h1>
	<section class="tabela_encomendas">
		<table class="list">
			<tr>
				<th>Código</th>
				<th>Data de Início</th>
				<th>Data de Fim</th>
				<th>Cliente</th>
				<th>Estado da Compra</th>
				<th></th>
			</tr>
			{foreach $encomendas as $encomenda}
				<form method="POST" action="{$BASE_URL}actions/encomendas/edit_estado.php?cod_encomenda={$encomenda.codigo}" autocomplete="on">
					<tr style="text-align:center">
						<td>
							<a href="{$BASE_URL}pages/encomendas/gerir_encomenda.php?cod_encomenda={$encomenda.codigo}">{$encomenda.codigo}</a>
						</td>
						<td> 
							{$encomenda.data_inicio|date_format:"%d/%m/%y"}
						</td>
						<td>
							{if {$encomenda.data_fim}}
								{$encomenda.data_fim|date_format:"%d/%m/%y"}
							{/if}
						</td>
						<td>
							{$encomenda.nome}
						</td>
						<td>
							{html_options name=estado options=$myOptions selected=$encomenda.id}
						</td>
						<td>
							<button type="submit" name="confirmar"/><i class="fa fa-check-circle fa-2x" aria-hidden="true"></i></button>
						</td>
					</tr>
				</form>
			{/foreach}
		</table>
	</section>
</section>

{include file="common/footer.tpl"}
