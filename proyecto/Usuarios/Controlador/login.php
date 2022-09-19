<?php

include("../Modelo/usuario.php");

if ($_POST) {
    $usuario = $_POST['Usuario'];
    $password = $_POST['Contrasena'];

    $modelo = new usuarios();
   if($modelo->login($usuario,$password)){
        header('Location: ../../Estudiantes/Vista/index.php');
   }else{
        header('Location: ../../../index.php');
   }
}

?>