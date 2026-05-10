<?php

$host = "localhost";
$user = "root";
$pass = "sa123456";
$db = "clande";

$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("Error de conexion");
}

?>