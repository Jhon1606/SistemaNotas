<?php

require_once("../../Usuarios/Modelo/usuario.php");
require_once("../../metodos.php");

$modeloUsuario = new usuarios();
$modeloUsuario->validarSesion();

$modeloMetodos= new metodos();

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
        <h1 class="titulo">Registrar Estudiante</h1>
        <div class="parte">
            <form action="../Controlador/add.php" method="POST">
                <label for="Nombre" class="labels">Nombre</label>
                <input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre" class="entrada">
                <label for="Apellido" class="labels">Apellido</label>
                <input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido" class="entrada">
                <label for="Documento" class="labels">Documento</label>
                <input type="text" name="Documento" required="" autocomplete="off" placeholder="Documento" class="entrada">
                <label for="Correo" class="labels">Correo</label>
                <input type="email" name="Correo" required="" autocomplete="off" placeholder="Correo electrónico" class="entrada">
                <label for="Materia" class="labels">Materia</label>
                <select name="Materia" required="" class="entrada1">
                    <option value="">Seleccione</option>
                    <?php
                    $materias= $modeloMetodos->getMaterias();

                    if($materias != null){
                        foreach($materias as $materia){
                        ?>
                        <option value="<?php echo $materia['Materia']; ?>"><?php echo $materia['Materia']; ?></option>
                        <?php
                        }
                    }
                    ?>  
                </select>

                <label for="Docente" class="labels">Docente</label><br>
                <select name="Docente" required="" class="entrada1">
                    <option value="">Seleccione</option>
                    <?php
                    $docentes= $modeloMetodos->getDocentes();

                    if($docentes != null){
                        foreach($docentes as $docente){
                        ?>
                        <option value="<?php echo $docente['Nombre'] .' '.$docente['Apellido'] ?>"><?php echo $docente['Nombre'] .' '.$docente['Apellido'] ?></option>
                        <?php
                        }
                    }
                    ?>
                </select>

                <label for="Promedio" class="labels">Promedio</label><br>
                <input type="number" name="Promedio" required="" autocomplete="off" placeholder="Promedio" class="entrada"><br><br>
                <input type="Submit" value="Guardar" class="boton">
                <a href="index.php"><input type="button" value="Cancelar" class="boton"></a>
            </form>
        </div>
    </section>
</body>
</html>