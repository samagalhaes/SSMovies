<?php
    /*** Include Section ***/
    include_once("../../actions/common/session.php");
    include_once($BASE_DIR."database/db_connect.php");
    include_once($BASE_DIR."apresentation/header.php");
    include_once($BASE_DIR."apresentation/menus.php");
    include_once($BASE_DIR."database/db_films.php");

    /*** Lógica do Negócio ***/
    $page_name = "Resultados da Pesquisa";
    connect_db();

    $search_results = search_db ($_GET["search"]);
    if (!$search_results){
        die("Erro ao obter resultados da DB");
    }
?>

<html>
<?php
    head($page_name);
?>

<body>
    <?php
        display_header();
        main_menu($page_name);    
    ?>

    <div id="page-content">
        <section class="fullsize">
            <h1><?=$page_name?></h1>
            
            <div class="content">
                <?php
                    while ($filme = pg_fetch_assoc($search_results)){
                ?>

                    <div class="filme"><a href="<?= $BASE_URL ?>pages/films/film_details.php?film-id=<?= $filme["id"] ?>">
                        <p><img src="<?= $filme["cover"] ?>" alt="<?= $filme["nome"] ?>"></p>

                        <p class="nome-filme"> <?= $filme["nome"] ?> </p>
                        <span class="ano"><?= $filme["ano"] ?></span>
                        <span class="cl_etar">M/<?= $filme["classificacao_etaria"] ?></span>
                        <p><?= money_format('%(#1n', floatval(substr($filme["preco"], 1))) ?> &euro;</p>
                    </a></div>

                <?php
                    }
                ?>
            </div>
        </section>
    </div>
</body>
</html>