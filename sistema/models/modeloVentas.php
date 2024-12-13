<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

// Todo lo relacionado con la base de datos para la tabla Ventas
class modeloVentas
{
    private $conexion;

    // Constructor: Obtiene la conexión a la base de datos al instanciar la clase
    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    // Método para obtener todas las ventas
    public function obtenerVentas()
    {
        $query = $this->conexion->query('SELECT id, producto, cantidad, descripcion, total, fecha FROM ventas');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para insertar una nueva venta
    public function insertarVenta($producto, $cantidad, $descripcion, $total, $fecha)
    {
        $query = 'INSERT INTO ventas (producto, cantidad, descripcion, total, fecha) 
                  VALUES (:producto, :cantidad, :descripcion, :total, :fecha)';
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':producto', $producto);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha);

        return $stmt->execute();
    }

    // Método para eliminar una venta por su ID
    public function eliminarVentaPorId($idVenta)
    {
        $query = "DELETE FROM ventas WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $idVenta, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Método para actualizar una venta
    public function actualizarVenta($id, $producto, $cantidad, $descripcion, $total, $fecha)
    {
        $query = "UPDATE ventas 
                  SET producto = :producto, 
                      cantidad = :cantidad, 
                      descripcion = :descripcion, 
                      total = :total, 
                      fecha = :fecha 
                  WHERE id = :id";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':producto', $producto);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha);

        return $stmt->execute();
    }

    // Método para obtener una venta por su ID
    public function obtenerVentaPorId($id)
    {
        $query = "SELECT id, producto, cantidad, descripcion, total, fecha FROM ventas WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna una fila
    }
}