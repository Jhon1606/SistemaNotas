<?php

require_once('../Modelo/docentes.php');

if ($_POST) {
    $modeloDocente = new docentes();

    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $usuario = $_POST['Usuario'];
    $password = $_POST['Contrasena'];
    
    $modeloDocente->add($nombre,$apellido,$usuario,$password);
    }else{
        header('Location: ../../../index.php');
    }

?>