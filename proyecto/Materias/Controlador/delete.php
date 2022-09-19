<?php

require_once('../Modelo/materias.php');
if ($_POST) {
    $modelo = new materias();

    $Id = $_POST['Id'];
    $modelo->delete($Id);
}else{
    header('Location: ../../../index.php');
}

?>