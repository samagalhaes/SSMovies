<?php
/* Smarty version 3.1.30, created on 2017-12-20 00:07:24
  from "/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/templates/common/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a39a9bcb66ff3_57934789',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68c26339521bd24da68131c3cd913b78ebbcd2d2' => 
    array (
      0 => '/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/templates/common/header.tpl',
      1 => 1513726550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/login.tpl' => 1,
  ),
),false)) {
function content_5a39a9bcb66ff3_57934789 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SS Movies</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/style.css">
  </head>
  <body>
    <header>
		<section class="flexbox2">
		  <div id="logo">
			<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
img/logo/logo.png" alt="SS Movies">
		  </div>
				<?php $_smarty_tpl->_subTemplateRender("file:common/login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		</section>
    </header>

		<nav>
      <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainMenu']->value, 'menuItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
?>
          <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['menuItem']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menuItem']->value['nome'];?>
</a>
          </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </ul>
    </nav>

  
  <?php if (isset($_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value, 'success');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['success']->value) {
?>
      <div class="success"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  <?php }?>

  <?php if (isset($_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value, 'success');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['success']->value) {
?>
      <div class="success"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  <?php }
}
}
