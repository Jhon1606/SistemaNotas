<?php

require_once('../../Usuarios/Modelo/usuario.php');
require_once('../Modelo/docentes.php');

$modeloUsuario = new usuarios();
$modeloUsuario->validarSesionAdministrador();

$modeloDocente = new docentes();

$consulta = "";

if (isset($_GET['consulta'])) {
    $consulta = $_GET['consulta'];
    $docentes = $modeloDocente->searchPrueba($consulta);
} else{
    $docentes = $modeloDocente->get();
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
    <script src="../../../javascript.js"></script>
</head>
<body>

    <header> 
        <h1>Administradores</h1>
        <h3>Bienvenido: <?php echo $modeloUsuario->getNombre(); ?> - <?php echo $modeloUsuario->getPerfil(); ?></h3> 
    </header>

    <nav class="navegacion">
        <ul class="menu">
            <li><a href="../../Administradores/Vista/index.php"> Administradores </a></li>
            <li><a href="../../Docentes/Vista/index.php"> Docentes </a></li>
            <li><a href="../../Estudiantes/Vista/index.php"> Estudiantes </a> </li>
            <li><a href="../../Materias/Vista/index.php"> Materias </a></li> 
            <li><a href="../../Usuarios/Controlador/salir.php">Salir</a></li>
        </ul>
    </nav>

    <section>
    <input type="search" placeholder="Buscar..." class="entrada" style="width:300px" onchange="filtrar(this.value)" value="<?php echo $consulta; ?>">
        <a href="add.php" class="enlace">Registrar Docente</a>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th style="min-width: 200px">Acciones</th>
                </tr>
            </thead>
            <?php
            
            if ($docentes != null) {
                foreach($docentes as $docente){
            ?>

            <tbody>
                <tr class="fila">
                    <td><?php echo $docente['id_usuario']?></td>
                    <td><?php echo $docente['Nombre']?></td>
                    <td><?php echo $docente['Apellido']?></td>
                    <td><?php echo $docente['Usuario']?></td>
                    <td><?php echo $docente['Perfil']?></td>
                    <td><?php echo $docente['Estado']?></td>
                    <td style="text-align: center">
                        <a href="edit.php?Id=<?php echo $docente['id_usuario'] ?>" class="enlace">Editar</a>
                        <a href="delete.php?Id=<?php echo $docente['id_usuario'] ?>" class="enlace">Eliminar</a>
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