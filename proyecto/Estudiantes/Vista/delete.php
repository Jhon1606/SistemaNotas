<?php

require_once('../../Usuarios/Modelo/usuario.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validarSesion();

$Id = $_GET['Id'];

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
        <h1 class="titulo">Eliminar Estudiante</h1>
        <div class="parte">
            <form action="../Controlador/delete.php" method="POST">
                <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                <p>¿Estás seguro de que deseas eliminar este estudiante?</p>
                <input type="submit" value="Eliminar" class="boton">
                <a href="index.php"><input type="button" value="Cancelar" class="boton"></a>
            </form>
        </div>
    </section>
</body>
</html>