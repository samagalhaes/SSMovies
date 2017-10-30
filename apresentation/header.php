<?php
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
                    echo "<td>username: </td>";
                    echo "<td><input type=\"text\" name=\"username\" size=\"16\" placeholder=\"username\"></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>password: </td>";
                    echo "<td><input type=\"password\" size=\"16\"  name=\"password\" placeholder=\"password\"></td>";
                echo "</tr>";
            echo "</table>";

            echo "<input type=\"submit\" name=\"registar\" value=\"Registar\" /> ";
            echo " <input type=\"submit\" name=\"login\" value=\"Login\" />";
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
                $user = pg_fetch ($users, 0);

                echo "<p><a class=\"button\" href=\"#\"></a></p>";
                echo "<p>Olá, <a href=\"#\">" . $user["nome"] . "</a> CARRINHO </p>";
            }
        echo "</div>";
    }

    /**
     * Cria o menu principal
     * 
     * @param conn - para perquntar à base de dados quais são os elementos do menu
     * @param page - para saber qual a página actual activa
     */
    function main_menu ($page){

        global $conn;
        include_once("../../database/db_menu.php");

        $menu = query_menu_db($conn, 0);
        $num_rows = pg_numrows($menu);

        echo "<nav>";
            echo "<ul>";

                for ($i=0; $i < $num_rows; $i++){
                    $menu_element = pg_fetch_assoc($menu);

                    if ($page == $menu_element["nome"]){
                        echo "<li>
                                <a class=\"is-active\" href=\"" . $menu_element["url"] . "\">" 
                                    . $menu_element["nome"]. 
                                "</a>
                              </li>";
                    }
                    else {
                        echo "<li>
                                <a href=\"" . $menu_element["url"] . "\">" 
                                    . $menu_element["nome"]. 
                                "</a>
                              </li>";
                    }
                } 

            echo "</ul>";
        echo "</nav>";
    }
?>
