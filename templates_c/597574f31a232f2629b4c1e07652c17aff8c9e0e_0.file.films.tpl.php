<?php
/* Smarty version 3.1.30, created on 2017-12-26 18:13:53
  from "/usr/users2/mieec2013/up201305659/public_html/trabalhosSiem/TrabalhoPHP-2/templates/films/films.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a429161e118d7_41544953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '597574f31a232f2629b4c1e07652c17aff8c9e0e' => 
    array (
      0 => '/usr/users2/mieec2013/up201305659/public_html/trabalhosSiem/TrabalhoPHP-2/templates/films/films.tpl',
      1 => 1514312030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_5a429161e118d7_41544953 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<section>
  <h1>
    Filmes
  </h1>

  <section class="flexbox">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['films']->value, 'film');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['film']->value) {
?>
	<section class="filmbox">
		<img src="<?php echo $_smarty_tpl->tpl_vars['film']->value['cover'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['film']->value['nome'];?>
" height="150px">
		<p class="filmname"><?php echo $_smarty_tpl->tpl_vars['film']->value['nome'];?>
</p>
		<div class="years">
			<span class="filmyear"><?php echo $_smarty_tpl->tpl_vars['film']->value['ano'];?>
</span>
			<span class="filmetar"><?php echo $_smarty_tpl->tpl_vars['film']->value['classificacao_etaria'];?>
</span>
      </div>
      <p class="filmpreco"><?php echo $_smarty_tpl->tpl_vars['film']->value['preco'];?>
</p>
	</section>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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

<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
