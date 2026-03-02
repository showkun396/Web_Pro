<?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "mystore";

    //เชื่อมต่อ
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //ตรวจการเชื่อมต่อ
    if(!$conn){
        die("Connection Failde: ". mysqli_connect_error());
    }
?>