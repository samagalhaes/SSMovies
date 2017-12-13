<div id='login'>
	<form action="{$BASE_URL}actions/user/login.php" method="POST">
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
