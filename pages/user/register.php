<?php
    include_once("../../actions/common/session.php");

    /* Se o utilizador já tiver login, não é possível registar-se */
    if ($_SESSION["user_id"] != NULL){
        header("Location: ../films/home.php");
    }
?>

<!doctype html>
<html>

<!-- Inicialização da página -->
<?php
    include_once("../../database/db_connect.php");
    include_once("../../apresentation/header.php");

    $conn = connect_db();

    $page_name = "Registar";
    head($page_name);
?>

<!-- Corpo da página -->
<body>
    <?php 
        display_header(); 
        main_menu($conn, $page_name);
    ?>

    <div id="page-content">
        <section class="fullsize">
            <h1>Registar</h1>

            
           <div class="content">
                <h2>Dados de utilizador</h2>

                <!-- Criação do Formulário de registo -->
                <form method="POST" action="#" autocomplete="on">
                    <table>
                        <tr>
                            <td>
                                Nome
                            </td>
                            <td>
                                <input type="text" class="text-input" name="first_name" placeholder="Primeiro nome" required /> 
                                <input type="text" class="text-input" name="last_name" placeholder="Último nome" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                E-mail
                            </td>
                            <td>
                                <input type="email" class="text-input" name="email" size = "46" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nome de utilizador
                            </td>
                            <td>
                                <input type="text" class="text-input" name="username" size="46" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password
                            </td>
                            <td>
                                <input type="password" class="text-input" name="password" size="46" autocomplete="off" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Telefone
                            </td>
                            <td>
                                <input type="number" class="text-input" name="telephone" maxlength="9" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NIF
                            </td>
                            <td>
                                <input type="number" class="text-input" name="nif" maxlength="9" />
                            </td>
                        </tr>
                    </table>

                    <h2>Dados de Facturação</h2>

                    <p>
                        Morada
                        <input type="text" class="text-input" name="address" style="width:93%" required/>
                    </p>

                    <p>
                        Código Postal
                        <input type="text" class="text-input" name="post-code1" size="4" maxlength="4" style="width:33px" required/> &ndash; 
                        <input type="text" class="text-input" name="post-code2" size="3" maxlength="3" style="width:33px" required/> 
                        <input type="text" class="text-input" name="localidade" required>
                    </p>

                    <!-- Botão de Submit para o registo -->
                    <div style="text-align:right">
                        <input type="submit" name="registar" value="Registar"/>
                    </div>
                </form>
            </div>
        </section>
    </div>
  
    <?php 
        disconnect_db($conn);
    ?>
</body>
</html>