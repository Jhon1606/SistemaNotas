<?php

require_once('../../Usuarios/Modelo/usuario.php');
require_once('../Modelo/materias.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validarSesion();

$modelo = new materias();

$Id = $_GET['Id'];
$informacionMateria = $modelo->getById($Id);
 
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
<h1 style="text-align: center">Editar Materia</h1>
<div class="parte">
    <form action="../Controlador/edit.php" method="POST">
        <input type="hidden" name="Id" value="<?php echo $Id ?>">
            <?php 
            if($informacionMateria != null){
                foreach($informacionMateria as $info){
            ?>
                <label for="Materia" class="labels">Materia</label><br>
                <input type="text" name="Materia" required="" autocomplete="off" placeholder="Nombre Materia" class="entrada" value="<?php echo $info['Materia'] ?>"><br><br>
            <?php
                }
            }
            ?>
        <input type="Submit" value="Guardar" class="boton">
        <a href="index.php"><input type="button" value="Cancelar" class="boton"></a> 
    </form>
</div>
</body>
</html>