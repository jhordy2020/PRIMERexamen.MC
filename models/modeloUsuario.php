<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/conect/conexion.php';

class modeloUsuario{

    private $conexion;


    //al instanciar la clase debo obtener ;a conexion
    public function __construct()
    {
       $this->conexion = Conexion::obtenerConexion();
    }
    // debe hacer un metodo para hacer select
    public function obtenerUsuarios(){
        $query = $this->conexion->query('select id,username,password,perfil from usuarios');
        
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // debe hacer un metodo para hacer insert
    public function insertarUsuario ($username,$password,$perfil){
        $query = 
        $this->conexion->query('insert into usuarios(username,password,perfil) values (:username, :password, :perfil)');

        $stmt = $this->conexion ->prepare($query);
        $stmt ->bindParam('username',$username);
        $stmt ->bindParam('password',$password);
        $stmt ->bindParam('username',$perfil);
        return $stmt->execute();


    }

    // debe hacer un metodo para hacer delet
}
?>