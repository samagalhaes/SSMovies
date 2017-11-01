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

    function new_user_db ($name, $email, $username, $password, $telephone, $nif, $address, $postcode, $localidade) {
        global $conn;
            
        $query = "SELECT * FROM utilizador";
        $result = pg_exec ($conn, $query);
        $numrows = pg_numrows($result);
            
        $id = $numrows+1;
            
            
        $query2 = "INSERT INTO utilizador (id, 
                                           username, 
                                           nome, 
                                           email, 
                                           password, 
                                           telefone, 
                                           nif, 
                                           morada, 
                                           codigo_postal, 
                                           localidade, 
                                           admin)
                   VALUES ('$id', 
                           '$username', 
                           '$name', 
                           '$email', 
                           '$password', 
                           '$telephone', 
                           '$nif', 
                           '$address', 
                           '$postcode', 
                           '$localidade', 
                           'FALSE')"; 
                    
        pg_exec ($conn, $query2);
    }
    
    function update_user_db ($name, $email, $username, $password, $telephone, $nif, $address, $postcode, $localidade){
        global $conn;    
            
        $user_id = $_SESSION["user_id"];
        $query = "UPDATE utilizador
                  SET username      = '$username', 
                      nome          = '$name', 
                      email         = '$email', 
                      password      = '$password', 
                      telefone      = '$telephone', 
                      nif           = '$nif', 
                      morada        = '$address', 
                      codigo_postal = '$postcode', 
                      localidade    = '$localidade'
                  WHERE id = $user_id";

        return pg_exec ($conn, $query);
    }

    function check_admin_db() {
        global $conn;
        $user_id = $_SESSION["user_id"];

        $query = "SELECT admin
                  FROM utilizador
                  WHERE id = $user_id";

        $result = pg_exec($conn, $query);

        $admin = pg_fetch_assoc($result);

        if ($admin["admin"] = true){
            return 1;
        }
        else {
            return 0;
        }
    }
?>
