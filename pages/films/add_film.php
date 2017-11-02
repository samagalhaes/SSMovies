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

    $page_name = "Adicionar Filme";
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
            <h1>Adicionar filme</h1>
            <div class="content">
               <h2>Dados do filme</h2>

               <form action="../../actions/films/action_add_film.php" method="GET">
                   <p>
                       Nome do filme 
                       <input type="text" class="text-input" name="nome" size="120" required>
                   </p>
                   <table><tr>
                       <td>
                        Ano <input type="text" class="text-input" name="ano" size="4" maxlength="4" required>
                       </td>
                       <td>
                        Classificação etária
                        <Select name="classificacao_etaria" class="text-input" required>
                                <Option value="3">M/3</Option>
                                <Option value="6">M/6</Option>
                                <Option value="12">M/12</Option>
                                <Option value="14">M/14</Option>
                                <Option value="16">M/16</Option>
                                <Option value="18">M/18</Option>
                        </Select>
                       </td>
                       <td>
                        Duração
                        <input type="text" class="text-input" name="duracao" size="3" required/>
                       </td>
                       <td>
                        IMDB
                        <input type="text" class="text-input" name="imdb" size="4">
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
                                    echo "<Option value=\"$genero_id\">$genero_nome</Option>";
                                }
                        ?>
                        </Select>
                       </td>
                    </tr></table>
                    <p>
                        Trailer
                        <input type="url" class="text-input" size="130" name="trailer">
                    </p>
                    <p>
                        Cover
                        <input type="url" class="text-input" size="130" name="cover" required>
                    </p>
                    <p>
                        Sinopse
                    </p>
                    <p>
                        <textarea name="sinopse" class="text-input" cols="105" rows="5"></textarea>
                    </p>
                    <p>
                        Preço
                        <input type="text" class="text-input" size="5" name="preco" placeholder="00.00" required> €
                    </p>
                    <p>
                        Stock
                        <input type="number" class="text-input" name="stock" value="1" style="width=10px" required> un.
                    </p>

                    <!-- Botão de Submit para o registo -->
                    <div style="text-align:right">
                        <input type="submit" name="add" value="Adicionar filme"/>
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