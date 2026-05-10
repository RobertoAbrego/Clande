<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}

$resultado = $conn->query("SELECT * FROM reparaciones");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Taller CLANDE</h1>

<p>
Usuario:
<?php echo $_SESSION['usuario']; ?>
</p>

<div class="role">
Rol: <?php echo $_SESSION['rol']; ?>
</div>

<a class="logout" href="logout.php">Cerrar Sesión</a>

<hr>

<?php if($_SESSION['rol'] != 'lector'){ ?>

<h2>Nueva Reparación</h2>

<form action="guardar_reparacion.php" method="POST">

Cliente:
<input type="text" name="cliente" required>

Vehiculo:
<input type="text" name="vehiculo" required>

Problema:
<input type="text" name="problema" required>

Estado:

<select name="estado" required>

    <option value="Pendiente">
        Pendiente
    </option>

    <option value="En diagnóstico">
        En diagnóstico
    </option>

    <option value="En reparación">
        En reparación
    </option>

    <option value="Esperando repuesto">
        Esperando repuesto
    </option>

    <option value="Reparado">
        Reparado
    </option>

    <option value="Entregado">
        Entregado
    </option>

</select>

<button type="submit">Guardar</button>

</form>

<?php } ?>

<hr>

<h2>Lista de Reparaciones</h2>

<table border="1">

<tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Vehiculo</th>
    <th>Problema</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>Acciones</th>
</tr>

<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td><?php echo $fila['id']; ?></td>
<td><?php echo $fila['cliente']; ?></td>
<td><?php echo $fila['vehiculo']; ?></td>
<td><?php echo $fila['problema']; ?></td>
<td><?php echo $fila['estado']; ?></td>
<td><?php echo $fila['fecha']; ?></td>

<td>

<?php if($_SESSION['rol'] == 'administrador' || $_SESSION['rol'] == 'editor'){ ?>

<a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>

<?php } ?>

<?php if($_SESSION['rol'] == 'administrador'){ ?>

|
<a href="eliminar.php?id=<?php echo $fila['id']; ?>">Eliminar</a>

<?php } ?>

</td>

</tr>

<?php } ?>

</table>
</div>
</body>
</html>