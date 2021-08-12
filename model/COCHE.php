<?php

include_once "CONEXION.php";
include_once "I_COCHE.php";

class COCHE extends CONEXION implements I_COCHE
{
    private $no_vehiculo;
    private $id_modelo_fk;
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

    /********* AGREGACION  **********/

    private  $lsDetalles;
    private  $lsArchivos;

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

    public function queryconsultaCoches($no_vehiculo)
    {
        $concat=$no_vehiculo>0 ? " AND co.no_vehiculo = ".$no_vehiculo: "";
        $query = "SELECT co.no_vehiculo, co.id_modelo_fk, co.fecha_registro, co.anio,
                co.placa, co.entidad_placa, co.color, co.kilometros, co.transimision,
                co.combustible, co.no_puertas, co.precio_contado, co.precio_credito,
                co.opc_credito,co.observaciones,co.estatus, mo.id_modelo, mo.id_marca_fk, 
                mo.nombre AS modelo_coche, mar.id_marca, mar.nombre AS marca_coche 
                FROM coche co, modelo mo, marca mar 
                WHERE co.id_modelo_fk = mo.id_modelo 
                AND co.no_vehiculo > 0
                AND mar.id_marca = mo.id_marca_fk ".$concat." ORDER BY co.estatus DESC ";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    public function queryaddCoche()
    {
        $query = "INSERT INTO `coche` 
                (`no_vehiculo`, `id_modelo_fk`, `fecha_registro`, `anio`, `placa`, 
                `entidad_placa`, `color`, `kilometros`, `transimision`, `combustible`, 
                `no_puertas`, `precio_contado`, `precio_credito`, `opc_credito`, 
                `observaciones`, `estatus`) 
                VALUES ('".$this->getNoVehiculo()."', '".$this->getIdModeloFk()."', '"
                .date('Y-m-d H:i:s')."', '".$this->getAnio()."', '".$this->getPlaca()."', '"
                .$this->getEntidadPlaca()."', '".$this->getColor()."', '".$this->getKilometros()."', '"
                .$this->getTransimision()."', '".$this->getCombustible()."', '".$this->getNoPuertas()."', '"
                .$this->getPrecioContado()."', '".$this->getPrecioCredito()."', '1', '"
                .$this->getObservaciones()."', '1')";
        echo $query;
        /*$this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;*/
        return true;
    }
    public function queryupdateCoche()
    {
        $query="UPDATE `coche` 
                SET `id_modelo_fk` = '".$this->getIdModeloFk()."', 
                `anio` = '".$this->getAnio()."', `placa` = '".$this->getPlaca()."', `entidad_placa` = '".$this->getEntidadPlaca()."', 
                `color` = '".$this->getColor()."', `kilometros` = '".$this->getKilometros()."', 
                `transimision` = '".$this->getTransimision()."', `combustible` = '".$this->getCombustible()."', 
                `no_puertas` = '".$this->getNoPuertas()."', `precio_contado` = '".$this->getPrecioContado()."', 
                `precio_credito` = '".$this->getPrecioCredito()."', `opc_credito` = '".$this->getOpcCredito()."', 
                `observaciones` = '".$this->getObservaciones()."', `estatus` = '".$this->getEstatus()."' 
                WHERE `coche`.`no_vehiculo` = ".$this->getNoVehiculo();
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

}