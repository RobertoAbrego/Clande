<?php
session_start();
include("conexion.php");

if($_SESSION['rol'] != 'administrador'){
    die("Acceso denegado");
}

$id = $_GET['id'];

$conn->query("DELETE FROM reparaciones WHERE id=$id");

header("Location: dashboard.php");
?>