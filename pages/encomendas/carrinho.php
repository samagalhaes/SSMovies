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
                    /* Pergunta à base de dados qua é a compra ainda em aberto */
                    $encomendas = check_encomenda_estado_db ($_SESSION["user_id"], 1);

                    if (pg_numrows($encomendas)) {
                        $compra = pg_fetch_assoc($encomendas);

                        /* Pergunta à base de dados quais são os diferentes items dessa compra */
                        $lista_filmes = lista_encomenda_produtos_db ($compra["codigo"]);
                    }
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
                            <th></th>
                          </tr>";

                    if (pg_numrows($encomendas) > 0){
                        /* Imprime a lista de todos os filmes que estão na encomenda */
                        for ($i = 0; $i < pg_numrows($lista_filmes); $i++){
                            $filme = pg_fetch_assoc ($lista_filmes);
                            $film_details = get_film_details_db($filme["id_filme"]);
                            
                            $preco = floatval(substr($film_details["preco"], 1));
                            $total = $total + $filme["quantidade"] * $preco;

                            echo "<tr><form method=\"GET\" action =\"../../actions/encomendas/action_edit_encomenda.php\">
                                    <td>
                                        <img src=\"". $film_details["cover"] ."\" alt = \"" . $film_details["nome"] . "\">
                                    </td>
                                    <td class=\"left\">
                                        " . $film_details["nome"] ."
                                    </td>
                                    <td>
                                        <input type=\"number\" name=\"qt\" value=\"". $filme["quantidade"] ."\" style=\"width:40px\">
                                    </td>
                                    <td>
                                        $preco &euro;
                                    </td>
                                    <td>
                                        " . $preco*$filme["quantidade"] . " &euro;
                                    </td>
                                    <td>
                                        <button type=\"submit\" name=\"confirmar\"/><i class=\"fa fa-check-circle fa-2x\" aria-hidden=\"true\"></i></button>
                                        <button type=\"submit\" name=\"confirmar\"/><i class=\"fa fa-times-circle fa-2x\" aria-hidden=\"true\"></i></button>
                                    </td>
                                </form></tr>";
                        }
                    }

                    echo "</table>";

                    /* Insere o valor total da compra */
                    echo "<div id=\"compras-preco\"><b>Preço:</b> $total &euro;</div>";
                ?>

                <form action="../../actions/encomendas/action_concluir_compra.php" method="GET">
                    <input type="text" name="cod_encomenda" value=<?php echo "\"" . $compra["codigo"] . "\"" ?> hidden />

                    <!-- Botão de Submit para a compra -->
                    <div style="text-align:right">
                        <input type="submit" name="comprar" value="Finalizar Compra"/>
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