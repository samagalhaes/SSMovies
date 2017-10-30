<?php
    include_once("../../actions/common/session.php");
?>

<!doctype html>
<html>
<?php
    include_once("../../database/db_connect.php");
    include_once("../../apresentation/header.php");

    connect_db();

    $page_name = "Página Inicial";
    head($page_name);
?>

<body>
    <?php 
        display_header(); 
        main_menu($page_name);
    ?>

    <div id="page-content">
        <section class="left-size">
            <h1 >Últimos Filmes</h1>
            <div class="content">
                Lorem Ipsum
            </div>
        </section>

        <section class="right-size">
            <h1 >Informações de login</h1>
            <div class="content">

            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>