<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR.'database/user.php');

  if (!isset($_SESSION['user'])){
    header('Location: ' . $BASE_URL);
    exit;
  }

  $options = ['cost' => 12];

  if (!($_POST['password'] == $_POST['confirmPassword'])) {
    $_SESSION['error_messages'][] = 'As passwords não coincidem!';
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;
  }

  $name = strip_tags($_POST["name"]);
  $email = strip_tags($_POST["email"]);
  $username = strip_tags($_SESSION["user"]);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT, $options);
  $telephone = strip_tags($_POST["telephone"]);
  $nif = strip_tags($_POST["nif"]);
  $address = strip_tags($_POST["address"]);
  $postcode = strip_tags($_POST["postcode1"].$_POST["postcode2"]);
  $locality = strip_tags($_POST["locality"]);

  try {
    updateUser($name, $email, $username, $password, $telephone, $nif, $address, $postcode, $locality);
    $_SESSION['success_messages'][] = 'Dados alterados com sucesso!';
  } catch (PDOException $error) {
    $_SESSION['error_messages'][] = 'Erro ao atualizar os dados!';
  }

  header('Location: '.$_SERVER['HTTP_REFERER']);
?>
