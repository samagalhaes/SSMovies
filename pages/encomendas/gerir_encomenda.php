<?php
    include_once("../../actions/common/session.php");
    check_session ("../../pages/films/home.php");
?>

<!doctype html>
<html>
<?php
    include_once("../../database/db_connect.php");
    include_once("../../apresentation/header.php");
    include_once("../../database/db_films.php");
    include_once("../../database/db_encomendas.php");
	include_once("../../database/db_user.php");
    
    connect_db();

    $page_name = "Carrinho de Compras";
    head($page_name);
?>

<body>
    <?php 
        display_header(); 
        main_menu($page_name);
    ?>

    <div id="page-content">
        <section class="fullsize">
            <h1 >Carrinho de Compras</h1>
            <div class="content">
                <?php
                    /* Pergunta à base de dados quais são os diferentes items de uma compra */
                    $lista_filmes = lista_encomenda_produtos_db ($_GET["cod_encomenda"]);

                    $total = 0;

                    echo "<table class = \"list\">";
                    echo "<tr>
                            <th></th>
                            <th class=\"left\">
                                Nome do filme
                            </th>
                            <th>
                                qt
                            </td>
                            <th>
                                Preço un.
                            </th>
                            <th>
                                Preço
                            </th>
                          </tr>";

                    /* Imprime a lista de todos os filmes que estão na encomenda */
                    for ($i = 0; $i < pg_numrows($lista_filmes); $i++){
                        $filme = pg_fetch_assoc ($lista_filmes);
                        $film_details = get_film_details_db($filme["id_filme"]);
                        
                        $preco = floatval(substr($film_details["preco"], 1));
                        $total = $total + $filme["quantidade"] * $preco;

                        echo "<tr>
                                <td>
                                    <img src=\"". $film_details["cover"] ."\" alt = \"" . $film_details["nome"] . "\">
                                </td>
                                <td class=\"left\">
                                    " . $film_details["nome"] ."
                                </td>
                                <td>
                                    ". $filme["quantidade"] ."
                                </td>
                                <td>
                                    $preco &euro;
                                </td>
                                <td>
                                    " . $preco*$filme["quantidade"] . " &euro;
                                </td>
                            </tr>";
                    }
                    echo "</table>";
					echo "<div style=\"text-align: right; padding-top:15px\">";
						echo "<form method=\"POST\" action=\"../../actions/encomendas/action_edit_state_encomenda.php?cod_encomenda=". $_GET["cod_encomenda"] ."\" autocomplete=\"on\">";
						echo "<Select name=\"estado\" class=\"text-input\">";
												$estados = lista_estados_encomenda_db ();
												$numestados = pg_numrows($estados);
												

												$encomendas = get_encomenda_db($_GET["cod_encomenda"]);
												
												while($encomenda = pg_fetch_assoc($encomendas)) {
													$encomenda_estado = $encomenda["estado"];
													$encomenda_user = $encomenda["utilizador"];
												}
												
												for ($j=0; $j < $numestados; $j++){
													$estado = pg_fetch_assoc ($estados);
													$estado_id = $estado["id"];
													$estado_nome = $estado["designacao"];

												if ($estado_id == $encomenda_estado){
													echo "<Option value=\"$estado_id\" selected>$estado_nome</Option>";
												}
												else {
													echo "<Option value=\"$estado_id\" >$estado_nome</Option>";
											}
												};
										echo "</Select>";
										echo "<button class=\"check\" type=\"submit\" name=\"confirmar\"/><i class=\"fa fa-check-circle fa-lg\" aria-hidden=\"true\"></i></button>";
										echo "</form>";
					echo "</div>";
					
					$users = get_user_name_db($encomenda_user);
					
					while($user = pg_fetch_assoc($users)) {
						$user_name = $user["nome"];
						$user_email = $user["email"];
						$user_telephone = $user["telefone"];
						$user_nif = $user["nif"];
						$user_address = $user["morada"];
						$user_postcode = $user["codigo_postal"];
						$user_city = $user["localidade"];
					}
					
					echo"<div style=\"padding-top:9px;\"><b>Nome:</b> ". $user_name ."</div>";
					echo"<div style=\"padding-top:9px;\"><b>E-mail:</b> ". $user_email ."</div>";
					echo"<div style=\"padding-top:9px;\"><b>Telefone:</b> ". $user_telephone ."</div>";
					echo"<div style=\"padding-top:9px;\"><b>NIF:</b> ". $user_nif ."</div>";
					echo"<div style=\"padding-top:9px;\"><b>Morada:</b> ". $user_address ."</div>";
					echo"<div style=\"padding-top:9px;\"><b>Código Postal:</b> ". $user_postcode ." ". $user_city ."</div>";
				?>
            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>
