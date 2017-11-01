<?php
    include_once("../../actions/common/session.php");

    check_session("../../pages/films/home.php");
?>

<!doctype html>
<html>
<?php
    include_once("../../database/db_connect.php");
    include_once("../../apresentation/header.php");
    include_once("../../apresentation/menus.php");

    connect_db();

    $page_name = "Dados do utilizador";
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
            <h1>Dados do utilizador</h1>
            <div class="content">
                <h2>Dados do utilizador</h2>

                <p>
                    <b>Nome: </b>
                    <?= $user_data["nome"] ?>
                </p>
                <p>
                    <b>E-mail: </b>
                    <?= $user_data["email"] ?>
                </p>
                <p>
                    <b>Nome de utilizador: </b>
                    <?= $user_data["username"] ?>
                </p>
                <p>
                    <b>Telefone: </b>
                    <?= $user_data["telefone"] ?>
                </p>

            <h2>Dados de Facturação</h2>
                <p>
                    <b>NIF: </b>
                    <?= $user_data["nif"] ?>
                </p>
                <p>
                    <b>Morada: </b>
                    <?= $user_data["morada"] ?>
                </p>
                <p>
                    <b>Código Postal: </b>
                    <?= $user_data["codigo_postal"] . " " . $user_data["localidade"] ?>
                </p>
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