<?php
    /**
     * Cria o menu principal
     * 
     * @param conn - para perquntar à base de dados quais são os elementos do menu
     * @param page - para saber qual a página actual activa
     */
    function main_menu ($page){
        
        global $conn;
        include_once("../../database/db_menu.php");

        $menu = query_menu_db(0);
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

    /**
     * Cria os menus secundários para a gestão do utilizador e do admin
     */
    function secondary_menu($nome_pagina) {
        include_once("../../database/db_menu.php");
        include_once("../../database/db_user.php");
        include_once("../../database/db_connect.php");

        connect_db();

        /* Pergunta à DB quais são os elementos do menu para o utilizador normal */
        $menu_user = query_menu_db(1);
        $numrows_menu_user = pg_numrows($menu_user);

        /* Pergunta à DB quais são os elementos do menu para o administrador */
        $admin = check_admin_db();
        if ($admin == 1) {
            $menu_admin= query_menu_db(2);
            $numrows_menu_admin = pg_numrows($menu_admin);
        }

        echo "<ul id=\"secondary-menu\">";
            for ($i = 0; $i < $numrows_menu_user; $i++){
                $menu_element = pg_fetch_assoc($menu_user);

                if ($nome_pagina == $menu_element["nome"]){
                    echo "<li><a class=\"is-active\" href=\"" . $menu_element["url"] . "\">" . $menu_element["nome"] . "</li>";
                }
                else{
                    echo "<li><a href=\"" . $menu_element["url"] . "\">" . $menu_element["nome"] . "</li>";
                }
            }

            if ($admin == 1){
                for ($i = 0; $i < $numrows_menu_admin; $i++){
                    $menu_element = pg_fetch_assoc($menu_admin);
                    if ($nome_pagina == $menu_element["nome"]){
                        echo "<li><a class=\"is-active\" href=\"" . $menu_element["url"] . "\">" . $menu_element["nome"] . "</li>";
                    }
                    else{
                        echo "<li><a href=\"" . $menu_element["url"] . "\">" . $menu_element["nome"] . "</li>";
                    }
                }
            }
        echo "</ul>";
    }
?>