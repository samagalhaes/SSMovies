<?php
    include_once("../../actions/common/session.php");
?>

<!doctype html>
<html>
<?php
    include_once("../../database/db_connect.php");
    include_once("../../apresentation/header.php");
	  include_once("../../database/db_film.php");
    connect_db();
    $page_name = "Filmes";
    head($page_name);
?>

<body>
    <?php 
        display_header(); 
        main_menu($page_name);
    ?>

    <div id="page-content">
        <section class="left-size">
            <h1 >Filmes</h1>
            <div class="content">
                <?php
					global $conn;
					$films = get_films_db($conn);
					$num_rows = pg_numrows($films);
					for ($i=0; $i < $num_rows; $i++) {
						$filme = pg_fetch_assoc($films);
						echo "&nbsp <div class=\"filme\">
							<center><p><img src=\"" . $filme["cover"] . "\" alt=\"" . $filme["nome"] . "\" /></p>
							<p>" . $filme["nome"] . "</p>
							<div class=\"ano\">" . $filme["ano"] . "</div> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <div class=\"cl_etar\">M/" . $filme["classificacao_etaria"] . "</div>
							<p>" . $filme["preco"] . "</p></center>
							</div> &nbsp";
						if ((($i+1)/7)==1) {
							print("<br><br>");
						}
						
					}
				?>
            </div>
        </section>

        <section class="right-size">
            <h1 >Filtros</h1>
            <div class="content">

            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>
