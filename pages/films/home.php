<?php
    include_once("../../actions/common/session.php");
?>

<!doctype html>
<html>
<?php
    include_once("../../database/db_connect.php");
    include_once("../../apresentation/header.php");

    connect_db();

    $page_name = "Página Inicial";
    head($page_name);
?>

<body>
    <?php 
        display_header(); 
        main_menu($page_name);
    ?>

    <div id="page-content">
        <section class="left-size">
            <h1 >Últimos Filmes</h1>
            <div class="content">
                <?php
					$films = latest_films_db($conn);
                    
                    /* Adiciona cada um dos filme à página dentro de uma box */
					for ($i=0; $i < 10 && $filme = pg_fetch_assoc($films); $i++) {                     
                        
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
            <h1 >Informações de login</h1>
            <div class="content">
                <p style="font-weight: bolder; font-variant: small-caps"> Conta de Utilizador </p>
                <p><b>Username:</b> user </p>
                <p><b>Password:</b> user </p>

                <br />

                <p style="font-weight: bolder; font-variant: small-caps"> Conta de Administrador </p>
                <p><b>Username:</b> admin </p>
                <p><b>Password:</b> admin </p>
            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>
