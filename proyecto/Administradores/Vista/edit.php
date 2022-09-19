
<?php

require_once('../../Usuarios/Modelo/usuario.php');
require_once('../Modelo/Administradores.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validarSesion();

$modeloAdministradores = new administradores();
$Id = $_GET['Id'];
$administrador = $modeloAdministradores->getById($Id);

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
        <h1 style="text-align: center">Editar Administrador</h1>
        <div class="parte">
            <form action="../Controlador/edit.php" method="POST">
            <?php
            if ($administrador != null){
                foreach($administrador as $info){
            ?>
                <input type="hidden" name="Id" value="<?php echo $Id ?>">
                <label for="Nombre" class="labels">Nombre</label><br>
                <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre" class="entrada" value="<?php echo $info['Nombre'] ?>"><br><br>
                <label for="Apellido" class="labels">Apellido</label> <br>
                <input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido" class="entrada" value="<?php echo $info['Apellido'] ?>"><br><br>
                <label for="Usuario" class="labels">Usuario</label><br>
                <input type="text" name="Usuario" required="" autocomplete="off" placeholder="Usuario" class="entrada" value="<?php echo $info['Usuario'] ?>"><br><br>
                <label for="Contrasena" class="labels">Contraseña</label><br>
                <input type="password" name="Contrasena" required="" autocomplete="off" placeholder="Contraseña" class="entrada" value="<?php echo $info['Contrasena'] ?>"><br><br>
                <label for="Estado" class="labels">Estado</label><br>
                <select name="Estado" required="" class="entrada1"> 
                    <option value="<?php echo $info['Estado'] ?>"><?php echo $info['Estado'] ?></option>
                    <option>Activo</option>
                    <option>Inactivo</option>
                </select> <br><br>
                <input type="submit" value="Guardar" class="boton">
                <a href="index.php"><input type="button" value="Cancelar" class="boton"></a> 
            <?php
                }
            }
            ?>
            </form>
        </div>
    </section>
</body>
</html>