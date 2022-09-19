<?php

require_once("../../../conexion.php");
session_start();

class usuarios extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }

    public function login($usuario,$password){

    $rows=null;
    $statement=$this->conexion->prepare("SELECT * FROM usuarios WHERE Usuario = :Usuario AND Contrasena = :Contrasena");
    $statement->bindParam(':Usuario',$usuario);
    $statement->bindParam(':Contrasena',$password);
    $statement->execute();
    if ($statement->rowCount() == 1){
        $result=$statement->fetch();
        $_SESSION['Nombre'] = $result["Nombre"] ." ".$result['Apellido'];
        $_SESSION['Id'] = $result["id_usuario"];
        $_SESSION['Perfil'] = $result["Perfil"];
        return true;
    }
        return false;
    }

    public function getNombre(){
        return $_SESSION['Nombre'];
    }

    public function getId(){
        return $_SESSION['Id'];
    }

    public function getPerfil(){
        return $_SESSION['Perfil'];
    }

    public function validarSesion(){
        if($_SESSION['Id']==null){
            header('Location: ../../../index.php'); 
        }
    }
    
    public function validarSesionAdministrador(){
        if($_SESSION['Id'] != null){
            if($_SESSION['Perfil']=='Docente'){
                header('Location: ../../Estudiantes/Vista/index.php'); 
            }
            }
        }

    public function salir(){
        $_SESSION['Id'] = null;
        $_SESSION['Nombre'] = null;
        $_SESSION['Perfil'] = null;
        session_destroy();
        header('Location: ../../../index.php');
    }
        
    }




?>