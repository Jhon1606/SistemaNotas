<?php

require_once('../../Usuarios/Modelo/usuario.php');
require_once('../Modelo/docentes.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validarSesion();

$modeloDocente = new docentes();
$Id = $_GET['Id'];
$docente = $modeloDocente->getById($Id);

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
        <h1 style="text-align: center"> Editar Docente</h1>
        <div class="parte">
            <form action="../Controlador/edit.php" method="POST">
            <?php
            if($docente != null){
                foreach($docente as $info ){
            ?>
                <input type="hidden" name="Id" value="<?php echo $Id ?>">
                <label for="Nombre" class="labels">Nombre</label>
                <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre" class="entrada" value="<?php echo $info['Nombre']?>">
                <label for="Apellido">Apellido</label>
                <input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido" class="entrada" value="<?php echo $info['Apellido']?>">
                <label for="Usuario" class="labels">Usuario</label>
                <input type="text" name="Usuario" required="" autocomplete="off" placeholder="Usuario" class="entrada" value="<?php echo $info['Usuario']?>">
                <label for="Contrasena" class="labels">Contraseña</label>
                <input type="password" name="Contrasena" required="" autocomplete="off" placeholder="Contraseña" class="entrada" value="<?php echo $info['Contrasena']?>">
                <label for="Estado" class="labels">Estado</label>
                <select name="Estado" required="" class="entrada1"> 
                    <option value="<?php echo $info['Estado']?>"><?php echo $info['Estado']?></option>
                    <option>Activo</option>
                    <option>Inactivos</option>
                </select><br><br>
            <?php
                }
            }    
            ?>
            <input type="submit" value="Guardar" class="boton">
            <a href="index.php"><input type="button" value="Cancelar" class="boton"></a>
                
            </form>
        </div>
    </section>
</body>
</html>