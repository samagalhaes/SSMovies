<?php

    /**
     * Realiza a conexão à DB
     * 
     * @retval conn
     */
    function connect_db (){
        global $conn;

        $conn = pg_connect("host=db.fe.up.pt dbname=siem1742 user=siem1742 password=LrYaFMWy");
        if (!$conn){
            print "ERRO: Nao foi possivel estabelecer ligacao à base de dados";
            exit;
        }

        /* Selecção do esquema associado ao website - ssmovies */
        $query = "set schema 'ssmovies';";
        pg_exec ($conn, $query);

        return $conn;
    }

    /**
     * Fecha a connexão à DB
     */
    function disconnect_db (){
        global $conn;
        pg_close ($conn);
    }
?>