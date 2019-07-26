<?php

        $db_host = "localhost" ;
        $db_username = "root";
        $db_password = "";
        $db_name = "intern_2019"; 

        // Create connection
        $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");
        //echo "Connected successfully";

        // $sql_string = "SELECT * FROM in_cars";
        // $result = $conn->query($sql_string);
        //print_r($result);
?>