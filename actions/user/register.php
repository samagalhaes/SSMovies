<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/user.php');

  if (isset($_SESSION['username'])) {
      header('Location'. $BASE_URL . 'pages/films/home.php');
      exit;
  }

  if (!$_POST['username'] || !$_POST['firstName'] || !$_POST['email'] || !$_POST['password']) {
      $_SESSION['error_messages'][] = 'Campos obrigatórios não preenchidos!';
      $_SESSION['form_values'] = $_POST;
      header('Location: '.$BASE_URL.'pages/user/register.php');
      exit;
  }

  $options = ['cost' => 12];

  $name = strip_tags($_POST["firstName"]." ".$_POST["lastName"]);
  $email = strip_tags($_POST["email"]);
  $username = strip_tags($_POST["username"]);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT, $options);
  $telephone = strip_tags($_POST["telephone"]);
  $nif = strip_tags($_POST["nif"]);
  $address = strip_tags($_POST["address"]);
  $postcode = strip_tags($_POST["postcode1"].$_POST["postcode2"]);
  $locality = strip_tags($_POST["locality"]);

  try {
      createUser($name, $email, $username, $password, $telephone, $nif, $address, $postcode, $locality);
      $_SESSION["success_messages"][] = 'Utilizador registado com sucesso!';
      header('Location: ' . $BASE_URL);
  } catch (PDOException $error) {
      if (strpos($error->getMessage(), 'username_pkey') !== false) {
          $_SESSION['error_messages'][] = 'Nome de utilizador duplicado!';
      } elseif (strpos($error->getMessage(), 'email_pkey') !== false) {
          $_SESSION['error_messages'][] = 'Endereço de e-mail repetido!';
      } else {
          $_SESSION['error_messages'][] = 'Erro ao criar o novo utilizador!';
      }

      $_SESSION['form_values'] = $_POST;
      header('Location: '.$BASE_URL.'pages/user/register.php');
      exit;
  }

  header('Location: '.$BASE_URL);
?>
