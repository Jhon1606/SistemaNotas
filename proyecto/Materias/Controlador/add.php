<?php

require_once('../Modelo/materias.php');

if ($_POST) {
    $modelo = new materias();

    $nombre = $_POST['Materia'];
    $modelo->add($nombre);
}else{
    header('Location: ../../../index.php');
}

?>