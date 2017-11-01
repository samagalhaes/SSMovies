<?php

    /**
     * Pergunta quais são as entradas de um menu
     * 
     * @param connection - conexão à DB
     * @param type - tipo de menu
     *          - 0 main menu
     *          - 1 user menu
     *          - 2 admin menu
     * @retval matrix - matriz com o 
     *                      - nome do elemento 
     *                      - url
     */
    function query_menu_db ($type_menu){
        global $conn;

        $query = "SELECT nome, url
                  FROM menu
                  WHERE menu = $type_menu
                  ORDER BY id";

        return pg_exec($conn, $query);
    }
?>