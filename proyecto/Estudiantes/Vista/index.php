<?php

include("../../Usuarios/Modelo/usuario.php");
include("../Modelo/estudiantes.php");

$modeloUsuario = new usuarios();
$modeloUsuario->validarSesion();

$modelo = new estudiantes();
$consulta = "";

if (isset($_GET['consulta'])) {
    $consulta = $_GET['consulta'];
    $estudiantes = $modelo->searchPrueba($consulta);
} else{
    $estudiantes = $modelo->get();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
    <link rel="stylesheet" href="../../../estilo.css">
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="../../../javascript.js"></script>
</head>
<body>

    <header> 
        <h1>Estudiantes</h1>
        <h3>Bienvenido: <?php echo $modeloUsuario->getNombre(); ?> - <?php echo $modeloUsuario->getPerfil(); ?></h3> 
    </header>

    <?php
    if($modeloUsuario->getPerfil() == "Docente"){
    ?>

    <nav class="navegacion"> 
        <ul class="menu">
            <li><a href="../../Estudiantes/Vista/index.php">Estudiantes</a></li> 
            <li><a href="../../Usuarios/Controlador/salir.php">Salir</a></li>
        </ul>
    </nav>

    <?php
    } else{
    ?>

    <nav class="navegacion">
        <ul class="menu">
            <li><a href="../../Administradores/Vista/index.php">Administradores</a></li>
            <li><a href="../../Docentes/Vista/index.php">Docentes</a></li>
            <li><a href="../../Estudiantes/Vista/index.php">Estudiantes</a></li>
            <li><a href="../../Materias/Vista/index.php">Materias</a></li> 
            <li><a href="../../Usuarios/Controlador/salir.php">Salir</a></li>
        </ul>
    </nav>
    

    <?php
    }
    ?>

    <section>
        <!-- <input type="search" placeholder="Buscar..." oninput="w3.filterHTML('#tabla', '.fila', this.value)"> -->
        <input type="search" placeholder="Buscar..." class="entrada" style="width:300px" onchange="filtrar(this.value)" value="<?php echo $consulta; ?>">
        <a href="add.php" class="enlace">Registrar Estudiante</a>
        <table class="tabla" id="tabla">
            <thead>
                <tr> 
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Correo</th>
                    <th>Materia</th>
                    <th style="min-width: 300px">Docente</th>
                    <th>Promedio</th>
                    <th style="min-width: 100px">Fecha de Registro</th>
                    <th style="min-width: 200px">Acciones</th>
                </tr>
            </thead>

            <?php 
           
            
            if($estudiantes != null){
                foreach($estudiantes as $estudiante){
            ?>

            <tbody>     
                <tr class="fila">
                    <td><?php echo $estudiante['id_estudiante']; ?></td>
                    <td><?php echo $estudiante['Nombre']; ?></td>
                    <td><?php echo $estudiante['Apellido']; ?></td>
                    <td style="text-align: right"><?php echo $estudiante['Documento']; ?></td>
                    <td><?php echo $estudiante['Correo']; ?></td>
                    <td><?php echo $estudiante['Materia']; ?></td>
                    <td><?php echo $estudiante['Docente']; ?></td>
                    <td style="text-align: center"><?php echo $estudiante['Promedio']; ?>%</td>
                    <td style="text-align: center"><?php echo $estudiante['Fecha']; ?></td>
                    <td style="text-align: center">
                        <a href="edit.php?Id=<?php echo $estudiante['id_estudiante']; ?>" class="enlace">Editar</a> 
                        <a href="delete.php?Id=<?php echo $estudiante['id_estudiante']; ?>" class="enlace">Eliminar</a>
                    </td>
                </tr>
            </tbody> 

            <?php 
                }
            }
            ?>
        </table>
    </section>


</body>
</html>