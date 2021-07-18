<?php
include_once "CONEXION.php";
include_once "I_PAGO.php";

class PAGO extends CONEXION implements I_PAGO
{
    private $folio;
    private $no_contrato_fk;
    private $no_transaccion;
    private $concepto;
    private $tipo;
    private $total;
    private $fecha_hora_creacion;
    private $no_pago;
    private $detalles;
    private $estatus_pago;

    /**
     * @return mixed
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * @param mixed $folio
     */
    public function setFolio($folio)
    {
        $this->folio = $folio;
    }

    /**
     * @return mixed
     */
    public function getNoContratoFk()
    {
        return $this->no_contrato_fk;
    }

    /**
     * @param mixed $no_contrato_fk
     */
    public function setNoContratoFk($no_contrato_fk)
    {
        $this->no_contrato_fk = $no_contrato_fk;
    }

    /**
     * @return mixed
     */
    public function getNoTransaccion()
    {
        return $this->no_transaccion;
    }

    /**
     * @param mixed $no_transaccion
     */
    public function setNoTransaccion($no_transaccion)
    {
        $this->no_transaccion = $no_transaccion;
    }

    /**
     * @return mixed
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * @param mixed $concepto
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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
    public function getFechaHoraCreacion()
    {
        return $this->fecha_hora_creacion;
    }

    /**
     * @param mixed $fecha_hora_creacion
     */
    public function setFechaHoraCreacion($fecha_hora_creacion)
    {
        $this->fecha_hora_creacion = $fecha_hora_creacion;
    }

    /**
     * @return mixed
     */
    public function getNoPago()
    {
        return $this->no_pago;
    }

    /**
     * @param mixed $no_pago
     */
    public function setNoPago($no_pago)
    {
        $this->no_pago = $no_pago;
    }

    /**
     * @return mixed
     */
    public function getDetalles()
    {
        return $this->detalles;
    }

    /**
     * @param mixed $detalles
     */
    public function setDetalles($detalles)
    {
        $this->detalles = $detalles;
    }

    /**
     * @return mixed
     */
    public function getEstatusPago()
    {
        return $this->estatus_pago;
    }

    /**
     * @param mixed $estatus_pago
     */
    public function setEstatusPago($estatus_pago)
    {
        $this->estatus_pago = $estatus_pago;
    }

    public function consultaPago($folio)
    {
        $query = "SELECT `folio`, `no_contrato_fk`, `no_transaccion`, `concepto`, `tipo`, `total`, 
                `fecha_hora_creacion`, `no_pago`, `detalles`, `estatus_pago` 
                FROM `pago` 
                WHERE `no_contrato_fk`= ".$folio;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    public function addPAgo()
    {
        $query = "INSERT INTO `pago` (`folio`, `no_contrato_fk`, `no_transaccion`, `concepto`, 
                `tipo`, `total`, `fecha_hora_creacion`, `no_pago`, `detalles`, `estatus_pago`) 
                VALUES (NULL, '".$this->getNoContratoFk()."', '".$this->getNoTransaccion()."', '"
                .$this->getConcepto()."', '".$this->getTipo()."', '".$this->getTotal()."', '"
                .date('Y-m-d H:i:s')."', '".$this->getNoPago()."', '".$this->getDetalles()."', '1')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function updatePago()
    {
        $query = "UPDATE `pago` 
                SET `no_contrato_fk` = '".$this->getNoContratoFk()."', 
                `no_transaccion` = '".$this->getNoTransaccion()."', 
                `concepto` = '".$this->getConcepto()."', `tipo` = '".$this->getTipo()."', 
                `total` = '".$this->getTotal()."', `no_pago` = '".$this->getNoPago()."', 
                `detalles` = '".$this->getDetalles()."' WHERE `pago`.`folio` = ".$this->getFolio();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function updateEstatusPago($folio)
    {
        $query = "";
    }
}