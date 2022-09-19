<?php

require_once('../Modelo/estudiantes.php');

if ($_POST) {
    $modeloEstudiantes = new estudiantes();

    $Id = $_POST['Id'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $documento = $_POST['Documento'];
    $correo = $_POST['Correo'];
    $materia = $_POST['Materia'];
    $docente = $_POST['Docente'];
    $promedio = $_POST['Promedio'];
    $fecha = date ('Y-m-d');
    $modeloEstudiantes->update($Id,$nombre,$apellido,$documento,$correo,$materia,$docente,$promedio,$fecha);
    }else{
        header('Location: ../Vista/index.php');
    }

?>