<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/films.php');

  $limite = 5;
  if (isset($_GET["page"])){
	$page  = $_GET["page"];
	if(!(is_numeric($page) == 1)) {
		$_SESSION['error_messages'][] = 'Essa página não existe!';
		header('Location: '.$BASE_URL.'pages/films/films.php?page=1');
	}
  }
  else {
	  $page=1;
	  unset($_SESSION["ano"]);
	  unset($_SESSION["genero1"]);
	  unset($_SESSION["genero2"]);
	  unset($_SESSION["genero3"]);
	  unset($_SESSION["genero4"]);
	  unset($_SESSION["genero5"]);
	  unset($_SESSION["genero6"]);
	  unset($_SESSION["genero7"]);
	  unset($_SESSION["genero8"]);
	  unset($_SESSION["genero9"]);
	  unset($_SESSION["genero10"]);
	  unset($_SESSION["genero11"]);
	  unset($_SESSION["genero12"]);
	  unset($_SESSION["genero13"]);
	  unset($_SESSION["genero14"]);
	  unset($_SESSION["genero15"]);
	  unset($_SESSION["genero16"]);
	  unset($_SESSION["genero17"]);
	  unset($_SESSION["genero18"]);
	  unset($_SESSION["genero19"]);
	  unset($_SESSION["genero20"]);
	  unset($_SESSION["genero21"]);
	  unset($_SESSION["cl_etar"]);
  }
  $inicio = ($page-1) * $limite;

  if (!isset($_SESSION["ano"]) AND !isset($_SESSION["genero1"]) AND !isset($_SESSION["genero2"]) AND !isset($_SESSION["genero3"]) AND !isset($_SESSION["genero4"]) AND !isset($_SESSION["genero5"]) AND !isset($_SESSION["genero6"]) AND !isset($_SESSION["genero7"]) AND !isset($_SESSION["genero8"]) AND !isset($_SESSION["genero9"]) AND !isset($_SESSION["genero10"]) AND !isset($_SESSION["genero11"]) AND !isset($_SESSION["genero12"]) AND !isset($_SESSION["genero13"]) AND !isset($_SESSION["genero14"]) AND !isset($_SESSION["genero15"]) AND !isset($_SESSION["genero16"]) AND !isset($_SESSION["genero17"]) AND !isset($_SESSION["genero18"]) AND !isset($_SESSION["genero19"]) AND !isset($_SESSION["genero20"]) AND !isset($_SESSION["genero21"]) AND !isset($_SESSION["cl_etar"])) {

	  $num_registos = filmCount();
	  $paginas_totais = ceil($num_registos / $limite);

    if (isset($_GET['search'])){
      $films = search(strip_tags($_GET['search']));
    }
    else {
      $films = listAllFilms($inicio, $limite);
    }

  	$smarty->assign ('films', $films);
  }

  else {
	$ano = $_SESSION["ano"];
	$genero1 = $_SESSION["genero1"];
	$genero2 = $_SESSION["genero2"];
	$genero3 = $_SESSION["genero3"];
	$genero4 = $_SESSION["genero4"];
	$genero5 = $_SESSION["genero5"];
	$genero6 = $_SESSION["genero6"];
	$genero7 = $_SESSION["genero7"];
	$genero8 = $_SESSION["genero8"];
	$genero9 = $_SESSION["genero9"];
	$genero10 = $_SESSION["genero10"];
	$genero11 = $_SESSION["genero11"];
	$genero12 = $_SESSION["genero12"];
	$genero13 = $_SESSION["genero13"];
	$genero14 = $_SESSION["genero14"];
	$genero15 = $_SESSION["genero15"];
	$genero16 = $_SESSION["genero16"];
	$genero17 = $_SESSION["genero17"];
	$genero18 = $_SESSION["genero18"];
	$genero19 = $_SESSION["genero19"];
	$genero20 = $_SESSION["genero20"];
	$genero21 = $_SESSION["genero21"];
	$cl_etar = $_SESSION["cl_etar"];

  $search = (isset($_GET['search'])) ? strip_tags($_GET['search']) : NULL;

	$num_registos = filteredFilmCount($ano, $genero1, $genero2, $genero3, $genero4, $genero5, $genero6, $genero7, $genero8, $genero9, $genero10, $genero11, $genero12, $genero13, $genero14, $genero15, $genero16, $genero17, $genero18, $genero19, $genero20, $genero21, $cl_etar, $search);
	$paginas_totais = ceil($num_registos / $limite);

	$films = filterFilms($inicio, $limite, $ano, $genero1, $genero2, $genero3, $genero4, $genero5, $genero6, $genero7, $genero8, $genero9, $genero10, $genero11, $genero12, $genero13, $genero14, $genero15, $genero16, $genero17, $genero18, $genero19, $genero20, $genero21, $cl_etar, $search);

  	$smarty->assign ('films', $films);
  }

  if($paginas_totais > 0) {
		if ($page > $paginas_totais) {
			$_SESSION['error_messages'][] = 'Essa página não existe!';
			header('Location: '.$BASE_URL.'pages/films/films.php?page=1');
		}
  }

  if ($num_registos == 0) {
	  $_SESSION['error_messages'][] = 'Não existem filmes com esses critérios!';
    header('Location: '.$BASE_URL.'pages/films/films.php');
  }

  $smarty->assign('paginas_totais', $paginas_totais);

  if (isset($_GET['search'])) {
    $smarty->assign('search', strip_tags($_GET['search']));
  }

  $smarty->display('films/films.tpl');
?>
