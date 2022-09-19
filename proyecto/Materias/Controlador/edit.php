<?php

require_once('../Modelo/materias.php');

if ($_POST) {
    $modelo = new materias();

    $Id = $_POST['Id'];
    $nombre = $_POST['Materia'];
    $modelo->update($Id,$nombre);
}else{
    header('Location: ../../../index.php');
}

?>