<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conect/conexion.php';

class modeloUsuario
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    // Método para obtener usuarios
    public function obtenerUsuarios()
    {
        $query = $this->conexion->query('select id, username, password, perfil from usuarios');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para insertar un usuario
    public function insertarUsuario($username, $password, $perfil)
    {
        $query = "INSERT INTO usuarios(username,password,perfil) VALUES (:username, :password, :perfil)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        //echo $stmt;


        return $stmt->execute();
    }

    // Método para eliminar un usuario (pendiente de implementación)
    public function eliminarUsuarioPorNombre($username)
    {
        $query = "delete from usuarios where username = :username";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        //echo $stmt;


        return $stmt->execute();
    }
    // debe hacer metodo update

    public function actualizarUsuario($id,$username,$password,$perfil){
        $query = "update usuarios set username=:username, password= :password, perfil= :perfil where id = :id ";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);

        return $stmt->execute();
    }
    public function obtenerUsuarioPorNombre($username){
        $query = "select id, username, password, perfil from usuarios where username = :username";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
