<?php
session_start();
include("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE nombre_usuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$usuario);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){

        $fila = $resultado->fetch_assoc();

        if(password_verify($password, $fila['password_hash'])){

            $_SESSION['usuario'] = $fila['nombre_usuario'];
            $_SESSION['rol'] = $fila['rol'];

            header("Location: dashboard.php");
            exit;

        } else {
           $error = "Contraseña incorrecta";
        }

    } else {
        $error = "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login CLANDE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">

<h2>Login Taller CLANDE</h2>

<?php
if(isset($error)){
    echo "<div class='error'>$error</div>";
}
?>

<form method="POST">

    Usuario:
    <input type="text" name="usuario" required>

    Password:
    <input type="password" name="password" required>

    <button type="submit">Ingresar</button>

</form>

</div>

</div>

</body>
</html>