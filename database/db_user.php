<?php
    function user_data_db (){
        global $conn;
        $s_user_id = $_SESSION["user_id"]; /* lê o id do utilizador já registado por sessão */

        $query = "SELECT *
                  FROM utilizador
                  WHERE id = $s_user_id";

        return pg_exec ($conn, $query);
    }

    function check_login_db ($username, $password){
        global $conn;
        
        $query = "SELECT id
                  FROM utilizador
                  WHERE username = '$username' AND 
                        password = '$password'";

        $result = pg_exec ($conn, $query);
        $numrows = pg_numrows($result);
        
        if ($numrows > 0){
            $result_elem = pg_fetch_assoc ($result);
            return $result_elem["id"];
        }
        else
            return NULL;
    }
?>