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
        
        $query = "SELECT *
				   FROM utilizador
				   WHERE username = '$username' OR
						 email = '$email'";
		 $result = pg_exec ($conn, $query);
		 $num_rows = pg_numrows($result);
		 
		 if($num_rows > 0) {
			 return NULL;
		 }
            
        $query2 = "SELECT * FROM utilizador";
        $result2 = pg_exec ($conn, $query2);
        $num_rows2 = pg_numrows($result2);
            
        $id = $num_rows2+1;
            
            
        $query3 = "INSERT INTO utilizador (id, 
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
                    
        pg_exec ($conn, $query3);
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

        if ($admin["admin"] == 't'){
            return 1;
        }
        else { 
            return 0;
        }
    }

function get_user_name_db($id) {
		global $conn;

        $query = "SELECT *
                  FROM utilizador
                  WHERE id = $id";

        return pg_exec ($conn, $query);
	}
?>
