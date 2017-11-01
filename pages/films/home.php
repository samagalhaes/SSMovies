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
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In arcu ipsum, feugiat ac erat ac, aliquam hendrerit ex. Maecenas nisl tortor, dictum et volutpat id, suscipit vitae est. Vestibulum in interdum mi. Morbi viverra nibh in tellus suscipit efficitur ac in enim. Vivamus ultrices volutpat tristique. Phasellus et nunc vehicula, imperdiet nisl quis, varius sem. Praesent dictum pretium imperdiet. Phasellus eu convallis tortor. Aliquam fringilla ipsum magna, in finibus augue mollis eget. Quisque venenatis augue eget purus euismod egestas. Duis dignissim molestie augue, non dictum nisl lacinia at. Donec odio augue, facilisis nec massa eu, interdum tincidunt neque. Donec ac leo scelerisque, consequat felis vel, volutpat mi. Vivamus nulla ante, dictum eu eros nec, efficitur sollicitudin tortor. Donec nunc neque, tempus id interdum eu, pretium quis ante. Donec dictum laoreet velit efficitur blandit.
            </div>
        </section>

        <section class="right-size">
            <h1 >Informações de login</h1>
            <div class="content">
                <p style="font-weight: bolder; font-variant: small-caps"> Conta de Utilizador </p>
                <p><b>Username:</b> user </p>
                <p><b>Password:</b> user </p>

                <br />

                <p style="font-weight: bolder; font-variant: small-caps"> Conta de Administrador </p>
                <p><b>Username:</b> admin </p>
                <p><b>Password:</b> admin </p>
            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>