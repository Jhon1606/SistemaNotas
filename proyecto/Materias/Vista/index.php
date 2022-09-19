<?php

require_once('../../Usuarios/Modelo/usuario.php');
require_once('../Modelo/materias.php');

$modeloUsuario = new usuarios();
$modeloUsuario->validarSesionAdministrador();

$modelo = new materias();

$consulta = "";

if (isset($_GET['consulta'])) {
    $consulta = $_GET['consulta'];
    $materias = $modelo->searchPrueba($consulta);
} else{
    $materias = $modelo->get();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../estilo.css">
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
        <a href="add.php" class="enlace">Registrar Materia</a>
        <table class="tabla"> 
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th style="min-width: 200px">Acciones</th>
                </tr>
            </thead>
            <?php
        
            if ($materias != null) {
                foreach ($materias as $materia) {
            ?>

            <tbody>
                <tr class="fila">
                    <td><?php echo $materia['id_materia'] ?></td>
                    <td><?php echo $materia['Materia'] ?></td>
                    <td style="text-align: center">
                        <a href="edit.php?Id=<?php echo $materia['id_materia'] ?>" class="enlace">Editar</a>
                        <a href="delete.php?Id=<?php echo $materia['id_materia'] ?>"  class="enlace">Eliminar</a>
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