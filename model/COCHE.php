<?php


class COCHE
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


}