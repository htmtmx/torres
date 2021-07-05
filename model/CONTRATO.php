<?php


class CONTRATO
{
    private $no_contrato;
    private $no_empleado_fk;
    private $no_cliente_fk;
    private $no_vehiculo_fk;
    private $hora_fecha_creacion;
    private $tipo_contrato;
    private $plazo;
    private $fecha_primer_pago;
    private $enganche;
    private $saldo;
    private $forma_pago;
    private $subtotal;
    private $iva;
    private $total;
    private $estatus;

    /**
     * @return mixed
     */
    public function getNoContrato()
    {
        return $this->no_contrato;
    }

    /**
     * @param mixed $no_contrato
     */
    public function setNoContrato($no_contrato)
    {
        $this->no_contrato = $no_contrato;
    }

    /**
     * @return mixed
     */
    public function getNoEmpleadoFk()
    {
        return $this->no_empleado_fk;
    }

    /**
     * @param mixed $no_empleado_fk
     */
    public function setNoEmpleadoFk($no_empleado_fk)
    {
        $this->no_empleado_fk = $no_empleado_fk;
    }

    /**
     * @return mixed
     */
    public function getNoClienteFk()
    {
        return $this->no_cliente_fk;
    }

    /**
     * @param mixed $no_cliente_fk
     */
    public function setNoClienteFk($no_cliente_fk)
    {
        $this->no_cliente_fk = $no_cliente_fk;
    }

    /**
     * @return mixed
     */
    public function getNoVehiculoFk()
    {
        return $this->no_vehiculo_fk;
    }

    /**
     * @param mixed $no_vehiculo_fk
     */
    public function setNoVehiculoFk($no_vehiculo_fk)
    {
        $this->no_vehiculo_fk = $no_vehiculo_fk;
    }

    /**
     * @return mixed
     */
    public function getHoraFechaCreacion()
    {
        return $this->hora_fecha_creacion;
    }

    /**
     * @param mixed $hora_fecha_creacion
     */
    public function setHoraFechaCreacion($hora_fecha_creacion)
    {
        $this->hora_fecha_creacion = $hora_fecha_creacion;
    }

    /**
     * @return mixed
     */
    public function getTipoContrato()
    {
        return $this->tipo_contrato;
    }

    /**
     * @param mixed $tipo_contrato
     */
    public function setTipoContrato($tipo_contrato)
    {
        $this->tipo_contrato = $tipo_contrato;
    }

    /**
     * @return mixed
     */
    public function getPlazo()
    {
        return $this->plazo;
    }

    /**
     * @param mixed $plazo
     */
    public function setPlazo($plazo)
    {
        $this->plazo = $plazo;
    }

    /**
     * @return mixed
     */
    public function getFechaPrimerPago()
    {
        return $this->fecha_primer_pago;
    }

    /**
     * @param mixed $fecha_primer_pago
     */
    public function setFechaPrimerPago($fecha_primer_pago)
    {
        $this->fecha_primer_pago = $fecha_primer_pago;
    }

    /**
     * @return mixed
     */
    public function getEnganche()
    {
        return $this->enganche;
    }

    /**
     * @param mixed $enganche
     */
    public function setEnganche($enganche)
    {
        $this->enganche = $enganche;
    }

    /**
     * @return mixed
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * @param mixed $saldo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    /**
     * @return mixed
     */
    public function getFormaPago()
    {
        return $this->forma_pago;
    }

    /**
     * @param mixed $forma_pago
     */
    public function setFormaPago($forma_pago)
    {
        $this->forma_pago = $forma_pago;
    }

    /**
     * @return mixed
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param mixed $subtotal
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return mixed
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * @param mixed $iva
     */
    public function setIva($iva)
    {
        $this->iva = $iva;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
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