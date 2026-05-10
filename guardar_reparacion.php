<?php
session_start();
include("conexion.php");

if($_SESSION['rol'] == 'lector'){
    die("Acceso denegado");
}

$cliente = $_POST['cliente'];
$vehiculo = $_POST['vehiculo'];
$problema = $_POST['problema'];
$estado = $_POST['estado'];

$sql = "INSERT INTO reparaciones(cliente,vehiculo,problema,estado)
VALUES('$cliente','$vehiculo','$problema','$estado')";

$conn->query($sql);

header("Location: dashboard.php");
?>