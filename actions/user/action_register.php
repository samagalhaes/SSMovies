<?php
    
	$name = $_POST["first_name"] . " " . $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $telephone = $_POST["telephone"];
    $nif = $_POST["nif"];
    $address = $_POST["address"];
    $postcode = $_POST["post-code1"] . "-" . $_POST["post-code2"];
    $localidade = $_POST["localidade"];
	
	include_once ("../../database/db_connect.php");
    include_once ("../../database/db_user.php");
	
	global $conn;
	
	if (!isset($conn)){
            connect_db();
        }
	
	if (isset($_POST["registar"])){
		new_user_db($name, $email, $username, $password, $telephone, $nif, $address, $postcode, $localidade);
	}
	
?>
