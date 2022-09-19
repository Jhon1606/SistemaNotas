<?php

require_once('../Modelo/Administradores.php');

if ($_POST) {
    $modeloAdministradores = new administradores();

    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $usuario = $_POST['Usuario'];
    $password = $_POST['Contrasena'];
    
    $modeloAdministradores->add($nombre,$apellido,$usuario,$password);
    }else{
        header('Location: ../Vista/index.php');
    }

?>