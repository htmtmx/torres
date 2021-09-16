<?php

include_once "CONEXION.php";
include_once "I_COCHE.php";

class COCHE extends CONEXION implements I_COCHE
{
    private $no_vehiculo;
    private $id_modelo_fk;
    private $niv;
    private $fecha_registro;
    private $anio;
    private $placa;
    private $entidad_placa;
    private $color;
    private $kilometros;
    private $transimision;
    private $combustible;
    private $no_puertas;
    private $precio_contado;
    private $precio_credito;
    private $opc_credito;
    private $observaciones;
    private $estatus;
    private $tipo_carro;
    private $no_motor;
    private $numero_serie_vehicular;
    private $no_factura;
    private $fecha_factura;
    private $empresa_factura;
    private $domicilio_empresa;
    private $tarjeton;
    private $folio_tarjeton;
    private $ultima_tenencia;
    private $tarjeta_circulacion;
    private $folio_tarje_circul;
    private $verificaciones_coche;
    private $carroceria;
    private $pintura;
    private $llantas;



    /********* AGREGACION  **********/

    private  $lsDetalles;
    private  $lsArchivos;



    /**
     * @return mixed
     */
    public function getTipoCarro()
    {
        return $this->tipo_carro;
    }

    /**
     * @param mixed $tipo_carro
     */
    public function setTipoCarro($tipo_carro): void
    {
        $this->tipo_carro = $tipo_carro;
    }

    /**
     * @return mixed
     */
    public function getNoMotor()
    {
        return $this->no_motor;
    }

    /**
     * @param mixed $no_motor
     */
    public function setNoMotor($no_motor): void
    {
        $this->no_motor = $no_motor;
    }

    /**
     * @return mixed
     */
    public function getNumeroSerieVehicular()
    {
        return $this->numero_serie_vehicular;
    }

    /**
     * @param mixed $numero_serie_vehicular
     */
    public function setNumeroSerieVehicular($numero_serie_vehicular): void
    {
        $this->numero_serie_vehicular = $numero_serie_vehicular;
    }

    /**
     * @return mixed
     */
    public function getNoFactura()
    {
        return $this->no_factura;
    }

    /**
     * @param mixed $no_factura
     */
    public function setNoFactura($no_factura): void
    {
        $this->no_factura = $no_factura;
    }

    /**
     * @return mixed
     */
    public function getFechaFactura()
    {
        return $this->fecha_factura;
    }

    /**
     * @param mixed $fecha_factura
     */
    public function setFechaFactura($fecha_factura): void
    {
        $this->fecha_factura = $fecha_factura;
    }

    /**
     * @return mixed
     */
    public function getEmpresaFactura()
    {
        return $this->empresa_factura;
    }

    /**
     * @param mixed $empresa_factura
     */
    public function setEmpresaFactura($empresa_factura): void
    {
        $this->empresa_factura = $empresa_factura;
    }

    /**
     * @return mixed
     */
    public function getDomicilioEmpresa()
    {
        return $this->domicilio_empresa;
    }

    /**
     * @param mixed $domicilio_empresa
     */
    public function setDomicilioEmpresa($domicilio_empresa): void
    {
        $this->domicilio_empresa = $domicilio_empresa;
    }

    /**
     * @return mixed
     */
    public function getTarjeton()
    {
        return $this->tarjeton;
    }

    /**
     * @param mixed $tarjeton
     */
    public function setTarjeton($tarjeton): void
    {
        $this->tarjeton = $tarjeton;
    }

    /**
     * @return mixed
     */
    public function getFolioTarjeton()
    {
        return $this->folio_tarjeton;
    }

    /**
     * @param mixed $folio_tarjeton
     */
    public function setFolioTarjeton($folio_tarjeton): void
    {
        $this->folio_tarjeton = $folio_tarjeton;
    }

    /**
     * @return mixed
     */
    public function getUltimaTenencia()
    {
        return $this->ultima_tenencia;
    }

    /**
     * @param mixed $ultima_tenencia
     */
    public function setUltimaTenencia($ultima_tenencia): void
    {
        $this->ultima_tenencia = $ultima_tenencia;
    }

    /**
     * @return mixed
     */
    public function getTarjetaCirculacion()
    {
        return $this->tarjeta_circulacion;
    }

    /**
     * @param mixed $tarjeta_circulacion
     */
    public function setTarjetaCirculacion($tarjeta_circulacion): void
    {
        $this->tarjeta_circulacion = $tarjeta_circulacion;
    }

    /**
     * @return mixed
     */
    public function getFolioTarjeCircul()
    {
        return $this->folio_tarje_circul;
    }

    /**
     * @param mixed $folio_tarje_circul
     */
    public function setFolioTarjeCircul($folio_tarje_circul): void
    {
        $this->folio_tarje_circul = $folio_tarje_circul;
    }

    /**
     * @return mixed
     */
    public function getVerificacionesCoche()
    {
        return $this->verificaciones_coche;
    }

    /**
     * @param mixed $verificaciones_coche
     */
    public function setVerificacionesCoche($verificaciones_coche): void
    {
        $this->verificaciones_coche = $verificaciones_coche;
    }

    /**
     * @return mixed
     */
    public function getCarroceria()
    {
        return $this->carroceria;
    }

    /**
     * @param mixed $carroceria
     */
    public function setCarroceria($carroceria): void
    {
        $this->carroceria = $carroceria;
    }

    /**
     * @return mixed
     */
    public function getPintura()
    {
        return $this->pintura;
    }

    /**
     * @param mixed $pintura
     */
    public function setPintura($pintura): void
    {
        $this->pintura = $pintura;
    }

    /**
     * @return mixed
     */
    public function getLlantas()
    {
        return $this->llantas;
    }

    /**
     * @param mixed $llantas
     */
    public function setLlantas($llantas): void
    {
        $this->llantas = $llantas;
    }

    /**
     * @return mixed
     */
    public function getNiv()
    {
        return $this->niv;
    }

    /**
     * @param mixed $niv
     */
    public function setNiv($niv): void
    {
        $this->niv = $niv;
    }

    /**
     * @return mixed
     */
    public function getLsArchivos()
    {
        return $this->queryConsultaArchivosCoche($this->getNoVehiculo());
    }

    /**
     * @param mixed $lsArchivos
     */
    public function setLsArchivos($lsArchivos): void
    {
        $this->lsArchivos = $lsArchivos;
    }

    /**
     * @return mixed
     */
    public function getLsDetalles()
    {
        return $this->queryconsultaDetallesCoche($this->getNoVehiculo());
    }

    /**
     * @param mixed $lsDetalles
     */
    public function setLsDetalles($lsDetalles): void
    {
        $this->lsDetalles = $lsDetalles;
    }

    /**
     * @return mixed
     */
    public function getNoVehiculo()
    {
        return $this->no_vehiculo;
    }

    /**
     * @param mixed $no_vehiculo
     */
    public function setNoVehiculo($no_vehiculo)
    {
        $this->no_vehiculo = $no_vehiculo;
    }

    /**
     * @return mixed
     */
    public function getIdModeloFk()
    {
        return $this->id_modelo_fk;
    }

    /**
     * @param mixed $id_modelo_fk
     */
    public function setIdModeloFk($id_modelo_fk)
    {
        $this->id_modelo_fk = $id_modelo_fk;
    }

    /**
     * @return mixed
     */
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    /**
     * @param mixed $fecha_registro
     */
    public function setFechaRegistro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }

    /**
     * @return mixed
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * @param mixed $anio
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    /**
     * @return mixed
     */
    public function getEntidadPlaca()
    {
        return $this->entidad_placa;
    }

    /**
     * @param mixed $entidad_placa
     */
    public function setEntidadPlaca($entidad_placa)
    {
        $this->entidad_placa = $entidad_placa;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getKilometros()
    {
        return $this->kilometros;
    }

    /**
     * @param mixed $kilometros
     */
    public function setKilometros($kilometros)
    {
        $this->kilometros = $kilometros;
    }

    /**
     * @return mixed
     */
    public function getTransimision()
    {
        return $this->transimision;
    }

    /**
     * @param mixed $transimision
     */
    public function setTransimision($transimision)
    {
        $this->transimision = $transimision;
    }

    /**
     * @return mixed
     */
    public function getCombustible()
    {
        return $this->combustible;
    }

    /**
     * @param mixed $combustible
     */
    public function setCombustible($combustible)
    {
        $this->combustible = $combustible;
    }

    /**
     * @return mixed
     */
    public function getNoPuertas()
    {
        return $this->no_puertas;
    }

    /**
     * @param mixed $no_puertas
     */
    public function setNoPuertas($no_puertas)
    {
        $this->no_puertas = $no_puertas;
    }

    /**
     * @return mixed
     */
    public function getPrecioContado()
    {
        return $this->precio_contado;
    }

    /**
     * @param mixed $precio_contado
     */
    public function setPrecioContado($precio_contado)
    {
        $this->precio_contado = $precio_contado;
    }

    /**
     * @return mixed
     */
    public function getPrecioCredito()
    {
        return $this->precio_credito;
    }

    /**
     * @param mixed $precio_credito
     */
    public function setPrecioCredito($precio_credito)
    {
        $this->precio_credito = $precio_credito;
    }

    /**
     * @return mixed
     */
    public function getOpcCredito()
    {
        return $this->opc_credito;
    }

    /**
     * @param mixed $opc_credito
     */
    public function setOpcCredito($opc_credito)
    {
        $this->opc_credito = $opc_credito;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    public function queryconsultaCoches($no_vehiculo,$filter,$archivados)
    {
        $filter= $filter>=-1 && $filter<=1 ? "AND co.estatus=".$filter : "";
        $archivados= $archivados? " ":" AND co.no_vehiculo>0 ";
        $concat=$no_vehiculo>0 ? " AND co.no_vehiculo = ".$no_vehiculo: "";
        $query = "select co.no_vehiculo,co.id_modelo_fk, co.tipo_carro, co.NIV , co.no_motor, co.numero_serie_vehicular ,co.no_factura ,co.fecha_factura ,co.empresa_factura,
                co.domicilio_empresa, co.fecha_registro, co.anio ,co.placa ,co.tarjeton ,co.folio_tarjeton ,co.ultima_tenencia,co.tarjeta_circulacion ,co.folio_tarje_circul,
                co.entidad_placa ,co.color ,co.kilometros, co.transimision ,co.combustible, co.no_puertas ,co.verificaciones_coche ,co.carroceria ,co.pintura ,co.llantas, 
                co.precio_contado ,co.precio_credito , co.opc_credito , co.observaciones ,co.estatus, mo.id_modelo, mo.id_marca_fk, mo.nombre AS modelo_coche, mar.id_marca, 
                mar.nombre AS marca_coche  from coche co, modelo mo, marca mar 
                WHERE co.id_modelo_fk = mo.id_modelo 
                 ".$archivados." ".$filter."
                AND mar.id_marca = mo.id_marca_fk ".$concat." ORDER BY co.estatus ASC ";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    public function queryaddCoche()
    {
        $query = "INSERT INTO `coche`(`no_vehiculo`, `id_modelo_fk`, `tipo_carro`, `NIV`, `no_motor`, `numero_serie_vehicular`, `no_factura`, `fecha_factura`, `empresa_factura`, `domicilio_empresa`,
                    `fecha_registro`, `anio`, `placa`, `tarjeton`, `folio_tarjeton`, `ultima_tenencia`, `tarjeta_circulacion`, `folio_tarje_circul`, `entidad_placa`, `color`, `kilometros`,
                    `transimision`, `combustible`, `no_puertas`, `verificaciones_coche`, `carroceria`, `pintura`, `llantas`, `precio_contado`, `precio_credito`, `opc_credito`, `observaciones`,
                    `estatus`) VALUES ('".$this->getNoVehiculo()."','".$this->getIdModeloFk()."','".$this->getTipoCarro()."','".$this->getNiv()."','".$this->getNoMotor()."','".$this->getNumeroSerieVehicular()."',
                    '".$this->getNoFactura()."','".$this->getFechaFactura()."','".$this->getEmpresaFactura()."','".$this->getDomicilioEmpresa()."','".$this->getFechaRegistro()."','".$this->getAnio()."',
                    '".$this->getPlaca()."',
                    '".$this->getTarjeton()."',
                    '".$this->getFolioTarjeton()."',
                    '".$this->getUltimaTenencia()."',
                    '".$this->getTarjetaCirculacion()."',
                    '".$this->getFolioTarjeCircul()."',
                    '".$this->getEntidadPlaca()."','".$this->getColor()."','".$this->getKilometros()."','".$this->getTransimision()."','".$this->getCombustible()."','".$this->getNoPuertas()."','".$this->getVerificacionesCoche()."',
                    '".$this->getCarroceria()."','".$this->getPintura()."','".$this->getLlantas()."','".$this->getPrecioContado()."','".$this->getPrecioCredito()."','".$this->getOpcCredito()."',
                    '".$this->getObservaciones()."','".$this->getEstatus()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    public function queryupdateCoche()
    {
        $query="UPDATE `coche` SET `id_modelo_fk`='".$this->getIdModeloFk()."',`tipo_carro`='".$this->getTipoCarro()."',`NIV`='".$this->getNiv()."',`no_motor`='".$this->getNoMotor()."',
        `numero_serie_vehicular`='".$this->getNumeroSerieVehicular()."',`no_factura`='".$this->getNoFactura()."',`fecha_factura`='".$this->getFechaFactura()."',`empresa_factura`='".$this->getEmpresaFactura()."',
        `domicilio_empresa`='".$this->getDomicilioEmpresa()."',`fecha_registro`='".$this->getFechaRegistro()."', `anio`='".$this->getAnio()."',`placa`='".$this->getPlaca()."',
        `tarjeton`='".$this->getTarjeton()."',`folio_tarjeton`='".$this->getFolioTarjeton()."',`ultima_tenencia`='".$this->getUltimaTenencia()."',`tarjeta_circulacion`='".$this->getTarjetaCirculacion()."',
        `folio_tarje_circul`='".$this->getFolioTarjeCircul()."',`entidad_placa`='".$this->getEntidadPlaca()."',`color`='".$this->getColor()."',`kilometros`='".$this->getKilometros()."',
        `transimision`='".$this->getTransimision()."',`combustible`='".$this->getCombustible()."',`no_puertas`='".$this->getNoPuertas()."',`verificaciones_coche`='".$this->getVerificacionesCoche()."',
        `carroceria`='".$this->getCarroceria()."',`pintura`='".$this->getPintura()."',`llantas`='".$this->getLlantas()."',`precio_contado`='".$this->getPrecioContado()."',`precio_credito`='".$this->getPrecioCredito()."',
        `opc_credito`='".$this->getOpcCredito()."',`observaciones`='".$this->getObservaciones()."' WHERE `no_vehiculo`= ".$this->getNoVehiculo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function queryupdateEstatusCoche($no_vehiculo, $estatus)
    {
        $query = "UPDATE `coche` SET `estatus` = '".$estatus."' 
                WHERE `coche`.`no_vehiculo` = ".$no_vehiculo;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function querydeleteCoche($no_vehiculo)
    {
        $query = "UPDATE autostorres.coche 
                SET no_vehiculo= no_vehiculo * (-1) 
                WHERE no_vehiculo = ".$no_vehiculo;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function queryconsultaDetallesCoche($no_vehiculo)
    {
       include_once "../model/USO_DETALLE.php";
       $obj_listDV= new USO_DETALLE();
        return $obj_listDV->queryDetallesVehiculo($no_vehiculo);
    }

    public function queryConsultaArchivosCoche($no_vehiculo)
    {
        include_once "../model/FILE_VEHICULO.php";
        $obj_listAC= new FILE_VEHICULO();
        return $obj_listAC->queryArchivosVehiculo($no_vehiculo);
    }

    function queryConsultaDocumentosCoche($no_vehiculo)
    {
        include_once "../model/FILE_VEHICULO.php";
        $objDocsCoche = new FILE_VEHICULO();
        return $objDocsCoche->queryConsultaDocumentosCoche($no_vehiculo);
    }

    function queryMontoVehiculosVendidos()
    {
        $query = "select sum(co.total) as total_vendido from coche c, contrato co 
                where c.no_vehiculo = co.no_vehiculo_fk and c.estatus = 1 
                and co.tipo_contrato = 0 and co.estatus = 1";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function queryNoVehiculosVendidos()
    {
        $query = "select count(c.no_vehiculo) as no_vehiculos from coche c, contrato co 
                where c.no_vehiculo = co.no_vehiculo_fk and c.estatus = 1 
                and co.tipo_contrato = 0 and co.estatus = 1";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function queryNoCochesEnVenta()
    {
        $query = "select count(c.no_vehiculo) as no_vehiculos_venta
                from coche c 
                where c.estatus = 0 
                and c.no_vehiculo not in (select co.no_vehiculo_fk from contrato co, coche c where co.tipo_contrato=0)";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function queryConsultaIdCochexPalaca(){
        $query = "SELECT `no_vehiculo` FROM `coche` WHERE `placa`= '".$this->getPlaca()."'";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}