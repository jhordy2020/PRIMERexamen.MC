CREATE TABLE detalleventa (
    ID INTEGER PRIMARY KEY,
    CANTIDAD FLOAT NOT NULL,
    UNIDAD VARCHAR(8) NOT NULL,
    DESCRIPCION VARCHAR(250) NOT NULL,
    PC FLOAT NOT NULL,
    PV FLOAT NOT NULL,
    PU FLOAT NOT NULL,
    PU_OR FLOAT NOT NULL,
    TIPOISC SMALLINT NOT NULL,
    TASAISC FLOAT NOT NULL,
    ISCUNIT FLOAT NOT NULL,
    VVU FLOAT NOT NULL,
    TIPODSCTO SMALLINT NOT NULL,
    DSCTOUNIT FLOAT NOT NULL,
    DSCTO FLOAT NOT NULL,
    TIPOCARGO SMALLINT NOT NULL,
    CARGOUNIT FLOAT NOT NULL,
    CARGO FLOAT NOT NULL,
    VVitem FLOAT NOT NULL,
    ISC FLOAT NOT NULL,
    IGV FLOAT NOT NULL,
    TIPOOPERACION SMALLINT NOT NULL,
    TIPOAFECTACION SMALLINT NOT NULL,
    MONTO FLOAT NOT NULL,
    SUBTOTAL FLOAT NOT NULL,
    PRODUCTO VARCHAR(18) NOT NULL,
    LINK VARCHAR(32) NOT NULL,
    ESPRODUCTO SMALLINT NOT NULL,
    MINCOMPRA FLOAT NOT NULL,
    PR FLOAT NOT NULL,
    COMPRIMIR VARCHAR(1) NOT NULL,
    CODSUNAT VARCHAR(10) NOT NULL,
    MULTIPLO FLOAT NOT NULL,
    BOLSAS INTEGER NOT NULL,
    TASAICBPER FLOAT NOT NULL,
    ICBPER FLOAT NOT NULL,
    IMGBOLSAS VARCHAR(6) NOT NULL,
    PESO FLOAT NOT NULL,
    FACTURABLE SMALLINT NOT NULL,
    ALMACEN VARCHAR(18) NOT NULL,
    PMAYOR FLOAT NOT NULL
);
