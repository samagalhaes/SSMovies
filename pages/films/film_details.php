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

    $page_name = "Detalhes do filme";
    head($page_name);
?>

<body>
    <?php 
        display_header(); 
        main_menu($page_name);
    ?>

    <div id="page-content">
        <section class="fullsize">
            <h1 >Detalhes do filme</h1>
            <div class="content" id = "film-details">
                <?php
                    $film_details = get_film_details_db($_GET["film-id"]);
                    $film_genero = get_film_genero_db($film_details["genero"]);
                ?>
                
                <img src=<?= $film_details["cover"] ?> alt=<?php echo "\"" . $film_details["nome"] ."\"" ?> />
                <span>
                    <p id="film-title"><?= $film_details["nome"] ?></p>
                    <p id="film-particulars">
                        <?=$film_details["ano"]?> | 
                        M<?=$film_details["classificacao_etaria"]?> | 
                        <?=$film_genero["nome"]?> |
                        Duração: <?=$film_details["duracao"]?>min. |
                        IMDB: <?=$film_details["pontuacao_imdb"]?>
                    </p>
                    <p>
                        Preço: 
                        <?=
                            money_format('%(#1n', floatval(substr($film_details["preco"], 1)))
                        ?> €
                    </p>
                    <div id = "sinopse">
                        <?= $film_details["sinopse"] ?>
                    </div>
                    <div id = "trailer">
                        <iframe width="560" height="315" src=<?=$film_details["link_trailer"] . "?rel=0&amp;showinfo=0"?> frameborder="0"></iframe>
                    </div>
                </span>

                <form action="../../actions/films/action_film.php" method="GET">
                    <input type="text" name="film_id" value=<?=$film_details["id"]?> hidden>

                    <!-- Botão de Submit para o registo -->

                    <div style="text-align:right">

                        <?php
                            if ($_SESSION["user_id"] != NULL){
                                if (check_admin_db()){
                                    echo "<input type=\"submit\" name=\"remover\" value=\"Apagar filme\"/> ";
                                    echo "<input type=\"submit\" name=\"editar\" value=\"Editar filme\"/> ";
                                }

                                echo " <input type=\"submit\" name=\"Comprar\" value=\"Comprar filme\"/>";
                            }
                        ?>
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