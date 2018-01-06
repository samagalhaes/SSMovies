<?php
  include_once('../../config/init.php');

	if(!empty($_POST["ano"])) $ano = $_POST["ano"];
	else $ano = !empty($ano) ? "'$ano'" : "ano";
	if(isset($_POST["opcao1"])) $genero1 = $_POST["opcao1"];
	else $genero1 = !empty($genero1) ? "'$genero1'" : "NULL";
	if(isset($_POST["opcao2"])) $genero2 = $_POST["opcao2"];
	else $genero2 = !empty($genero2) ? "'$genero2'" : "NULL";
	if(isset($_POST["opcao3"])) $genero3 = $_POST["opcao3"];
	else $genero3 = !empty($genero3) ? "'$genero3'" : "NULL";
	if(isset($_POST["opcao4"])) $genero4 = $_POST["opcao4"];
	else $genero4 = !empty($genero4) ? "'$genero4'" : "NULL";
	if(isset($_POST["opcao5"])) $genero5 = $_POST["opcao5"];
	else $genero5 = !empty($genero5) ? "'$genero5'" : "NULL";
	if(isset($_POST["opcao6"])) $genero6 = $_POST["opcao6"];
	else $genero6 = !empty($genero6) ? "'$genero6'" : "NULL";
	if(isset($_POST["opcao7"])) $genero7 = $_POST["opcao7"];
	else $genero7 = !empty($genero7) ? "'$genero7'" : "NULL";
	if(isset($_POST["opcao8"])) $genero8 = $_POST["opcao8"];
	else $genero8 = !empty($genero8) ? "'$genero8'" : "NULL";
	if(isset($_POST["opcao9"])) $genero9 = $_POST["opcao9"];
	else $genero9 = !empty($genero9) ? "'$genero9'" : "NULL";
	if(isset($_POST["opcao10"])) $genero10 = $_POST["opcao10"];
	else $genero10 = !empty($genero10) ? "'$genero10'" : "NULL";
	if(isset($_POST["opcao11"])) $genero11 = $_POST["opcao11"];
	else $genero11 = !empty($genero11) ? "'$genero11'" : "NULL";
	if(isset($_POST["opcao12"])) $genero12 = $_POST["opcao12"];
	else $genero12 = !empty($genero12) ? "'$genero12'" : "NULL";
	if(isset($_POST["opcao13"])) $genero13 = $_POST["opcao13"];
	else $genero13 = !empty($genero13) ? "'$genero13'" : "NULL";
	if(isset($_POST["opcao14"])) $genero14 = $_POST["opcao14"];
	else $genero14 = !empty($genero14) ? "'$genero14'" : "NULL";
	if(isset($_POST["opcao15"])) $genero15 = $_POST["opcao15"];
	else $genero15 = !empty($genero15) ? "'$genero15'" : "NULL";
	if(isset($_POST["opcao16"])) $genero16 = $_POST["opcao16"];
	else $genero16 = !empty($genero16) ? "'$genero16'" : "NULL";
	if(isset($_POST["opcao17"])) $genero17 = $_POST["opcao17"];
	else $genero17 = !empty($genero17) ? "'$genero17'" : "NULL";
	if(isset($_POST["opcao18"])) $genero18 = $_POST["opcao18"];
	else $genero18 = !empty($genero18) ? "'$genero18'" : "NULL";
	if(isset($_POST["opcao19"])) $genero19 = $_POST["opcao19"];
	else $genero19 = !empty($genero19) ? "'$genero19'" : "NULL";
	if(isset($_POST["opcao20"])) $genero20 = $_POST["opcao20"];
	else $genero20 = !empty($genero20) ? "'$genero20'" : "NULL";
	if(isset($_POST["opcao21"])) $genero21 = $_POST["opcao21"];
	else $genero21 = !empty($genero21) ? "'$genero21'" : "NULL";
	if(isset($_POST["grupo1"])) $cl_etar = $_POST["grupo1"];
	else $cl_etar = !empty($cl_etar) ? "'$cl_etar'" : "classificacao_etaria";

	if (isset($_POST["filtrar"]) AND !($genero1=="NULL" AND $genero2=="NULL" AND $genero3=="NULL" AND $genero4=="NULL" AND $genero5=="NULL" AND $genero6=="NULL" AND $genero7=="NULL" AND $genero8=="NULL" AND $genero9=="NULL" AND $genero10=="NULL" AND $genero11=="NULL" AND $genero12=="NULL" AND $genero13=="NULL" AND $genero14=="NULL" AND $genero15=="NULL" AND $genero16=="NULL" AND $genero17=="NULL" AND $genero18=="NULL" AND $genero19=="NULL" AND $genero20=="NULL" AND $genero21=="NULL")){
		$_SESSION["ano"] = $ano;
		$_SESSION["genero1"] = $genero1;
		$_SESSION["genero2"] = $genero2;
		$_SESSION["genero3"] = $genero3;
		$_SESSION["genero4"] = $genero4;
		$_SESSION["genero5"] = $genero5;
		$_SESSION["genero6"] = $genero6;
		$_SESSION["genero7"] = $genero7;
		$_SESSION["genero8"] = $genero8;
		$_SESSION["genero9"] = $genero9;
		$_SESSION["genero10"] = $genero10;
		$_SESSION["genero11"] = $genero11;
		$_SESSION["genero12"] = $genero12;
		$_SESSION["genero13"] = $genero13;
		$_SESSION["genero14"] = $genero14;
		$_SESSION["genero15"] = $genero15;
		$_SESSION["genero16"] = $genero16;
		$_SESSION["genero17"] = $genero17;
		$_SESSION["genero18"] = $genero18;
		$_SESSION["genero19"] = $genero19;
		$_SESSION["genero20"] = $genero20;
		$_SESSION["genero21"] = $genero21;
		$_SESSION["cl_etar"] = $cl_etar;
		
    if (isset($_GET['search'])) {
      header("Location: ".$BASE_URL."pages/films/films.php?page=1&search=".strip_tags($_GET['search']));
    }
    else {
      header("Location: ".$BASE_URL."pages/films/films.php?page=1");
    }
	 }
	elseif (isset($_POST["filtrar"]) AND ($genero1=="NULL" AND $genero2=="NULL" AND $genero3=="NULL" AND $genero4=="NULL" AND $genero5=="NULL" AND $genero6=="NULL" AND $genero7=="NULL" AND $genero8=="NULL" AND $genero9=="NULL" AND $genero10=="NULL" AND $genero11=="NULL" AND $genero12=="NULL" AND $genero13=="NULL" AND $genero14=="NULL" AND $genero15=="NULL" AND $genero16=="NULL" AND $genero17=="NULL" AND $genero18=="NULL" AND $genero19=="NULL" AND $genero20=="NULL" AND $genero21=="NULL")){
		$_SESSION["ano"] = $ano;
		$_SESSION["genero1"] = "genero";
		$_SESSION["genero2"] = $genero2;
		$_SESSION["genero3"] = $genero3;
		$_SESSION["genero4"] = $genero4;
		$_SESSION["genero5"] = $genero5;
		$_SESSION["genero6"] = $genero6;
		$_SESSION["genero7"] = $genero7;
		$_SESSION["genero8"] = $genero8;
		$_SESSION["genero9"] = $genero9;
		$_SESSION["genero10"] = $genero10;
		$_SESSION["genero11"] = $genero11;
		$_SESSION["genero12"] = $genero12;
		$_SESSION["genero13"] = $genero13;
		$_SESSION["genero14"] = $genero14;
		$_SESSION["genero15"] = $genero15;
		$_SESSION["genero16"] = $genero16;
		$_SESSION["genero17"] = $genero17;
		$_SESSION["genero18"] = $genero18;
		$_SESSION["genero19"] = $genero19;
		$_SESSION["genero20"] = $genero20;
		$_SESSION["genero21"] = $genero21;
		$_SESSION["cl_etar"] = $cl_etar;

    if (isset($_GET['search'])) {
      header("Location: ".$BASE_URL."pages/films/films.php?page=1&search=".strip_tags($_GET['search']));
    }
    else {
      header("Location: ".$BASE_URL."pages/films/films.php?page=1");
    }
	}
?>
