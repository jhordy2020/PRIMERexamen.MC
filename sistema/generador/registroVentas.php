<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

// Todo lo relacionado con la base de datos para la tabla registroVentas
class modeloregistroVentas
{ 
    private $conexion;

    // Constructor: Obtiene la conexión a la base de datos al instanciar la clase
    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    // Método para obtener todas las registroVentas
    public function obtenerregistroVentas(){
        $query = $this->conexion->query('SELECT '.
                                        'DUAL, '.
                                        'FECHAEMISION, '.
                                        'FECHAVENCIMIENTO, '.
                                        'TIPOCOMPROBANTE, '.
                                        'SERIECO, '.
                                        'NUMEROCO, '.
                                        'TIPODOCUMENTO, '.
                                        'NRODOCUMENTO, '.
                                        'RAZONNOMBRE, '.
                                        'DIRECCION, '.
                                        'VEXPORTACION, '.
                                        'IGVTASA, '.
                                        'IGVIPM, '.
                                        'ISC, '.
                                        'OTROSTRIBUTOS, '.
                                        'BASEIMPONIBLE, '.
                                        'INAFECTAS, '.
                                        'TOTALEXONERADA, '.
                                        'GRATUITAS, '.
                                        'TIPODSCTO, '.
                                        'DSCTOUNIT, '.
                                        'DSCTOGLOBAL, '.
                                        'DESCUENTOS, '.
                                        'TIPOCARGO, '.
                                        'CARGOUNIT, '.
                                        'CARGOGLOBAL, '.
                                        'CARGOS, '.
                                        'IMPORTETOTAL, '.
                                        'MONEDA, '.
                                        'TIPOCAMBIO, '.
                                        'PERCEPUNIT, '.
                                        'PERCEPCION, '.
                                        'TIPOPAGO, '.
                                        'RCPFECHA, '.
                                        'RCPTIPO, '.
                                        'RCPSERIE, '.
                                        'RCPNUMERO, '.
                                        'MOTIVONOTA, '.
                                        'CODIGONOTA, '.
                                        'TIPOGUIA, '.
                                        'GUIAREMISION, '.
                                        'PLACA, '.
                                        'FECHATURNO, '.
                                        'TURNO, '.
                                        'HORA, '.
                                        'PUNTOVENTA, '.
                                        'MAQUINAVENTA, '.
                                        'SITUACION, '.
                                        'ENVIOSUNAT, '.
                                        'FECHAENVIO, '.
                                        'IDSESION, '.
                                        'CAJERO, '.
                                        'AFECTARSTOCK, '.
                                        'NPFACTURADO, '.
                                        'ENVIOCONTABILIDAD, '.
                                        'USERID, '.
                                        'GLOSA, '.
                                        'TRANSPORTABLE, '.
                                        'ENVIOWEB, '.
                                        'RESOLUCION, '.
                                        'ALMACEN, '.
                                        'ENTREGA, '.
                                        'COMPROBANTEELECTRONICO, '.
                                        'ESPECIALIDAD, '.
                                        'NROHISTORIA, '.
                                        'MEDICO, '.
                                        'PPCONVENIO, '.
                                        'CONVENIO, '.
                                        'REFERENCIA, '.
                                        'DATAVALIDADA, '.
                                        'ESTADOPLE, '.
                                        'RESUMENID, '.
                                        'NROSORTEO, '.
                                        'TASAICBPER, '.
                                        'CAT15_ELEM1, '.
                                        'CAT15_ELEM2, '.
                                        'CAT15_ELEM3, '.
                                        'CAT15_ELEM4, '.
                                        'CODDIRECCION, '.
                                        'CODLOCALANEXO, '.
                                        'PAGOEFECTIVO, '.
                                        'TIPOCLIENTE, '.
                                        'ORDENVENTA, '.
                                        'ENVIOWEBSERVICE, '.
                                        'TIPOOPERACION, '.
                                        'TOTALANTICIPOS, '.
                                        'IDCRM, '.
                                        'NROCUOTAS, '.
                                        'TELEFONO, '.
                                        'GARANTIA, '.
                                        'AUTORIZACION, '.
                                        'FECHACREACION, '.
                                        'TURNOCREACION, '.
                                        'NROCANJE, '.
                                        'NUMPAGO '.
                                                         'FROM registroVentas');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para insertar una nueva registroVentas
    public function insertarregistroVentas( 
                                         $FECHAEMISION,
                                         $FECHAVENCIMIENTO,
                                         $TIPOCOMPROBANTE,
                                         $SERIECO,
                                         $NUMEROCO,
                                         $TIPODOCUMENTO,
                                         $NRODOCUMENTO,
                                         $RAZONNOMBRE,
                                         $DIRECCION,
                                         $VEXPORTACION,
                                         $IGVTASA,
                                         $IGVIPM,
                                         $ISC,
                                         $OTROSTRIBUTOS,
                                         $BASEIMPONIBLE,
                                         $INAFECTAS,
                                         $TOTALEXONERADA,
                                         $GRATUITAS,
                                         $TIPODSCTO,
                                         $DSCTOUNIT,
                                         $DSCTOGLOBAL,
                                         $DESCUENTOS,
                                         $TIPOCARGO,
                                         $CARGOUNIT,
                                         $CARGOGLOBAL,
                                         $CARGOS,
                                         $IMPORTETOTAL,
                                         $MONEDA,
                                         $TIPOCAMBIO,
                                         $PERCEPUNIT,
                                         $PERCEPCION,
                                         $TIPOPAGO,
                                         $RCPFECHA,
                                         $RCPTIPO,
                                         $RCPSERIE,
                                         $RCPNUMERO,
                                         $MOTIVONOTA,
                                         $CODIGONOTA,
                                         $TIPOGUIA,
                                         $GUIAREMISION,
                                         $PLACA,
                                         $FECHATURNO,
                                         $TURNO,
                                         $HORA,
                                         $PUNTOVENTA,
                                         $MAQUINAVENTA,
                                         $SITUACION,
                                         $ENVIOSUNAT,
                                         $FECHAENVIO,
                                         $IDSESION,
                                         $CAJERO,
                                         $AFECTARSTOCK,
                                         $NPFACTURADO,
                                         $ENVIOCONTABILIDAD,
                                         $USERID,
                                         $GLOSA,
                                         $TRANSPORTABLE,
                                         $ENVIOWEB,
                                         $RESOLUCION,
                                         $ALMACEN,
                                         $ENTREGA,
                                         $COMPROBANTEELECTRONICO,
                                         $ESPECIALIDAD,
                                         $NROHISTORIA,
                                         $MEDICO,
                                         $PPCONVENIO,
                                         $CONVENIO,
                                         $REFERENCIA,
                                         $DATAVALIDADA,
                                         $ESTADOPLE,
                                         $RESUMENID,
                                         $NROSORTEO,
                                         $TASAICBPER,
                                         $CAT15_ELEM1,
                                         $CAT15_ELEM2,
                                         $CAT15_ELEM3,
                                         $CAT15_ELEM4,
                                         $CODDIRECCION,
                                         $CODLOCALANEXO,
                                         $PAGOEFECTIVO,
                                         $TIPOCLIENTE,
                                         $ORDENVENTA,
                                         $ENVIOWEBSERVICE,
                                         $TIPOOPERACION,
                                         $TOTALANTICIPOS,
                                         $IDCRM,
                                         $NROCUOTAS,
                                         $TELEFONO,
                                         $GARANTIA,
                                         $AUTORIZACION,
                                         $FECHACREACION,
                                         $TURNOCREACION,
                                         $NROCANJE,
                                         $NUMPAGO
                                             )
    {
        $query = `INSERT INTO registroVentas (
                                      FECHAEMISION,
                                      FECHAVENCIMIENTO,
                                      TIPOCOMPROBANTE,
                                      SERIECO,
                                      NUMEROCO,
                                      TIPODOCUMENTO,
                                      NRODOCUMENTO,
                                      RAZONNOMBRE,
                                      DIRECCION,
                                      VEXPORTACION,
                                      IGVTASA,
                                      IGVIPM,
                                      ISC,
                                      OTROSTRIBUTOS,
                                      BASEIMPONIBLE,
                                      INAFECTAS,
                                      TOTALEXONERADA,
                                      GRATUITAS,
                                      TIPODSCTO,
                                      DSCTOUNIT,
                                      DSCTOGLOBAL,
                                      DESCUENTOS,
                                      TIPOCARGO,
                                      CARGOUNIT,
                                      CARGOGLOBAL,
                                      CARGOS,
                                      IMPORTETOTAL,
                                      MONEDA,
                                      TIPOCAMBIO,
                                      PERCEPUNIT,
                                      PERCEPCION,
                                      TIPOPAGO,
                                      RCPFECHA,
                                      RCPTIPO,
                                      RCPSERIE,
                                      RCPNUMERO,
                                      MOTIVONOTA,
                                      CODIGONOTA,
                                      TIPOGUIA,
                                      GUIAREMISION,
                                      PLACA,
                                      FECHATURNO,
                                      TURNO,
                                      HORA,
                                      PUNTOVENTA,
                                      MAQUINAVENTA,
                                      SITUACION,
                                      ENVIOSUNAT,
                                      FECHAENVIO,
                                      IDSESION,
                                      CAJERO,
                                      AFECTARSTOCK,
                                      NPFACTURADO,
                                      ENVIOCONTABILIDAD,
                                      USERID,
                                      GLOSA,
                                      TRANSPORTABLE,
                                      ENVIOWEB,
                                      RESOLUCION,
                                      ALMACEN,
                                      ENTREGA,
                                      COMPROBANTEELECTRONICO,
                                      ESPECIALIDAD,
                                      NROHISTORIA,
                                      MEDICO,
                                      PPCONVENIO,
                                      CONVENIO,
                                      REFERENCIA,
                                      DATAVALIDADA,
                                      ESTADOPLE,
                                      RESUMENID,
                                      NROSORTEO,
                                      TASAICBPER,
                                      CAT15_ELEM1,
                                      CAT15_ELEM2,
                                      CAT15_ELEM3,
                                      CAT15_ELEM4,
                                      CODDIRECCION,
                                      CODLOCALANEXO,
                                      PAGOEFECTIVO,
                                      TIPOCLIENTE,
                                      ORDENVENTA,
                                      ENVIOWEBSERVICE,
                                      TIPOOPERACION,
                                      TOTALANTICIPOS,
                                      IDCRM,
                                      NROCUOTAS,
                                      TELEFONO,
                                      GARANTIA,
                                      AUTORIZACION,
                                      FECHACREACION,
                                      TURNOCREACION,
                                      NROCANJE,
                                      NUMPAGO
) 
        VALUES ( 
                :FECHAEMISION,
                :FECHAVENCIMIENTO,
                :TIPOCOMPROBANTE,
                :SERIECO,
                :NUMEROCO,
                :TIPODOCUMENTO,
                :NRODOCUMENTO,
                :RAZONNOMBRE,
                :DIRECCION,
                :VEXPORTACION,
                :IGVTASA,
                :IGVIPM,
                :ISC,
                :OTROSTRIBUTOS,
                :BASEIMPONIBLE,
                :INAFECTAS,
                :TOTALEXONERADA,
                :GRATUITAS,
                :TIPODSCTO,
                :DSCTOUNIT,
                :DSCTOGLOBAL,
                :DESCUENTOS,
                :TIPOCARGO,
                :CARGOUNIT,
                :CARGOGLOBAL,
                :CARGOS,
                :IMPORTETOTAL,
                :MONEDA,
                :TIPOCAMBIO,
                :PERCEPUNIT,
                :PERCEPCION,
                :TIPOPAGO,
                :RCPFECHA,
                :RCPTIPO,
                :RCPSERIE,
                :RCPNUMERO,
                :MOTIVONOTA,
                :CODIGONOTA,
                :TIPOGUIA,
                :GUIAREMISION,
                :PLACA,
                :FECHATURNO,
                :TURNO,
                :HORA,
                :PUNTOVENTA,
                :MAQUINAVENTA,
                :SITUACION,
                :ENVIOSUNAT,
                :FECHAENVIO,
                :IDSESION,
                :CAJERO,
                :AFECTARSTOCK,
                :NPFACTURADO,
                :ENVIOCONTABILIDAD,
                :USERID,
                :GLOSA,
                :TRANSPORTABLE,
                :ENVIOWEB,
                :RESOLUCION,
                :ALMACEN,
                :ENTREGA,
                :COMPROBANTEELECTRONICO,
                :ESPECIALIDAD,
                :NROHISTORIA,
                :MEDICO,
                :PPCONVENIO,
                :CONVENIO,
                :REFERENCIA,
                :DATAVALIDADA,
                :ESTADOPLE,
                :RESUMENID,
                :NROSORTEO,
                :TASAICBPER,
                :CAT15_ELEM1,
                :CAT15_ELEM2,
                :CAT15_ELEM3,
                :CAT15_ELEM4,
                :CODDIRECCION,
                :CODLOCALANEXO,
                :PAGOEFECTIVO,
                :TIPOCLIENTE,
                :ORDENVENTA,
                :ENVIOWEBSERVICE,
                :TIPOOPERACION,
                :TOTALANTICIPOS,
                :IDCRM,
                :NROCUOTAS,
                :TELEFONO,
                :GARANTIA,
                :AUTORIZACION,
                :FECHACREACION,
                :TURNOCREACION,
                :NROCANJE,
                :NUMPAGO
)`;
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':FECHAEMISION', $FECHAEMISION);
        $stmt->bindParam(':FECHAVENCIMIENTO', $FECHAVENCIMIENTO);
        $stmt->bindParam(':TIPOCOMPROBANTE', $TIPOCOMPROBANTE);
        $stmt->bindParam(':SERIECO', $SERIECO);
        $stmt->bindParam(':NUMEROCO', $NUMEROCO);
        $stmt->bindParam(':TIPODOCUMENTO', $TIPODOCUMENTO);
        $stmt->bindParam(':NRODOCUMENTO', $NRODOCUMENTO);
        $stmt->bindParam(':RAZONNOMBRE', $RAZONNOMBRE);
        $stmt->bindParam(':DIRECCION', $DIRECCION);
        $stmt->bindParam(':VEXPORTACION', $VEXPORTACION);
        $stmt->bindParam(':IGVTASA', $IGVTASA);
        $stmt->bindParam(':IGVIPM', $IGVIPM);
        $stmt->bindParam(':ISC', $ISC);
        $stmt->bindParam(':OTROSTRIBUTOS', $OTROSTRIBUTOS);
        $stmt->bindParam(':BASEIMPONIBLE', $BASEIMPONIBLE);
        $stmt->bindParam(':INAFECTAS', $INAFECTAS);
        $stmt->bindParam(':TOTALEXONERADA', $TOTALEXONERADA);
        $stmt->bindParam(':GRATUITAS', $GRATUITAS);
        $stmt->bindParam(':TIPODSCTO', $TIPODSCTO);
        $stmt->bindParam(':DSCTOUNIT', $DSCTOUNIT);
        $stmt->bindParam(':DSCTOGLOBAL', $DSCTOGLOBAL);
        $stmt->bindParam(':DESCUENTOS', $DESCUENTOS);
        $stmt->bindParam(':TIPOCARGO', $TIPOCARGO);
        $stmt->bindParam(':CARGOUNIT', $CARGOUNIT);
        $stmt->bindParam(':CARGOGLOBAL', $CARGOGLOBAL);
        $stmt->bindParam(':CARGOS', $CARGOS);
        $stmt->bindParam(':IMPORTETOTAL', $IMPORTETOTAL);
        $stmt->bindParam(':MONEDA', $MONEDA);
        $stmt->bindParam(':TIPOCAMBIO', $TIPOCAMBIO);
        $stmt->bindParam(':PERCEPUNIT', $PERCEPUNIT);
        $stmt->bindParam(':PERCEPCION', $PERCEPCION);
        $stmt->bindParam(':TIPOPAGO', $TIPOPAGO);
        $stmt->bindParam(':RCPFECHA', $RCPFECHA);
        $stmt->bindParam(':RCPTIPO', $RCPTIPO);
        $stmt->bindParam(':RCPSERIE', $RCPSERIE);
        $stmt->bindParam(':RCPNUMERO', $RCPNUMERO);
        $stmt->bindParam(':MOTIVONOTA', $MOTIVONOTA);
        $stmt->bindParam(':CODIGONOTA', $CODIGONOTA);
        $stmt->bindParam(':TIPOGUIA', $TIPOGUIA);
        $stmt->bindParam(':GUIAREMISION', $GUIAREMISION);
        $stmt->bindParam(':PLACA', $PLACA);
        $stmt->bindParam(':FECHATURNO', $FECHATURNO);
        $stmt->bindParam(':TURNO', $TURNO);
        $stmt->bindParam(':HORA', $HORA);
        $stmt->bindParam(':PUNTOVENTA', $PUNTOVENTA);
        $stmt->bindParam(':MAQUINAVENTA', $MAQUINAVENTA);
        $stmt->bindParam(':SITUACION', $SITUACION);
        $stmt->bindParam(':ENVIOSUNAT', $ENVIOSUNAT);
        $stmt->bindParam(':FECHAENVIO', $FECHAENVIO);
        $stmt->bindParam(':IDSESION', $IDSESION);
        $stmt->bindParam(':CAJERO', $CAJERO);
        $stmt->bindParam(':AFECTARSTOCK', $AFECTARSTOCK);
        $stmt->bindParam(':NPFACTURADO', $NPFACTURADO);
        $stmt->bindParam(':ENVIOCONTABILIDAD', $ENVIOCONTABILIDAD);
        $stmt->bindParam(':USERID', $USERID);
        $stmt->bindParam(':GLOSA', $GLOSA);
        $stmt->bindParam(':TRANSPORTABLE', $TRANSPORTABLE);
        $stmt->bindParam(':ENVIOWEB', $ENVIOWEB);
        $stmt->bindParam(':RESOLUCION', $RESOLUCION);
        $stmt->bindParam(':ALMACEN', $ALMACEN);
        $stmt->bindParam(':ENTREGA', $ENTREGA);
        $stmt->bindParam(':COMPROBANTEELECTRONICO', $COMPROBANTEELECTRONICO);
        $stmt->bindParam(':ESPECIALIDAD', $ESPECIALIDAD);
        $stmt->bindParam(':NROHISTORIA', $NROHISTORIA);
        $stmt->bindParam(':MEDICO', $MEDICO);
        $stmt->bindParam(':PPCONVENIO', $PPCONVENIO);
        $stmt->bindParam(':CONVENIO', $CONVENIO);
        $stmt->bindParam(':REFERENCIA', $REFERENCIA);
        $stmt->bindParam(':DATAVALIDADA', $DATAVALIDADA);
        $stmt->bindParam(':ESTADOPLE', $ESTADOPLE);
        $stmt->bindParam(':RESUMENID', $RESUMENID);
        $stmt->bindParam(':NROSORTEO', $NROSORTEO);
        $stmt->bindParam(':TASAICBPER', $TASAICBPER);
        $stmt->bindParam(':CAT15_ELEM1', $CAT15_ELEM1);
        $stmt->bindParam(':CAT15_ELEM2', $CAT15_ELEM2);
        $stmt->bindParam(':CAT15_ELEM3', $CAT15_ELEM3);
        $stmt->bindParam(':CAT15_ELEM4', $CAT15_ELEM4);
        $stmt->bindParam(':CODDIRECCION', $CODDIRECCION);
        $stmt->bindParam(':CODLOCALANEXO', $CODLOCALANEXO);
        $stmt->bindParam(':PAGOEFECTIVO', $PAGOEFECTIVO);
        $stmt->bindParam(':TIPOCLIENTE', $TIPOCLIENTE);
        $stmt->bindParam(':ORDENVENTA', $ORDENVENTA);
        $stmt->bindParam(':ENVIOWEBSERVICE', $ENVIOWEBSERVICE);
        $stmt->bindParam(':TIPOOPERACION', $TIPOOPERACION);
        $stmt->bindParam(':TOTALANTICIPOS', $TOTALANTICIPOS);
        $stmt->bindParam(':IDCRM', $IDCRM);
        $stmt->bindParam(':NROCUOTAS', $NROCUOTAS);
        $stmt->bindParam(':TELEFONO', $TELEFONO);
        $stmt->bindParam(':GARANTIA', $GARANTIA);
        $stmt->bindParam(':AUTORIZACION', $AUTORIZACION);
        $stmt->bindParam(':FECHACREACION', $FECHACREACION);
        $stmt->bindParam(':TURNOCREACION', $TURNOCREACION);
        $stmt->bindParam(':NROCANJE', $NROCANJE);
        $stmt->bindParam(':NUMPAGO', $NUMPAGO);

        return $stmt->execute();
    }

    // Método para eliminar una registroVentas por su ID
    public function eliminarregistroVentasPorDUAL($DUAL){
        $query = `DELETE FROM registroVentas WHERE DUAL = :DUAL `;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':DUAL', $DUAL, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Método para actualizar una venta
    public function actualizarregistroVentas(
                                         $DUAL,
                                         $FECHAEMISION,
                                         $FECHAVENCIMIENTO,
                                         $TIPOCOMPROBANTE,
                                         $SERIECO,
                                         $NUMEROCO,
                                         $TIPODOCUMENTO,
                                         $NRODOCUMENTO,
                                         $RAZONNOMBRE,
                                         $DIRECCION,
                                         $VEXPORTACION,
                                         $IGVTASA,
                                         $IGVIPM,
                                         $ISC,
                                         $OTROSTRIBUTOS,
                                         $BASEIMPONIBLE,
                                         $INAFECTAS,
                                         $TOTALEXONERADA,
                                         $GRATUITAS,
                                         $TIPODSCTO,
                                         $DSCTOUNIT,
                                         $DSCTOGLOBAL,
                                         $DESCUENTOS,
                                         $TIPOCARGO,
                                         $CARGOUNIT,
                                         $CARGOGLOBAL,
                                         $CARGOS,
                                         $IMPORTETOTAL,
                                         $MONEDA,
                                         $TIPOCAMBIO,
                                         $PERCEPUNIT,
                                         $PERCEPCION,
                                         $TIPOPAGO,
                                         $RCPFECHA,
                                         $RCPTIPO,
                                         $RCPSERIE,
                                         $RCPNUMERO,
                                         $MOTIVONOTA,
                                         $CODIGONOTA,
                                         $TIPOGUIA,
                                         $GUIAREMISION,
                                         $PLACA,
                                         $FECHATURNO,
                                         $TURNO,
                                         $HORA,
                                         $PUNTOVENTA,
                                         $MAQUINAVENTA,
                                         $SITUACION,
                                         $ENVIOSUNAT,
                                         $FECHAENVIO,
                                         $IDSESION,
                                         $CAJERO,
                                         $AFECTARSTOCK,
                                         $NPFACTURADO,
                                         $ENVIOCONTABILIDAD,
                                         $USERID,
                                         $GLOSA,
                                         $TRANSPORTABLE,
                                         $ENVIOWEB,
                                         $RESOLUCION,
                                         $ALMACEN,
                                         $ENTREGA,
                                         $COMPROBANTEELECTRONICO,
                                         $ESPECIALIDAD,
                                         $NROHISTORIA,
                                         $MEDICO,
                                         $PPCONVENIO,
                                         $CONVENIO,
                                         $REFERENCIA,
                                         $DATAVALIDADA,
                                         $ESTADOPLE,
                                         $RESUMENID,
                                         $NROSORTEO,
                                         $TASAICBPER,
                                         $CAT15_ELEM1,
                                         $CAT15_ELEM2,
                                         $CAT15_ELEM3,
                                         $CAT15_ELEM4,
                                         $CODDIRECCION,
                                         $CODLOCALANEXO,
                                         $PAGOEFECTIVO,
                                         $TIPOCLIENTE,
                                         $ORDENVENTA,
                                         $ENVIOWEBSERVICE,
                                         $TIPOOPERACION,
                                         $TOTALANTICIPOS,
                                         $IDCRM,
                                         $NROCUOTAS,
                                         $TELEFONO,
                                         $GARANTIA,
                                         $AUTORIZACION,
                                         $FECHACREACION,
                                         $TURNOCREACION,
                                         $NROCANJE,
                                         $NUMPAGO
 )
    {
        $query = `UPDATE registroVentas 
                  SET  
                  FECHAEMISION = :FECHAEMISION,
                  FECHAVENCIMIENTO = :FECHAVENCIMIENTO,
                  TIPOCOMPROBANTE = :TIPOCOMPROBANTE,
                  SERIECO = :SERIECO,
                  NUMEROCO = :NUMEROCO,
                  TIPODOCUMENTO = :TIPODOCUMENTO,
                  NRODOCUMENTO = :NRODOCUMENTO,
                  RAZONNOMBRE = :RAZONNOMBRE,
                  DIRECCION = :DIRECCION,
                  VEXPORTACION = :VEXPORTACION,
                  IGVTASA = :IGVTASA,
                  IGVIPM = :IGVIPM,
                  ISC = :ISC,
                  OTROSTRIBUTOS = :OTROSTRIBUTOS,
                  BASEIMPONIBLE = :BASEIMPONIBLE,
                  INAFECTAS = :INAFECTAS,
                  TOTALEXONERADA = :TOTALEXONERADA,
                  GRATUITAS = :GRATUITAS,
                  TIPODSCTO = :TIPODSCTO,
                  DSCTOUNIT = :DSCTOUNIT,
                  DSCTOGLOBAL = :DSCTOGLOBAL,
                  DESCUENTOS = :DESCUENTOS,
                  TIPOCARGO = :TIPOCARGO,
                  CARGOUNIT = :CARGOUNIT,
                  CARGOGLOBAL = :CARGOGLOBAL,
                  CARGOS = :CARGOS,
                  IMPORTETOTAL = :IMPORTETOTAL,
                  MONEDA = :MONEDA,
                  TIPOCAMBIO = :TIPOCAMBIO,
                  PERCEPUNIT = :PERCEPUNIT,
                  PERCEPCION = :PERCEPCION,
                  TIPOPAGO = :TIPOPAGO,
                  RCPFECHA = :RCPFECHA,
                  RCPTIPO = :RCPTIPO,
                  RCPSERIE = :RCPSERIE,
                  RCPNUMERO = :RCPNUMERO,
                  MOTIVONOTA = :MOTIVONOTA,
                  CODIGONOTA = :CODIGONOTA,
                  TIPOGUIA = :TIPOGUIA,
                  GUIAREMISION = :GUIAREMISION,
                  PLACA = :PLACA,
                  FECHATURNO = :FECHATURNO,
                  TURNO = :TURNO,
                  HORA = :HORA,
                  PUNTOVENTA = :PUNTOVENTA,
                  MAQUINAVENTA = :MAQUINAVENTA,
                  SITUACION = :SITUACION,
                  ENVIOSUNAT = :ENVIOSUNAT,
                  FECHAENVIO = :FECHAENVIO,
                  IDSESION = :IDSESION,
                  CAJERO = :CAJERO,
                  AFECTARSTOCK = :AFECTARSTOCK,
                  NPFACTURADO = :NPFACTURADO,
                  ENVIOCONTABILIDAD = :ENVIOCONTABILIDAD,
                  USERID = :USERID,
                  GLOSA = :GLOSA,
                  TRANSPORTABLE = :TRANSPORTABLE,
                  ENVIOWEB = :ENVIOWEB,
                  RESOLUCION = :RESOLUCION,
                  ALMACEN = :ALMACEN,
                  ENTREGA = :ENTREGA,
                  COMPROBANTEELECTRONICO = :COMPROBANTEELECTRONICO,
                  ESPECIALIDAD = :ESPECIALIDAD,
                  NROHISTORIA = :NROHISTORIA,
                  MEDICO = :MEDICO,
                  PPCONVENIO = :PPCONVENIO,
                  CONVENIO = :CONVENIO,
                  REFERENCIA = :REFERENCIA,
                  DATAVALIDADA = :DATAVALIDADA,
                  ESTADOPLE = :ESTADOPLE,
                  RESUMENID = :RESUMENID,
                  NROSORTEO = :NROSORTEO,
                  TASAICBPER = :TASAICBPER,
                  CAT15_ELEM1 = :CAT15_ELEM1,
                  CAT15_ELEM2 = :CAT15_ELEM2,
                  CAT15_ELEM3 = :CAT15_ELEM3,
                  CAT15_ELEM4 = :CAT15_ELEM4,
                  CODDIRECCION = :CODDIRECCION,
                  CODLOCALANEXO = :CODLOCALANEXO,
                  PAGOEFECTIVO = :PAGOEFECTIVO,
                  TIPOCLIENTE = :TIPOCLIENTE,
                  ORDENVENTA = :ORDENVENTA,
                  ENVIOWEBSERVICE = :ENVIOWEBSERVICE,
                  TIPOOPERACION = :TIPOOPERACION,
                  TOTALANTICIPOS = :TOTALANTICIPOS,
                  IDCRM = :IDCRM,
                  NROCUOTAS = :NROCUOTAS,
                  TELEFONO = :TELEFONO,
                  GARANTIA = :GARANTIA,
                  AUTORIZACION = :AUTORIZACION,
                  FECHACREACION = :FECHACREACION,
                  TURNOCREACION = :TURNOCREACION,
                  NROCANJE = :NROCANJE,
                  NUMPAGO = :NUMPAGO
                  WHERE DUAL = :DUAL`;
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':DUAL', $DUAL);
        $stmt->bindParam(':FECHAEMISION', $FECHAEMISION);
        $stmt->bindParam(':FECHAVENCIMIENTO', $FECHAVENCIMIENTO);
        $stmt->bindParam(':TIPOCOMPROBANTE', $TIPOCOMPROBANTE);
        $stmt->bindParam(':SERIECO', $SERIECO);
        $stmt->bindParam(':NUMEROCO', $NUMEROCO);
        $stmt->bindParam(':TIPODOCUMENTO', $TIPODOCUMENTO);
        $stmt->bindParam(':NRODOCUMENTO', $NRODOCUMENTO);
        $stmt->bindParam(':RAZONNOMBRE', $RAZONNOMBRE);
        $stmt->bindParam(':DIRECCION', $DIRECCION);
        $stmt->bindParam(':VEXPORTACION', $VEXPORTACION);
        $stmt->bindParam(':IGVTASA', $IGVTASA);
        $stmt->bindParam(':IGVIPM', $IGVIPM);
        $stmt->bindParam(':ISC', $ISC);
        $stmt->bindParam(':OTROSTRIBUTOS', $OTROSTRIBUTOS);
        $stmt->bindParam(':BASEIMPONIBLE', $BASEIMPONIBLE);
        $stmt->bindParam(':INAFECTAS', $INAFECTAS);
        $stmt->bindParam(':TOTALEXONERADA', $TOTALEXONERADA);
        $stmt->bindParam(':GRATUITAS', $GRATUITAS);
        $stmt->bindParam(':TIPODSCTO', $TIPODSCTO);
        $stmt->bindParam(':DSCTOUNIT', $DSCTOUNIT);
        $stmt->bindParam(':DSCTOGLOBAL', $DSCTOGLOBAL);
        $stmt->bindParam(':DESCUENTOS', $DESCUENTOS);
        $stmt->bindParam(':TIPOCARGO', $TIPOCARGO);
        $stmt->bindParam(':CARGOUNIT', $CARGOUNIT);
        $stmt->bindParam(':CARGOGLOBAL', $CARGOGLOBAL);
        $stmt->bindParam(':CARGOS', $CARGOS);
        $stmt->bindParam(':IMPORTETOTAL', $IMPORTETOTAL);
        $stmt->bindParam(':MONEDA', $MONEDA);
        $stmt->bindParam(':TIPOCAMBIO', $TIPOCAMBIO);
        $stmt->bindParam(':PERCEPUNIT', $PERCEPUNIT);
        $stmt->bindParam(':PERCEPCION', $PERCEPCION);
        $stmt->bindParam(':TIPOPAGO', $TIPOPAGO);
        $stmt->bindParam(':RCPFECHA', $RCPFECHA);
        $stmt->bindParam(':RCPTIPO', $RCPTIPO);
        $stmt->bindParam(':RCPSERIE', $RCPSERIE);
        $stmt->bindParam(':RCPNUMERO', $RCPNUMERO);
        $stmt->bindParam(':MOTIVONOTA', $MOTIVONOTA);
        $stmt->bindParam(':CODIGONOTA', $CODIGONOTA);
        $stmt->bindParam(':TIPOGUIA', $TIPOGUIA);
        $stmt->bindParam(':GUIAREMISION', $GUIAREMISION);
        $stmt->bindParam(':PLACA', $PLACA);
        $stmt->bindParam(':FECHATURNO', $FECHATURNO);
        $stmt->bindParam(':TURNO', $TURNO);
        $stmt->bindParam(':HORA', $HORA);
        $stmt->bindParam(':PUNTOVENTA', $PUNTOVENTA);
        $stmt->bindParam(':MAQUINAVENTA', $MAQUINAVENTA);
        $stmt->bindParam(':SITUACION', $SITUACION);
        $stmt->bindParam(':ENVIOSUNAT', $ENVIOSUNAT);
        $stmt->bindParam(':FECHAENVIO', $FECHAENVIO);
        $stmt->bindParam(':IDSESION', $IDSESION);
        $stmt->bindParam(':CAJERO', $CAJERO);
        $stmt->bindParam(':AFECTARSTOCK', $AFECTARSTOCK);
        $stmt->bindParam(':NPFACTURADO', $NPFACTURADO);
        $stmt->bindParam(':ENVIOCONTABILIDAD', $ENVIOCONTABILIDAD);
        $stmt->bindParam(':USERID', $USERID);
        $stmt->bindParam(':GLOSA', $GLOSA);
        $stmt->bindParam(':TRANSPORTABLE', $TRANSPORTABLE);
        $stmt->bindParam(':ENVIOWEB', $ENVIOWEB);
        $stmt->bindParam(':RESOLUCION', $RESOLUCION);
        $stmt->bindParam(':ALMACEN', $ALMACEN);
        $stmt->bindParam(':ENTREGA', $ENTREGA);
        $stmt->bindParam(':COMPROBANTEELECTRONICO', $COMPROBANTEELECTRONICO);
        $stmt->bindParam(':ESPECIALIDAD', $ESPECIALIDAD);
        $stmt->bindParam(':NROHISTORIA', $NROHISTORIA);
        $stmt->bindParam(':MEDICO', $MEDICO);
        $stmt->bindParam(':PPCONVENIO', $PPCONVENIO);
        $stmt->bindParam(':CONVENIO', $CONVENIO);
        $stmt->bindParam(':REFERENCIA', $REFERENCIA);
        $stmt->bindParam(':DATAVALIDADA', $DATAVALIDADA);
        $stmt->bindParam(':ESTADOPLE', $ESTADOPLE);
        $stmt->bindParam(':RESUMENID', $RESUMENID);
        $stmt->bindParam(':NROSORTEO', $NROSORTEO);
        $stmt->bindParam(':TASAICBPER', $TASAICBPER);
        $stmt->bindParam(':CAT15_ELEM1', $CAT15_ELEM1);
        $stmt->bindParam(':CAT15_ELEM2', $CAT15_ELEM2);
        $stmt->bindParam(':CAT15_ELEM3', $CAT15_ELEM3);
        $stmt->bindParam(':CAT15_ELEM4', $CAT15_ELEM4);
        $stmt->bindParam(':CODDIRECCION', $CODDIRECCION);
        $stmt->bindParam(':CODLOCALANEXO', $CODLOCALANEXO);
        $stmt->bindParam(':PAGOEFECTIVO', $PAGOEFECTIVO);
        $stmt->bindParam(':TIPOCLIENTE', $TIPOCLIENTE);
        $stmt->bindParam(':ORDENVENTA', $ORDENVENTA);
        $stmt->bindParam(':ENVIOWEBSERVICE', $ENVIOWEBSERVICE);
        $stmt->bindParam(':TIPOOPERACION', $TIPOOPERACION);
        $stmt->bindParam(':TOTALANTICIPOS', $TOTALANTICIPOS);
        $stmt->bindParam(':IDCRM', $IDCRM);
        $stmt->bindParam(':NROCUOTAS', $NROCUOTAS);
        $stmt->bindParam(':TELEFONO', $TELEFONO);
        $stmt->bindParam(':GARANTIA', $GARANTIA);
        $stmt->bindParam(':AUTORIZACION', $AUTORIZACION);
        $stmt->bindParam(':FECHACREACION', $FECHACREACION);
        $stmt->bindParam(':TURNOCREACION', $TURNOCREACION);
        $stmt->bindParam(':NROCANJE', $NROCANJE);
        $stmt->bindParam(':NUMPAGO', $NUMPAGO);

        return $stmt->execute();
    }

    // Método para obtener una venta por su DUAL
    public function obtenerregistroVentasPorId($DUAL)
    {
        $query = `SELECT 
              DUAL,
              FECHAEMISION,
              FECHAVENCIMIENTO,
              TIPOCOMPROBANTE,
              SERIECO,
              NUMEROCO,
              TIPODOCUMENTO,
              NRODOCUMENTO,
              RAZONNOMBRE,
              DIRECCION,
              VEXPORTACION,
              IGVTASA,
              IGVIPM,
              ISC,
              OTROSTRIBUTOS,
              BASEIMPONIBLE,
              INAFECTAS,
              TOTALEXONERADA,
              GRATUITAS,
              TIPODSCTO,
              DSCTOUNIT,
              DSCTOGLOBAL,
              DESCUENTOS,
              TIPOCARGO,
              CARGOUNIT,
              CARGOGLOBAL,
              CARGOS,
              IMPORTETOTAL,
              MONEDA,
              TIPOCAMBIO,
              PERCEPUNIT,
              PERCEPCION,
              TIPOPAGO,
              RCPFECHA,
              RCPTIPO,
              RCPSERIE,
              RCPNUMERO,
              MOTIVONOTA,
              CODIGONOTA,
              TIPOGUIA,
              GUIAREMISION,
              PLACA,
              FECHATURNO,
              TURNO,
              HORA,
              PUNTOVENTA,
              MAQUINAVENTA,
              SITUACION,
              ENVIOSUNAT,
              FECHAENVIO,
              IDSESION,
              CAJERO,
              AFECTARSTOCK,
              NPFACTURADO,
              ENVIOCONTABILIDAD,
              USERID,
              GLOSA,
              TRANSPORTABLE,
              ENVIOWEB,
              RESOLUCION,
              ALMACEN,
              ENTREGA,
              COMPROBANTEELECTRONICO,
              ESPECIALIDAD,
              NROHISTORIA,
              MEDICO,
              PPCONVENIO,
              CONVENIO,
              REFERENCIA,
              DATAVALIDADA,
              ESTADOPLE,
              RESUMENID,
              NROSORTEO,
              TASAICBPER,
              CAT15_ELEM1,
              CAT15_ELEM2,
              CAT15_ELEM3,
              CAT15_ELEM4,
              CODDIRECCION,
              CODLOCALANEXO,
              PAGOEFECTIVO,
              TIPOCLIENTE,
              ORDENVENTA,
              ENVIOWEBSERVICE,
              TIPOOPERACION,
              TOTALANTICIPOS,
              IDCRM,
              NROCUOTAS,
              TELEFONO,
              GARANTIA,
              AUTORIZACION,
              FECHACREACION,
              TURNOCREACION,
              NROCANJE,
              NUMPAGO
 FROM ventas WHERE DUAL = :DUAL`;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':DUAL', $DUAL, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna una fila
    }
}
