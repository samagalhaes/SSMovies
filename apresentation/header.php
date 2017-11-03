<?php
    include_once("../../apresentation/menus.php");

    function head ($title){
        echo "<head>";
            echo "<meta http-equiv=\"Content-Type\" content=\text/html; charset=utf-8\" />";
            echo "<meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">";
            echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";

            echo "<title>SS Movies | $title</title>";
            echo "<link rel=\"icon\" href=\"../../img/logo/icon.png\" />";
        
            /* CSS Files */
            echo "<link rel=\"stylesheet\" href=\"../../styles/style.css\">";
        echo "</head>";
    }

    function login_form (){
        echo "<form method=\"POST\" action=\"../../actions/user/action_login.php\">";
            echo "<table>";
                echo "<tr>";
                    echo "<td>username: </td>" . $_SESSION["user_id"];
                    echo "<td><input type=\"text\" name=\"username\" size=\"16\" placeholder=\"username\"></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>password: </td>";
                    echo "<td><input type=\"password\" size=\"16\"  name=\"password\" placeholder=\"password\"></td>";
                echo "</tr>";
            echo "</table>";

            echo " <input type=\"submit\" name=\"login\" value=\"Login\" autofocus />";
            echo "<input type=\"submit\" name=\"registar\" value=\"Registar\" /> ";
        echo "</form>";
    }

    function login_id (){
        
    }

    function display_header (){
   
        include_once("../../database/db_user.php");

        echo "<div class=\"header\">";
            echo "<img src=\"../../img/logo/logo.png\" alt=\"SS Movies\" height=\"100px\" \>";
        echo "</div>";

        echo "<div class=\"login-area\">";
            /* Se ainda não houver login, mostra a janela de login */
            if ($_SESSION["user_id"] == NULL){
                login_form();
            }

            /* Se já houver login, mostra o nome de utilizador */
            else {
                $users = user_data_db ();
                $user = pg_fetch_row ($users, 0);

                echo "<p><a class=\"button\" href=\"../../actions/user/action_logout.php\">Logout</a></p>";
                echo "<p>Olá, <a href=\"../../pages/user/personal.php\">" . $user[1] . "</a> <a href=\"../../pages/encomendas/carrinho.php\">CARRINHO</a></p>";
            }
        echo "</div>";
    }
?>
