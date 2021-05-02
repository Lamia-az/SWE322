<?php

    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "A03";

        $conn = mysqli_connect("localhost", "root", "", "A03");

    if(!$conn){
        echo "Error No.".mysqli_connect_errno();
        echo "Error: ".mysqli_connect_error();
        exit;
    }

?>