<?php
/* Smarty version 3.1.30, created on 2017-12-06 10:26:46
  from "/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/templates/common/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a27c5e6d50705_57845497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c99731d53b57960925add231f0441849d6dd6da' => 
    array (
      0 => '/usr/users2/mieec2013/up201304932/public_html/trabalhosSiem/TrabalhoPHP-2/templates/common/login.tpl',
      1 => 1512556005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a27c5e6d50705_57845497 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id='login'>
	<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/user/login.php" method="POST">
		<table>
			<tr>
				<td>
					username:
				</td>
				<td>
					<input type="text" placeholder="username" name='username'>
				</td>
			</tr>
			<tr>
				<td>
					password:
				</td>
				<td>
					<input type="password" placeholder="password" name='password'>
				</td>
			</tr>
		</table>

		<input type="submit" name="login" value="Login">
		<input type="submit" name="register" value="Registar">
	</form>
</div>
<?php }
}
