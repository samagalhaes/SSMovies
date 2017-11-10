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
                    Somos dois estudantes de Engenharia Eletrotécnica na Faculdade de Engenharia da Universidade do Porto e estamos a realizar este trabalho no âmbito da UC de Sistemas de Informação Empresariais. 
                </p>
                <p>
                    Ambos gostamos de ver filmes no nosso tempo livre, por isso decidimos que seria interessante que o nosso trabalho fosse sobre este assunto, já que não só nos permite consolidar os conhecimentos que se pretendem adquirir, mas também conseguimos descobrir filmes que possam ser interessantes.
                </p>
                <p>
                    Esperamos que desfrute da sua visita!
                </p>

                <div class="author">
                    <p><img src="../../img/authors/sandro.jpg" alt="Sandro Magalhães" /></p>

                    <div class="textbox">
                        Sandro Magalhães <br /> 
                        up201304932@fe.up.pt 
                    </div>
                </div>

                <div class="author">
                    <p><img src="../../img/authors/sergio.jpg" alt="Sérgio Fernandes" /></p>

                    <div class="textbox">
                            Sérgio Fernandes <br /> 
                            up201305659@fe.up.pt
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php 
        disconnect_db();
    ?>
</body>
</html>
