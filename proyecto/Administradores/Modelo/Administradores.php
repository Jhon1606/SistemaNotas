<?php 


require_once('../../../conexion.php');

class administradores extends conexion{


    public function __construct(){
        $this->conexion=parent::__construct();
    }

    public function add($nombre,$apellido,$usuario,$password){
        $statement = $this->conexion->prepare("INSERT INTO usuarios (Nombre, Apellido, Usuario, Contrasena, Perfil, Estado)
                                             VALUES(:Nombre, :Apellido, :Usuario, :Contrasena, 'Administrador', 'Activo')");
        $statement->bindParam(':Nombre',$nombre);
        $statement->bindParam(':Apellido',$apellido);
        $statement->bindParam(':Usuario',$usuario);
        $statement->bindParam(':Contrasena',$password);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/add.php');
        }

    }

    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM usuarios WHERE Perfil = 'Administrador'");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($Id){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM usuarios WHERE Perfil = 'Administrador' AND id_usuario = :Id");
        $statement->bindParam(":Id",$Id);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($Id,$nombre,$apellido,$usuario,$password,$estado){
        $statement=$this->conexion->prepare("UPDATE usuarios SET Nombre = :Nombre, Apellido = :Apellido, 
                                             Usuario = :Usuario, Contrasena = :Contrasena, Estado = :Estado WHERE id_usuario = :Id");
         $statement->bindParam(':Id',$Id);
         $statement->bindParam(':Nombre',$nombre);
         $statement->bindParam(':Apellido',$apellido);
         $statement->bindParam(':Usuario',$usuario);
         $statement->bindParam(':Contrasena',$password);
         $statement->bindParam(':Estado',$estado);
         if($statement->execute()){
            header('Location: ../Vista/index.php');
         }else{
             header('Location: ../Vista/edit.php');
         }

    }

    public function delete($Id){
        $statement=$this->conexion->prepare("DELETE FROM usuarios WHERE id_usuario = :Id");
        $statement->bindParam(":Id",$Id);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/delete.php');
        }
    }

    public function searchPrueba($search){

        $rows = null;
        $statement = $this->conexion->prepare("SELECT id_usuario, Nombre, Apellido, Usuario, Perfil, Estado
                                            FROM usuarios WHERE POSITION(:Search IN Nombre) OR POSITION(:Search IN Apellido)
                                            OR POSITION(:Search IN Usuario) OR POSITION(:Search IN Perfil)");
        $statement->bindParam(':Search',$search);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        } return $rows;
    } 


}

?>