<?php
    include_once("../../actions/common/session.php");
?>

<!doctype html>
<html>
<?php
    include_once("../../apresentation/header.php");
    
    include_once("../../database/db_connect.php");

    connect_db();

    $page_name = "Sobre Nós";
    head($page_name);
?>

<body>
    <?php 
        display_header(); 
        main_menu($page_name);
    ?>

    <div id="page-content">
        <section class="fullsize">
            <h1> <?=$page_name?></h1>
            <div class="content">
                <p>
                    Aqui poderá efetuar o download dos ficheiros de código HTML, PHP e CSS, bem como o powerpoint do mockup da ideia original para a construção deste site. 
                </p>

                <div class="download">
                    <a href="../../files/mockup.pptx"><img src="../../img/report/ppt.png" alt="Mockup PowerPoint"></a>
                </div>

                <div class="download">
                    <a href="../../files/mockup.pptx"><img src="../../img/report/code.png" alt="Mockup PowerPoint"></a>
                </div>

                <div class="download">
                    <a href="../../files/mockup.pptx"><img src="../../img/report/css.png" alt="Mockup PowerPoint"></a>
                </div>

            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>
