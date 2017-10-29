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
        echo "<form method=\"POST\" action=\"#\">";
            echo "<table>";
                echo "<tr>";
                    echo "<td>username</td>";
                    echo "<td><input type=\"text\" name=\"username\" placeholder=\"username\"></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>password</td>";
                    echo "<td><input type=\"password\" name=\"password\" placeholder=\"password\"></td>";
                echo "</tr>";
            echo "</table>";

            echo "<input type=\"submit\" name=\"registar\" value=\"Registar\" /> ";
            echo " <input type=\"submit\" name=\"login\" value=\"Login\" />";
        echo "</form>";
    }

    function display_header (){
        echo "<div class=\"header\">";
            echo "<img src=\"../../img/logo/logo.png\" alt=\"SS Movies\" height=\"100px\" \>";
        echo "</div>";

        echo "<div class=\"login-area\">";
            login_form();
        echo "</div>";
    }
?>
