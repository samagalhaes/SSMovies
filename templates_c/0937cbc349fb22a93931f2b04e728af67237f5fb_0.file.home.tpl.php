<?php
/* Smarty version 3.1.30, created on 2017-12-06 10:14:21
  from "/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/templates/films/home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a27c2fdccae65_65621619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0937cbc349fb22a93931f2b04e728af67237f5fb' => 
    array (
      0 => '/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/templates/films/home.tpl',
      1 => 1511951744,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_5a27c2fdccae65_65621619 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<section>
  <h1>
    Últimos Filmes
  </h1>

	<section>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['latestFilms']->value, 'film');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['film']->value) {
?>
			<section class="film-box">
				<img src=<?php echo $_smarty_tpl->tpl_vars['film']->value['cover'];?>
 alt="<?php echo $_smarty_tpl->tpl_vars['film']->value['nome'];?>
">
				<p class="nome"> <?php echo $_smarty_tpl->tpl_vars['film']->value['nome'];?>
 </p>
				<div>
					<span class="ano"> <?php echo $_smarty_tpl->tpl_vars['film']->value['ano'];?>
 </span>
					<span class="classificacaoEtaria"> <?php echo $_smarty_tpl->tpl_vars['film']->value['classificacao_etaria'];?>
 </span>
				</div>
			</section>	
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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

<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
