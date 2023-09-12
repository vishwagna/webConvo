<?php

    $servername = "localhost:3306";
    $username = "root";
    $password = "Sweety@1";
    $dbname = "intern2";
    $conn = new mysqli($servername, $username, $password,$dbname);
    if(!$conn)
    {
        echo "error";
    }
    
    ?>