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
                ?>
            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>