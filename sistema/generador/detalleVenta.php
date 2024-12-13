<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

// Todo lo relacionado con la base de datos para la tabla detalleVenta
class modelodetalleVenta
{ 
    private $conexion;

    // Constructor: Obtiene la conexión a la base de datos al instanciar la clase
    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    // Método para obtener todas las detalleVenta
    public function obtenerdetalleVenta(){
        $query = $this->conexion->query('SELECT '.
                                        'ID, '.
                                        'CANTIDAD, '.
                                        'UNIDAD, '.
                                        'DESCRIPCION, '.
                                        'PC, '.
                                        'PV, '.
                                        'PU, '.
                                        'PU_OR, '.
                                        'TIPOISC, '.
                                        'TASAISC, '.
                                        'ISCUNIT, '.
                                        'VVU, '.
                                        'TIPODSCTO, '.
                                        'DSCTOUNIT, '.
                                        'DSCTO, '.
                                        'TIPOCARGO, '.
                                        'CARGOUNIT, '.
                                        'CARGO, '.
                                        'VVitem, '.
                                        'ISC, '.
                                        'IGV, '.
                                        'TIPOOPERACION, '.
                                        'TIPOAFECTACION, '.
                                        'MONTO, '.
                                        'SUBTOTAL, '.
                                        'PRODUCTO, '.
                                        'LINK, '.
                                        'ESPRODUCTO, '.
                                        'MINCOMPRA, '.
                                        'PR, '.
                                        'COMPRIMIR, '.
                                        'CODSUNAT, '.
                                        'MULTIPLO, '.
                                        'BOLSAS, '.
                                        'TASAICBPER, '.
                                        'ICBPER, '.
                                        'IMGBOLSAS, '.
                                        'PESO, '.
                                        'FACTURABLE, '.
                                        'ALMACEN, '.
                                        'PMAYOR '.
                                                         'FROM detalleVenta');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para insertar una nueva detalleVenta
    public function insertardetalleVenta( 
                                         $CANTIDAD,
                                         $UNIDAD,
                                         $DESCRIPCION,
                                         $PC,
                                         $PV,
                                         $PU,
                                         $PU_OR,
                                         $TIPOISC,
                                         $TASAISC,
                                         $ISCUNIT,
                                         $VVU,
                                         $TIPODSCTO,
                                         $DSCTOUNIT,
                                         $DSCTO,
                                         $TIPOCARGO,
                                         $CARGOUNIT,
                                         $CARGO,
                                         $VVitem,
                                         $ISC,
                                         $IGV,
                                         $TIPOOPERACION,
                                         $TIPOAFECTACION,
                                         $MONTO,
                                         $SUBTOTAL,
                                         $PRODUCTO,
                                         $LINK,
                                         $ESPRODUCTO,
                                         $MINCOMPRA,
                                         $PR,
                                         $COMPRIMIR,
                                         $CODSUNAT,
                                         $MULTIPLO,
                                         $BOLSAS,
                                         $TASAICBPER,
                                         $ICBPER,
                                         $IMGBOLSAS,
                                         $PESO,
                                         $FACTURABLE,
                                         $ALMACEN,
                                         $PMAYOR
                                             )
    {
        $query = `INSERT INTO detalleVenta (
                                      CANTIDAD,
                                      UNIDAD,
                                      DESCRIPCION,
                                      PC,
                                      PV,
                                      PU,
                                      PU_OR,
                                      TIPOISC,
                                      TASAISC,
                                      ISCUNIT,
                                      VVU,
                                      TIPODSCTO,
                                      DSCTOUNIT,
                                      DSCTO,
                                      TIPOCARGO,
                                      CARGOUNIT,
                                      CARGO,
                                      VVitem,
                                      ISC,
                                      IGV,
                                      TIPOOPERACION,
                                      TIPOAFECTACION,
                                      MONTO,
                                      SUBTOTAL,
                                      PRODUCTO,
                                      LINK,
                                      ESPRODUCTO,
                                      MINCOMPRA,
                                      PR,
                                      COMPRIMIR,
                                      CODSUNAT,
                                      MULTIPLO,
                                      BOLSAS,
                                      TASAICBPER,
                                      ICBPER,
                                      IMGBOLSAS,
                                      PESO,
                                      FACTURABLE,
                                      ALMACEN,
                                      PMAYOR
) 
        VALUES ( 
                :CANTIDAD,
                :UNIDAD,
                :DESCRIPCION,
                :PC,
                :PV,
                :PU,
                :PU_OR,
                :TIPOISC,
                :TASAISC,
                :ISCUNIT,
                :VVU,
                :TIPODSCTO,
                :DSCTOUNIT,
                :DSCTO,
                :TIPOCARGO,
                :CARGOUNIT,
                :CARGO,
                :VVitem,
                :ISC,
                :IGV,
                :TIPOOPERACION,
                :TIPOAFECTACION,
                :MONTO,
                :SUBTOTAL,
                :PRODUCTO,
                :LINK,
                :ESPRODUCTO,
                :MINCOMPRA,
                :PR,
                :COMPRIMIR,
                :CODSUNAT,
                :MULTIPLO,
                :BOLSAS,
                :TASAICBPER,
                :ICBPER,
                :IMGBOLSAS,
                :PESO,
                :FACTURABLE,
                :ALMACEN,
                :PMAYOR
)`;
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':CANTIDAD', $CANTIDAD);
        $stmt->bindParam(':UNIDAD', $UNIDAD);
        $stmt->bindParam(':DESCRIPCION', $DESCRIPCION);
        $stmt->bindParam(':PC', $PC);
        $stmt->bindParam(':PV', $PV);
        $stmt->bindParam(':PU', $PU);
        $stmt->bindParam(':PU_OR', $PU_OR);
        $stmt->bindParam(':TIPOISC', $TIPOISC);
        $stmt->bindParam(':TASAISC', $TASAISC);
        $stmt->bindParam(':ISCUNIT', $ISCUNIT);
        $stmt->bindParam(':VVU', $VVU);
        $stmt->bindParam(':TIPODSCTO', $TIPODSCTO);
        $stmt->bindParam(':DSCTOUNIT', $DSCTOUNIT);
        $stmt->bindParam(':DSCTO', $DSCTO);
        $stmt->bindParam(':TIPOCARGO', $TIPOCARGO);
        $stmt->bindParam(':CARGOUNIT', $CARGOUNIT);
        $stmt->bindParam(':CARGO', $CARGO);
        $stmt->bindParam(':VVitem', $VVitem);
        $stmt->bindParam(':ISC', $ISC);
        $stmt->bindParam(':IGV', $IGV);
        $stmt->bindParam(':TIPOOPERACION', $TIPOOPERACION);
        $stmt->bindParam(':TIPOAFECTACION', $TIPOAFECTACION);
        $stmt->bindParam(':MONTO', $MONTO);
        $stmt->bindParam(':SUBTOTAL', $SUBTOTAL);
        $stmt->bindParam(':PRODUCTO', $PRODUCTO);
        $stmt->bindParam(':LINK', $LINK);
        $stmt->bindParam(':ESPRODUCTO', $ESPRODUCTO);
        $stmt->bindParam(':MINCOMPRA', $MINCOMPRA);
        $stmt->bindParam(':PR', $PR);
        $stmt->bindParam(':COMPRIMIR', $COMPRIMIR);
        $stmt->bindParam(':CODSUNAT', $CODSUNAT);
        $stmt->bindParam(':MULTIPLO', $MULTIPLO);
        $stmt->bindParam(':BOLSAS', $BOLSAS);
        $stmt->bindParam(':TASAICBPER', $TASAICBPER);
        $stmt->bindParam(':ICBPER', $ICBPER);
        $stmt->bindParam(':IMGBOLSAS', $IMGBOLSAS);
        $stmt->bindParam(':PESO', $PESO);
        $stmt->bindParam(':FACTURABLE', $FACTURABLE);
        $stmt->bindParam(':ALMACEN', $ALMACEN);
        $stmt->bindParam(':PMAYOR', $PMAYOR);

        return $stmt->execute();
    }

    // Método para eliminar una detalleVenta por su ID
    public function eliminardetalleVentaPorID($ID){
        $query = `DELETE FROM detalleVenta WHERE ID = :ID `;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Método para actualizar una venta
    public function actualizardetalleVenta(
                                         $ID,
                                         $CANTIDAD,
                                         $UNIDAD,
                                         $DESCRIPCION,
                                         $PC,
                                         $PV,
                                         $PU,
                                         $PU_OR,
                                         $TIPOISC,
                                         $TASAISC,
                                         $ISCUNIT,
                                         $VVU,
                                         $TIPODSCTO,
                                         $DSCTOUNIT,
                                         $DSCTO,
                                         $TIPOCARGO,
                                         $CARGOUNIT,
                                         $CARGO,
                                         $VVitem,
                                         $ISC,
                                         $IGV,
                                         $TIPOOPERACION,
                                         $TIPOAFECTACION,
                                         $MONTO,
                                         $SUBTOTAL,
                                         $PRODUCTO,
                                         $LINK,
                                         $ESPRODUCTO,
                                         $MINCOMPRA,
                                         $PR,
                                         $COMPRIMIR,
                                         $CODSUNAT,
                                         $MULTIPLO,
                                         $BOLSAS,
                                         $TASAICBPER,
                                         $ICBPER,
                                         $IMGBOLSAS,
                                         $PESO,
                                         $FACTURABLE,
                                         $ALMACEN,
                                         $PMAYOR
 )
    {
        $query = `UPDATE detalleVenta 
                  SET  
                  CANTIDAD = :CANTIDAD,
                  UNIDAD = :UNIDAD,
                  DESCRIPCION = :DESCRIPCION,
                  PC = :PC,
                  PV = :PV,
                  PU = :PU,
                  PU_OR = :PU_OR,
                  TIPOISC = :TIPOISC,
                  TASAISC = :TASAISC,
                  ISCUNIT = :ISCUNIT,
                  VVU = :VVU,
                  TIPODSCTO = :TIPODSCTO,
                  DSCTOUNIT = :DSCTOUNIT,
                  DSCTO = :DSCTO,
                  TIPOCARGO = :TIPOCARGO,
                  CARGOUNIT = :CARGOUNIT,
                  CARGO = :CARGO,
                  VVitem = :VVitem,
                  ISC = :ISC,
                  IGV = :IGV,
                  TIPOOPERACION = :TIPOOPERACION,
                  TIPOAFECTACION = :TIPOAFECTACION,
                  MONTO = :MONTO,
                  SUBTOTAL = :SUBTOTAL,
                  PRODUCTO = :PRODUCTO,
                  LINK = :LINK,
                  ESPRODUCTO = :ESPRODUCTO,
                  MINCOMPRA = :MINCOMPRA,
                  PR = :PR,
                  COMPRIMIR = :COMPRIMIR,
                  CODSUNAT = :CODSUNAT,
                  MULTIPLO = :MULTIPLO,
                  BOLSAS = :BOLSAS,
                  TASAICBPER = :TASAICBPER,
                  ICBPER = :ICBPER,
                  IMGBOLSAS = :IMGBOLSAS,
                  PESO = :PESO,
                  FACTURABLE = :FACTURABLE,
                  ALMACEN = :ALMACEN,
                  PMAYOR = :PMAYOR
                  WHERE ID = :ID`;
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':ID', $ID);
        $stmt->bindParam(':CANTIDAD', $CANTIDAD);
        $stmt->bindParam(':UNIDAD', $UNIDAD);
        $stmt->bindParam(':DESCRIPCION', $DESCRIPCION);
        $stmt->bindParam(':PC', $PC);
        $stmt->bindParam(':PV', $PV);
        $stmt->bindParam(':PU', $PU);
        $stmt->bindParam(':PU_OR', $PU_OR);
        $stmt->bindParam(':TIPOISC', $TIPOISC);
        $stmt->bindParam(':TASAISC', $TASAISC);
        $stmt->bindParam(':ISCUNIT', $ISCUNIT);
        $stmt->bindParam(':VVU', $VVU);
        $stmt->bindParam(':TIPODSCTO', $TIPODSCTO);
        $stmt->bindParam(':DSCTOUNIT', $DSCTOUNIT);
        $stmt->bindParam(':DSCTO', $DSCTO);
        $stmt->bindParam(':TIPOCARGO', $TIPOCARGO);
        $stmt->bindParam(':CARGOUNIT', $CARGOUNIT);
        $stmt->bindParam(':CARGO', $CARGO);
        $stmt->bindParam(':VVitem', $VVitem);
        $stmt->bindParam(':ISC', $ISC);
        $stmt->bindParam(':IGV', $IGV);
        $stmt->bindParam(':TIPOOPERACION', $TIPOOPERACION);
        $stmt->bindParam(':TIPOAFECTACION', $TIPOAFECTACION);
        $stmt->bindParam(':MONTO', $MONTO);
        $stmt->bindParam(':SUBTOTAL', $SUBTOTAL);
        $stmt->bindParam(':PRODUCTO', $PRODUCTO);
        $stmt->bindParam(':LINK', $LINK);
        $stmt->bindParam(':ESPRODUCTO', $ESPRODUCTO);
        $stmt->bindParam(':MINCOMPRA', $MINCOMPRA);
        $stmt->bindParam(':PR', $PR);
        $stmt->bindParam(':COMPRIMIR', $COMPRIMIR);
        $stmt->bindParam(':CODSUNAT', $CODSUNAT);
        $stmt->bindParam(':MULTIPLO', $MULTIPLO);
        $stmt->bindParam(':BOLSAS', $BOLSAS);
        $stmt->bindParam(':TASAICBPER', $TASAICBPER);
        $stmt->bindParam(':ICBPER', $ICBPER);
        $stmt->bindParam(':IMGBOLSAS', $IMGBOLSAS);
        $stmt->bindParam(':PESO', $PESO);
        $stmt->bindParam(':FACTURABLE', $FACTURABLE);
        $stmt->bindParam(':ALMACEN', $ALMACEN);
        $stmt->bindParam(':PMAYOR', $PMAYOR);

        return $stmt->execute();
    }

    // Método para obtener una venta por su ID
    public function obtenerdetalleVentaPorId($id)
    {
        $query = `SELECT 
              ID,
              CANTIDAD,
              UNIDAD,
              DESCRIPCION,
              PC,
              PV,
              PU,
              PU_OR,
              TIPOISC,
              TASAISC,
              ISCUNIT,
              VVU,
              TIPODSCTO,
              DSCTOUNIT,
              DSCTO,
              TIPOCARGO,
              CARGOUNIT,
              CARGO,
              VVitem,
              ISC,
              IGV,
              TIPOOPERACION,
              TIPOAFECTACION,
              MONTO,
              SUBTOTAL,
              PRODUCTO,
              LINK,
              ESPRODUCTO,
              MINCOMPRA,
              PR,
              COMPRIMIR,
              CODSUNAT,
              MULTIPLO,
              BOLSAS,
              TASAICBPER,
              ICBPER,
              IMGBOLSAS,
              PESO,
              FACTURABLE,
              ALMACEN,
              PMAYOR
 FROM ventas WHERE ID = :ID`;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna una fila
    }
}
