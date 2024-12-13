<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';
//Todo lo relacionado a la base de datos, debe de estar en el modelo 
//Un modelo por lo regular apunta a una tabla o una vista
class modeloUsuario
{

    private $conexion;
    //al instanciar la clase debo obtener la conexion 
    public function  __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }
    //debe hacer un metodo para hacer select
    public function obtenerUsuarios()
    {
        $query = $this->conexion->query('SELECT id, username, password, perfil FROM usuarios');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    //debe hacer un metodo para hacer insert
    public function insertarUsuario($username, $password, $perfil)
    {
        $query = 'INSERT INTO usuarios(username, password, perfil) VALUES (:username, :password, :perfil)';
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        return $stmt->execute();
    }

    // debe hacer un método para hacer delete
    public function eliminarUsuarioPorNombre($username)
    {
        $query = "delete from usuarios where username = :username";
        // statement o sentencia
        $stm = $this->conexion->prepare($query);
        $stm->bindParam(':username', $username);
        // echo $stm;
        return $stm->execute();
    }
    //----------
    public function eliminarUsuarioPorId($idUsuario)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
    }


    // debe hacer un método para hacer update
    public function actualizarUsuario($id, $username, $password, $perfil)
    {
        $query = "update usuarios set username = :username, password = :password, perfil = :perfil where id = :id";
        // statement o sentencia
        $stm = $this->conexion->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->bindParam(':username', $username);
        $stm->bindParam(':password', $password);
        $stm->bindParam(':perfil', $perfil);
        // echo $stm;
        return $stm->execute();
    }

    public function obtenerUsuarioPorNombre($username)
    {
        $query = "select id, username, password, perfil from usuarios where username = :username";
        // statement o sentencia
        $stm = $this->conexion->prepare($query);
        $stm->bindParam(':username', $username);
        // echo $stm;
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    // Obtener un usuario por su ID
    public function obtenerUsuarioPorId($id)
    {
        $query = "SELECT id, username, password, perfil FROM usuarios WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna una fila
    }
    

    public function ValidarUsuario($username, $password)
    {
        $query = "SELECT id, perfil FROM usuarios WHERE username = :username AND password = :password";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    
}
