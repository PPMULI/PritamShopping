<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "school";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die(mysqli_connect_error());
    }
 }
?>