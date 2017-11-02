<?php
    include_once("../../actions/common/session.php");
?>

<!doctype html>
<html>
<?php
    include_once("../../database/db_connect.php");
    include_once("../../apresentation/header.php");
    include_once("../../database/db_films.php");
    
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
					$films = get_films_db($conn);
                    $num_rows = pg_numrows($films);
                    
                    /* Adiciona cada um dos filme à página dentro de uma box */
					for ($i=0; $i < $num_rows; $i++) {
                        $filme = pg_fetch_assoc($films);
                        
                        echo "<div class=\"filme\"><a href=\"../../pages/films/film_details.php?film-id=" . $filme["id"] ."\">
                                <p>
                                    <img src=\"" . $filme["cover"] . "\" alt=\"". $filme["nome"] ."\" />
                                </p>
                                <p class=\"nome-filme\">" . $filme["nome"] . "</p> 
                                
                                <span class=\"ano\">" 
                                    . $filme["ano"] . 
                                "</span> 
                                <span class=\"cl_etar\">M/" 
                                    . $filme["classificacao_etaria"] . 
                                "</span>
                                <p>" 
                                     . money_format('%(#1n', floatval(substr($filme["preco"], 1))) . 
                                " &euro;</p>
							  </a></div>";
						
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
