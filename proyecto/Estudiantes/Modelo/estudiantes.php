<?php 

require_once('../../../conexion.php');

class estudiantes extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }

    public function add($nombre,$apellido,$documento,$correo,$materia,$docente,$promedio,$fecha){

        $statement=$this->conexion->prepare("INSERT INTO estudiantes (Nombre, Apellido, Documento, Correo, Materia, Docente, Promedio, Fecha)
                                             VALUES(:Nombre, :Apellido, :Documento, :Correo, :Materia, :Docente, :Promedio, :Fecha)");
        $statement->bindParam(':Nombre',$nombre);
        $statement->bindParam(':Apellido',$apellido);
        $statement->bindParam(':Documento',$documento);
        $statement->bindParam(':Correo',$correo);
        $statement->bindParam(':Materia',$materia);
        $statement->bindParam(':Docente',$docente);
        $statement->bindParam(':Promedio',$promedio);
        $statement->bindParam(':Fecha',$fecha);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/add.php');
        }
    }

    public function update($Id,$nombre,$apellido,$documento,$correo,$materia,$docente,$promedio,$fecha){

        $statement=$this->conexion->prepare("UPDATE estudiantes SET Nombre = :Nombre, Apellido = :Apellido, 
                                             Documento = :Documento, Correo = :Correo, Materia = :Materia, 
                                             Docente = :Docente, Promedio = :Promedio, Fecha = :Fecha WHERE id_estudiante = :Id");
         $statement->bindParam(':Id',$Id);
         $statement->bindParam(':Nombre',$nombre);
         $statement->bindParam(':Apellido',$apellido);
         $statement->bindParam(':Documento',$documento);
         $statement->bindParam(':Correo',$correo);
         $statement->bindParam(':Materia',$materia);
         $statement->bindParam(':Docente',$docente);
         $statement->bindParam(':Promedio',$promedio);
         $statement->bindParam(':Fecha',$fecha);
         if($statement->execute()){
            header('Location: ../Vista/index.php');
         }else{
             header('Location: ../Vista/edit.php');
         }
    }

    public function delete($Id){

        $statement=$this->conexion->prepare("DELETE FROM estudiantes WHERE id_estudiante = :Id");
        $statement->bindParam(":Id",$Id);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/delete.php');
        }
    }

    public function get(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM estudiantes");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($Id){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT id_estudiante, Nombre, Apellido, Documento, Correo, Materia, Docente, Promedio, Fecha
        FROM estudiantes WHERE id_estudiante = :Id");
        $statement->bindParam(":Id",$Id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function search($search){

        $rows = null;
        $statement = $this->conexion->prepare("SELECT id_estudiante, Nombre, Apellido, Documento, Correo, Materia, Docente, Promedio, Fecha
        FROM estudiantes WHERE Nombre LIKE concat('%', :Search,'%') OR Documento LIKE concat('%', :Search, '%') OR Materia LIKE concat('%', :Search, '%'
        OR Docente LIKE concat('%', :Search,'%')");
        $statement->bindParam(':Search',$search);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        } return $rows;
    } 

    public function searchPrueba($search){

        $rows = null;
        $statement = $this->conexion->prepare("SELECT id_estudiante, Nombre, Apellido, Documento, Correo, Materia,
        Docente, Promedio, Fecha
        FROM estudiantes WHERE POSITION(:Search IN Nombre) OR POSITION(:Search IN Documento)
        OR POSITION(:Search IN Docente) OR POSITION(:Search IN Materia) OR POSITION(:Search IN Fecha)");
        $statement->bindParam(':Search',$search);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        } return $rows;
    } 

}

?>