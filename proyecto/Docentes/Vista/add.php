<?php

require_once("../../Usuarios/Modelo/usuario.php");

$modeloUsuario = new usuarios();
$modeloUsuario->validarSesion();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
    <link rel="stylesheet" href="../../../estilo.css">
</head>
<body>
    <section>
        <h1 style="text-align: center">Registrar Docente</h1>
        <div class="parte">
            <form action="../Controlador/add.php" method="POST">
                <label for="Nombre" class="labels">Nombre</label>
                <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre" class="entrada">
                <label for="Apellido" class="labels">Apellido</label>
                <input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido" class="entrada">
                <label for="Usuario" class="labels">Usuario</label>
                <input type="text" name="Usuario" required="" autocomplete="off" placeholder="Usuario" class="entrada">
                <label for="Contrasena" class="labels">Contraseña</label>
                <input type="password" name="Contrasena" required="" autocomplete="off" placeholder="Contraseña" class="entrada">
                <input type="submit" value="Guardar" class="boton">
                <a href="index.php"><input type="button" value="Cancelar" class="boton"></a>
            </form>
        </div>
    </section>
</body>
</html>