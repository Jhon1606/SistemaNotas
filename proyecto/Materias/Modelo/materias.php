<?php 

require_once('../../../conexion.php');

class materias extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }

    public function add($materia){
        $statement = $this->conexion->prepare("INSERT INTO materias (Materia) VALUES (:Materia)");
        $statement->bindParam(":Materia",$materia);
        if ($statement->execute()) {
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/add.php');
        }
    }

    public function get(){
        $rows = null;
        $statement =  $this->conexion->prepare("SELECT * FROM materias");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function getById($Id){
        $rows = null;
        $statement =  $this->conexion->prepare("SELECT * FROM materias WHERE id_materia = :Id");
        $statement->bindParam(":Id",$Id);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($id,$materia){
        $statement = $this->conexion->prepare("UPDATE materias SET Materia = :Materia WHERE id_materia = :Id");
        $statement->bindParam(":Id",$id);
        $statement->bindParam(":Materia",$materia);
        if ($statement->execute()) {
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/edit.php');
        }
    }

    public function delete($id){
        $statement = $this->conexion->prepare("DELETE FROM materias WHERE id_materia = :Id");
        $statement->bindParam(":Id",$id);
        if ($statement->execute()) {
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/delete.php');
        }
    }

    public function searchPrueba($search){

        $rows = null;
        $statement = $this->conexion->prepare("SELECT id_materia, Materia
                                            FROM materias WHERE POSITION(:Search IN Materia)");
        $statement->bindParam(':Search',$search);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        } return $rows;
    } 

    
}

?>