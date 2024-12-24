<?php
$name = "root";
$pass = "";
$host = "localhost";
$database = "perpusop";

$conn = mysqli_connect($host, $name, $pass, $database);

if($conn -> connect_error){
    die("connection failed: ". $conn->connect_error);
}
