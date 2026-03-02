<?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "mystore";

    //เชื่อมต่อ
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    mysqli_set_charset($conn, "utf8");

    //ตรวจการเชื่อมต่อ
    if(!$conn){
        die("Connection Failde: ". mysqli_connect_error());
    }
?>