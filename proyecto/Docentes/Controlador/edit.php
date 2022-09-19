<?php

require_once('../Modelo/docentes.php');

if($_POST){
    $modeloDocentes = new docentes();

    $Id = $_POST['Id'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $usuario = $_POST['Usuario'];
    $password = $_POST['Contrasena'];
    $estado = $_POST['Estado'];
    $modeloDocentes->update($Id,$nombre,$apellido,$usuario,$password,$estado);
}else{
    header('Location: ../../../index.php');
}

?>