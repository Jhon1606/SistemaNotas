<?php

require_once('../Modelo/estudiantes.php');

if ($_POST) {
    $modeloEstudiantes = new estudiantes();

    $Id = $_POST['Id'];
    $modeloEstudiantes->delete($Id);
}else{
    header('Location: ../../../index.php');
}

?>