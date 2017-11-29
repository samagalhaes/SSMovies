<?php
    /**
     * Pergunta quais são as entradas de um menu
     * 
     * @param type - tipo de menu
     *          - 0 main menu
     *          - 1 user menu
     *          - 2 admin menu
     * @retval matrix - matriz com o 
     *                      - nome do elemento 
     *                      - url
     */
    function listMenuItens ($typeMenu){
        global $conn;

        $stmt = $conn->prepare("SELECT nome, url
                                FROM menu
                                WHERE menu = ?
                                ORDER BY id");
        $stmt->execute(array($typeMenu));

        return $stmt->fetchAll();
    }
?>