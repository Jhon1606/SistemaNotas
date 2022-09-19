
<?php

require_once('../../Usuarios/Modelo/usuario.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validarSesion();

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
        <h1 style="text-align: center">Registrar Materia</h1>
        <div class="parte">
            <form action="../Controlador/add.php" method="POST">
                <label for="Materia" class="labels">Materia</label><br>
                <input type="text" name="Materia" required="" autocomplete="off" placeholder="Nombre Materia" class="entrada"><br><br>
                <input type="Submit" value="Guardar" class="boton">
                <a href="index.php"><input type="button" value="Cancelar" class="boton"></a>
            </form>
        </div>
    </section>
</body>
</html>