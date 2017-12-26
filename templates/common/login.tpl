{if ($user !== false)}
	<div id="loginActive">
		Olá, <a href="{$BASE_URL}pages/user/personal.php">{$user}</a>! <a href="{$BASE_URL}actions/user/logout.php"><i class="fas fa-sign-out-alt fa-lg"></i></a>
	</div>
{else}
	<div id='login'>
		<form action="{$BASE_URL}actions/user/login.php" method="POST">

			<p><input type="text" placeholder="username" name='username'></p>
			<p><input type="password" placeholder="password" name='password'></p>

			<input type="submit" name="login" value="Login">
			<input type="submit" name="register" value="Registar">
		</form>
	</div>
{/if}
