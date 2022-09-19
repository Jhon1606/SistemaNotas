<?php

require_once('../Modelo/Administradores.php');

if($_POST){
    $modeloAdministradores = new administradores();

    $Id = $_POST['Id'];
    $modeloAdministradores->delete($Id);
}else{
    header('Location: ../../../index.php');
}

?>