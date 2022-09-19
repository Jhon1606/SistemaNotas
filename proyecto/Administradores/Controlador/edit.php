<?php

require_once('../Modelo/Administradores.php');

if($_POST){
    $modeloAdministradores = new administradores();

    $Id = $_POST['Id'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $usuario = $_POST['Usuario'];
    $password = $_POST['Contrasena'];
    $estado = $_POST['Estado'];
    $modeloAdministradores->update($Id,$nombre,$apellido,$usuario,$password,$estado);
}else{
    header('Location: ../../../index.php');
}

?>