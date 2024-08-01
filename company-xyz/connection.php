<?php

    function connection(){
        $server_name = "localhost";
        $username = "root";
        $password = "";
        $database = "company_xyz";


        $conn = new mysqli($server_name, $username, $password, $database);

        if($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        else{
            return $conn;
        }
    }
    connection();
?>