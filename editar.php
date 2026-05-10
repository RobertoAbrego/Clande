<?php
session_start();
include("conexion.php");

if($_SESSION['rol'] == 'lector'){
    die("Acceso denegado");
}

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $estado = $_POST['estado'];

    $sql = "UPDATE reparaciones
    SET estado='$estado'
    WHERE id=$id";

    $conn->query($sql);

    header("Location: dashboard.php");
}

$datos = $conn->query("SELECT * FROM reparaciones WHERE id=$id");
$fila = $datos->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar Reparación</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<div class="card">

<h2>Editar Estado de Reparación</h2>

<form method="POST">

<label>Cliente</label>
<input type="text"
value="<?php echo $fila['cliente']; ?>"
disabled>

<label>Vehículo</label>
<input type="text"
value="<?php echo $fila['vehiculo']; ?>"
disabled>

<label>Problema</label>
<input type="text"
value="<?php echo $fila['problema']; ?>"
disabled>

<label>Estado</label>

<select name="estado" required>

    <option value="Pendiente"
    <?php if($fila['estado']=="Pendiente") echo "selected"; ?>>
    Pendiente
    </option>

    <option value="En diagnóstico"
    <?php if($fila['estado']=="En diagnóstico") echo "selected"; ?>>
    En diagnóstico
    </option>

    <option value="En reparación"
    <?php if($fila['estado']=="En reparación") echo "selected"; ?>>
    En reparación
    </option>

    <option value="Esperando repuesto"
    <?php if($fila['estado']=="Esperando repuesto") echo "selected"; ?>>
    Esperando repuesto
    </option>

    <option value="Reparado"
    <?php if($fila['estado']=="Reparado") echo "selected"; ?>>
    Reparado
    </option>

    <option value="Entregado"
    <?php if($fila['estado']=="Entregado") echo "selected"; ?>>
    Entregado
    </option>

</select>

<button type="submit">Actualizar Reparación</button>

</form>

<br>

<a href="dashboard.php">← Volver al Panel</a>

</div>

</div>

</body>
</html>