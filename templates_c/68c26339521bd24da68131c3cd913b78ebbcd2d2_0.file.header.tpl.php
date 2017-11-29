<?php
/* Smarty version 3.1.30, created on 2017-11-29 10:32:04
  from "/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/templates/common/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1e8ca4bb9731_51341162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68c26339521bd24da68131c3cd913b78ebbcd2d2' => 
    array (
      0 => '/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/templates/common/header.tpl',
      1 => 1511948140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1e8ca4bb9731_51341162 (Smarty_Internal_Template $_smarty_tpl) {
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
      <div id="logo">
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
img/logo/logo.png" alt="SS Movies">
      </div>
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
<?php }
}
