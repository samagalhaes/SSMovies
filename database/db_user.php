<?php
    function user_data_db ($conn){
        global $conn;
        $s_user_id = $_SESSION["user_id"]; /* lê o id do utilizador já registado por sessão */

        $query = "SELECT *
                  FROM utilizador
                  WHERE id = $s_user_id";

        return pg_exec ($conn, $query);
    }
?>