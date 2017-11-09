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

                <table class="list">
                    <tr>
                        <th>Código</th>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Cliente</th>
                        <th>Estado</th>
						<th></th>
                    </tr>
					
                    <?php
                       $encomendas = lista_todas_encomendas_db();
					   $num_rows = pg_numrows($encomendas);
					   
					   for($i=0; $i < $num_rows; $i++) {
						    $encomenda = pg_fetch_assoc($encomendas);
							echo "<form method=\"POST\" action=\"../../actions/encomendas/action_edit_state_encomenda.php?cod_encomenda=". $encomenda["codigo"] ."\" autocomplete=\"on\">";
							echo "<tr style = \"text-align: center\">";
                                    echo "<td> <a href=\"../../pages/encomendas/gerir_encomenda.php?cod_encomenda=".  $encomenda["codigo"] ."\">" . $encomenda["codigo"] . "</td>";
                                    echo "<td>" . date("d/m/Y", strtotime($encomenda["data_inicio"]))  . "</td>";
                                    echo "<td>";
                                        if ($encomenda["data_fim"]) {
                                            echo date("d/m/Y", strtotime($encomenda["data_fim"]));
                                        }
                                    echo "</td>";
											$user = get_user_name_db($encomenda["utilizador"]);
											$user_name = pg_fetch_assoc($user)["nome"];
                                    echo "<td>$user_name</td>";
									echo "<td><Select name=\"estado\">";
											$estados = lista_estados_encomenda_db ();
											$numestados = pg_numrows($estados);

											for ($j=0; $j < $numestados; $j++){
												$estado = pg_fetch_assoc ($estados);
												$estado_id = $estado["id"];
												$estado_nome = $estado["designacao"];

											if ($estado_id == $encomenda["estado"]){
												echo "<Option value=\"$estado_id\" selected>$estado_nome</Option>";
											}
											else {
												echo "<Option value=\"$estado_id\" >$estado_nome</Option>";
										}
											};
									echo "</Select>";
                                    echo "<td><button type=\"submit\" name=\"confirmar\"/><i class=\"fa fa-check-circle fa-2x\" aria-hidden=\"true\"></i></button></td>";
                            echo "</tr>";
							echo "</form>";
								
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
