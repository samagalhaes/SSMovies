<?php
    include_once("../../actions/common/session.php");

    check_session("../../pages/films/home.php");
    check_admin("../../pages/user/personal.php");
?>

<!doctype html>
<html>
<?php
    include_once("../../database/db_connect.php");
    include_once("../../apresentation/header.php");
    include_once("../../apresentation/menus.php");
    include_once("../../database/db_films.php");

    connect_db();

    $page_name = "Editar filme";
    head($page_name);
?>

<body>
    <?php 
        display_header(); 
        main_menu($page_name);
        
        $user_data = user_data_db();
        $user_data = pg_fetch_assoc($user_data);
    ?>

    <div id="page-content">
        <section class="left-size">
            <h1>Editar filme</h1>
            <div class="content">
               <h2>Dados do filme</h2>

               <?php
                    $film_details = get_film_details_db($_GET["film-id"]);
                ?>

               <form action="../../actions/films/action_add_film.php" method="GET">
                   <p>
                       Nome do filme 
                       <input type="text" class="text-input" name="nome" size="120" value = <?php echo "\"" . $film_details["nome"] . "\""?> required>
                   </p>
                   <table><tr>
                       <td>
                        Ano <input type="text" class="text-input" name="ano" value = <?=$film_details["ano"]?> size="4" maxlength="4" required>
                       </td>
                       <td>
                        Classificação etária
                        <Select name="classificacao_etaria" class="text-input" required>
                                <Option value="3" 
                                    <?php
                                        if ($film_details["classificacao_etaria"] == 3)
                                            echo "Selected"
                                    ?>>M/3</Option>
                                <Option value="6"
                                    <?php
                                        if ($film_details["classificacao_etaria"] == 6)
                                            echo "Selected"
                                    ?>>M/6</Option>
                                <Option value="12"
                                    <?php
                                        if ($film_details["classificacao_etaria"] == 12)
                                            echo "Selected"
                                    ?></Option>
                                <Option value="14"
                                    <?php
                                        if ($film_details["classificacao_etaria"] == 14)
                                            echo "Selected"
                                    ?>>M/14</Option>
                                <Option value="16"
                                    <?php
                                        if (intval($film_details["classificacao_etaria"]) == 16)
                                            echo "selected"
                                    ?>>M/16</Option>
                                <Option value="18"
                                    <?php
                                        if ($film_details["classificacao_etaria"] == 18)
                                            echo "Selected"
                                    ?>>M/18</Option>
                        </Select>
                       </td>
                       <td>
                        Duração
                        <input type="text" class="text-input" name="duracao" size="3" value = <?=$film_details["duracao"]?> required/>
                       </td>
                       <td>
                        IMDB
                        <input type="text" class="text-input" name="imdb" value = <?=$film_details["pontuacao_imdb"]?> size="4">
                       </td>
                       <td>
                        Género
                        <Select name="genero" class="text-input" required>
                        <?php 
                                $generos = lista_generos_db ();
                                $numgeneros = pg_numrows($generos);

                                for ($i=0; $i < $numgeneros; $i++){
                                    $genero = pg_fetch_assoc ($generos);
                                    $genero_id = $genero["id"];
                                    $genero_nome = $genero["nome"];

                                    if ($genero_id == $film_details["genero"]){
                                        echo "<Option value=\"$genero_id\" selected>$genero_nome</Option>";
                                    }
                                    else {
                                        echo "<Option value=\"$genero_id\" >$genero_nome</Option>";
                                    }
                                }
                        ?>
                        </Select>
                       </td>
                    </tr></table>
                    <p>
                        Trailer
                        <input type="url" class="text-input" size="130" value = <?=$film_details["link_trailer"]?> name="trailer">
                    </p>
                    <p>
                        Cover
                        <input type="url" class="text-input" size="130" name="cover" value = <?=$film_details["cover"]?> required>
                    </p>
                    <p>
                        Sinopse
                    </p>
                    <p>
                        <textarea name="sinopse" class="text-input" cols="105" rows="5"><?= $film_details["sinopse"]?></textarea>
                    </p>
                    <p>
                        Preço
                        <input type="text" class="text-input" size="5" name="preco" placeholder="00.00" value = <?=money_format('%(#1n', floatval(substr($film_details["preco"], 1)))?> required> €
                    </p>
                    <p>
                        Stock
                        <input type="number" class="text-input" name="stock" style="width=10px" value = <?=$film_details["quantidade_disponivel"]?> required> un.
                    </p>

                    <input type="text" name="film_id" value=<?=$_GET["film-id"]?> hidden>

                    <!-- Botão de Submit para o registo -->
                    <div style="text-align:right">
                        <input type="submit" name="modificar" value="Modificar filme"/>
                    </div>
               </form>
            </div>
        </section>

        <section class="right-size">
            <h1 > Menu </h1>
            <div class="content">
                <?php 
                    secondary_menu($page_name);
                ?>
            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>