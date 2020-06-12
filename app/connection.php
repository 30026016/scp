<?php
    // Database Credentials
    $user = "a3002601_Akshay";
    $password = "(Toiohomai1234)**";
    $dbname = "a3002601_scp";

    // create connection object
    $connection = new mysqli('localhost',$user,$password,$dbname) or die(mysqli_error($connection));

    // Fetch data from db
    $result = $connection->query("select * from Subject") or die($connection->error);
?>