<?php
include "./model/CONEXION.php";
class ABONOS extends CONEXION
{
    private $folio;
    private $id_pago_fk;
    private $monto;
    private $fecha_registro;
    private $notas;

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
    public function setFolio($folio): void
    {
        $this->folio = $folio;
    }

    /**
     * @return mixed
     */
    public function getIdPagoFk()
    {
        return $this->id_pago_fk;
    }

    /**
     * @param mixed $id_pago_fk
     */
    public function setIdPagoFk($id_pago_fk): void
    {
        $this->id_pago_fk = $id_pago_fk;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto): void
    {
        $this->monto = $monto;
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
    public function setFechaRegistro($fecha_registro): void
    {
        $this->fecha_registro = $fecha_registro;
    }

    /**
     * @return mixed
     */
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * @param mixed $notas
     */
    public function setNotas($notas): void
    {
        $this->notas = $notas;
    }

    function addAbono()
    {
        $query = "INSERT INTO `abonos` 
                (`folio`, `id_pago_fk`, `monto`, `fecha_registro`, `notas`) 
                VALUES (NULL, '".$this->getIdPagoFk()."', '".$this->getMonto."', '"
                .$this->getFechaRegistro()."', '".$this->getNotas()."')";
        echo $query;
    }
}