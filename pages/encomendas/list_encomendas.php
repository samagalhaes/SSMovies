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
                <table class="list">
                    <tr>
                        <th>Código</th>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Valor Total</th>
                        <th>Estado da Compra</th>
                    </tr>

                    <?php
                        $estados = lista_estados_encomenda_db();
                        while ($estado = pg_fetch_assoc($estados)){
                            $estado_max_id = $estado["id"];
                        }

                        for ($i = 1; $i <= $estado_max_id; $i++){
                            $encomendas = check_encomenda_estado_db ($_SESSION["user_id"], $i);

                            while ($encomenda = pg_fetch_assoc($encomendas)){
                                $filmes = lista_encomenda_produtos_db ($encomenda["codigo"]);
                                $preco = 0;
                                while ($filme = pg_fetch_assoc($filmes)){
                                    $film_details = get_film_details_db($filme["id_filme"]);
                                    $preco = $preco + floatval(substr($film_details["preco"], 1));
                                }

                                echo "<tr style = \"text-align: center\">";
                                    echo "<td> <a href=\"../../pages/encomendas/list_encomenda.php?cod_encomenda=".  $encomenda["codigo"] ."\">" . $encomenda["codigo"] . "</td>";
                                    echo "<td>" . date("d/m/Y", strtotime($encomenda["data_inicio"]))  . "</td>";
                                    echo "<td>";
                                        if ($encomenda["data_fim"]) {
                                            echo date("d/m/Y", strtotime($encomenda["data_fim"]));
                                        } 
                                    echo "</td>";
                                    echo "<td> $preco </td>";
                                    echo "<td>". pg_fetch_assoc($estados,$i)["designacao"] ."</td>";
                                echo "</tr>";
                            }
                        }

                    ?>

                </table>
            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>