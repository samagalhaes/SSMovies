<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR.'database/user.php');

	if (isset($_POST['register'])){
		header('LOCATION: '. $BASE_URL . 'pages/user/register.php');
		exit;
	}

	if (isset($_POST['login'])){

		if (!$_POST['username'] OR !$_POST['password']){
			$_SESSION['error_messages'][] = "Login inválido!";
			$_SESSION['form_values'] = $_POST;
			header('Location: '.$_SERVER['HTTP_REFERER']);
			exit;
		}

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = isLoginCorrect($username);

		if ($result['username'] !== false or password_verify($password, $result['password'])) {
			$_SESSION['success_messages'][] = 'Login efectuado com sucesso!';
			$_SESSION['user'] = $username;
			$_SESSION['admin'] = isAdmin($username);

			header('Location: '.$_SERVER['HTTP_REFERER']);
			exit;
		}
		else {
			$_SESSION['error_messages'][] = 'Username e/ou password inválidos!';
			header('Location: '.$_SERVER['HTTP_REFERER']);
			exit;
		}
	}
?>
