{include file="common/header.tpl"}

<section id="list_encomendas">
	<h1>
		Encomendas
	</h1>
	<section class="tabela_encomendas">
		<table class="list clickable">
			<tr>
				<th>Código</th>
				<th>Data de Início</th>
				<th>Data de Fim</th>
				<th>Valor Total</th>
				<th>Estado da Compra</th>
			</tr>
			{foreach $encomendas as $encomenda}
				<tr style="text-align:center" onclick="window.location = '{$BASE_URL}pages/encomendas/list_encomenda.php?cod_encomenda={$encomenda.codigo}'">
					<td>
						{$encomenda.codigo}
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
						{$encomenda.preco} €
					</td>
					<td>
						{$encomenda.designacao}
					</td>
				</tr>
			{/foreach}
		</table>
	</section>
</section>

{include file="common/footer.tpl"}
