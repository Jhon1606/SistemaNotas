<?php

require_once('../Modelo/docentes.php');

if($_POST){
    $modeloDocentes = new docentes();

    $Id = $_POST['Id'];
    $modeloDocentes->delete($Id);
}else{
    header('Location: ../../../index.php');
}

?>