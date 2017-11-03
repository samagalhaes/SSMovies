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
		<form method="POST" action="../../actions/films/action_filter.php" autocomplete="on">
					<table>
						<tr>
							<td>
								<b>Ano</b>
							</td>
						</tr>
						<tr>
							<td>
								<input type="number" class="text-input" name="ano" size = "30" maxlength="4" />
							</td>
						</tr>
						<tr>
							<td>
								<b>Género</b>
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao1" value="1">	Acção
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao2" value="2"> Aventura
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao3" value="3"> Animação
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao4" value="4"> Biografia
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao5" value="5"> Comédia
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao6" value="6"> Crime
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao7" value="7"> Documentário
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao8" value="8"> Drama
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao9" value="9"> Família
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao10" value="10"> Fantasia
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao11" value="11"> Filme Negro
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao12" value="12"> História
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao13" value="13"> Horror
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao14" value="14"> Música
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao15" value="15"> Musical
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao16" value="16"> Mistério
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao17" value="17"> Romance
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao18" value="18"> Ficção Científica
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao19" value="19"> Desporto
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao20" value="20"> Thriller
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="opcao21" value="21"> Guerra
							</td>
						</tr>
						<tr>
							<td>
								<b>Classificação Etária</b>
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="grupo1" value="3"> M/3
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="grupo1" value="6"> M/6
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="grupo1" value="12"> M/12
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="grupo1" value="14"> M/14
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="grupo1" value="16"> M/16
							</td>
						</tr>
						<tr>
							<td>
								<input type="radio" name="grupo1" value="18"> M/18
							</td>
						</tr>
					</table>
					<div style="text-align:right">
                        <input type="submit" name="filtrar" value="Filtrar"/>
                    </div>
				</form>
            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>
