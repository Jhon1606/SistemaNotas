<?php 

require_once('../../../conexion.php');

class metodos extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }

    public function getMaterias(){
        $rows = null;
        $statement =  $this->conexion->prepare("SELECT * FROM materias");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function getDocentes(){
        $rows=null;
        $statement = $this->conexion->prepare("SELECT * FROM usuarios WHERE Perfil = 'Docente'");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    } 
    
}

?>