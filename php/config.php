<?php

    $servername = <your servername>;
    $username = <your mysql username>;
    $password = <mysql password>;
    $dbname = <database name>;
    $conn = new mysqli($servername, $username, $password,$dbname);
    if(!$conn)
    {
        echo "error";
    }
    
    ?>
