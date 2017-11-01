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

    $page_name = "Actualizar dados";
    head($page_name);
?>

<body>
    <?php 
        display_header(); 
        main_menu($page_name);
        
        $user_data = user_data_db();
        $user_data = pg_fetch_assoc($user_data);

        /* Separa o nome em primeiro e último */
        $space_pos = strpos($user_data["nome"], " ");

        if ($space_pos){
            $first_name = substr($user_data["nome"], 0, $space_pos);
            $last_name = substr($user_data["nome"], $space_pos+1);
        }
        else {
            $first_name = $user_data["nome"];
            $last_name = "";
        }

        /* Separa o código postal nas suas duas componentes */
        $dash_pos = strpos($user_data["codigo_postal"], "-");
        
        $codpost1 = substr($user_data["codigo_postal"], 0, $dash_pos);
        $codpost2 = substr($user_data["codigo_postal"], $dash_pos+1);
    ?>

    <div id="page-content">
        <section class="left-size">
            <h1>Dados do utilizador</h1>

            <div class="content">
                <!-- Criação do Formulário de registo -->
                <form method="POST" action="../../actions/user/action_register.php" autocomplete="on">
                    <table>
                        <tr>
                            <td>
                                Nome
                            </td>
                            <td>
                                <input type="text" class="text-input" name="first_name" value="<?= $first_name ?>" placeholder="Primeiro nome" required /> 
                                <input type="text" class="text-input" name="last_name" value="<?= $last_name ?>" placeholder="Último nome" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                E-mail
                            </td>
                            <td>
                                <input type="email" class="text-input" name="email" value="<?= $user_data["email"] ?>" size = "46" required readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nome de utilizador
                            </td>
                            <td>
                                <input type="text" class="text-input" name="username" size="46" value="<?= $user_data["username"] ?>" required readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password
                            </td>
                            <td>
                                <input type="password" class="text-input" name="password" size="46" autocomplete="off" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Telefone
                            </td>
                            <td>
                                <input type="text" class="text-input" name="telephone" value="<?= $user_data["telefone"] ?>" size="9" maxlength="9" />
                            </td>
                        </tr>
                    </table>

                    <h2>Dados de Facturação</h2>

                    <table>
                        <tr>
                            <td>
                                NIF
                            </td>
                            <td>
                                <input type="text" class="text-input" name="nif" value="<?= $user_data["nif"] ?>" size="9" maxlength="9" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Morada
                            </td>
                            <td>
                                <input type="text" class="text-input" name="address" value="<?= $user_data["morada"] ?>" style="width:93%" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Código Postal
                            </td>
                            <td>
                                <input type="text" class="text-input" name="post-code1" size="4" maxlength="4" style="width:33px" required value="<?= $codpost1 ?>"/> &ndash; 
                                <input type="text" class="text-input" name="post-code2" size="3" maxlength="3" style="width:33px" required value="<?= $codpost2 ?>"/> 
                                <input type="text" class="text-input" name="localidade" value="<?= $user_data["localidade"] ?>" required>
                            </td>
                        </tr>
                    </table>

                    <!-- Botão de Submit para o registo -->
                    <div style="text-align:right">
                        <input type="submit" name="update" value="Actualizar Dados"/>
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