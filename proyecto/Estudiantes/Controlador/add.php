<?php

require_once('../Modelo/estudiantes.php');

if ($_POST){
    $modeloEstudiantes = new estudiantes();

    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $documento = $_POST['Documento'];
    $correo = $_POST['Correo'];
    $materia = $_POST['Materia'];
    $docente = $_POST['Docente'];
    $promedio = $_POST['Promedio'];
    $fecha = date ('Y-m-d');
    $modeloEstudiantes->add($nombre,$apellido,$documento,$correo,$materia,$docente,$promedio,$fecha);
    }else{
        header('Location: ../Vista/index.php');
    }

?>