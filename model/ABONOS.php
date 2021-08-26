<?php
include_once "CONEXION.php";
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

    function queryaddAbono()
    {
        $query = "INSERT INTO `abonos` 
                (`folio`, `id_pago_fk`, `monto`, `fecha_registro`, `notas`) 
                VALUES (NULL, '".$this->getIdPagoFk()."', '".$this->getMonto()."', '"
                .$this->getFechaRegistro()."', '".$this->getNotas()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function queryconsultaAbonos($id_pago_fk)
    {
        $query = "select a.folio, a.id_pago_fk , a.monto , a.fecha_registro , a.notas 
                from abonos a where a.id_pago_fk = ".$id_pago_fk;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function querySumaAbonosPago($id_pago)
    {
        $query = "select sum(a.monto) as suma_abonos 
                    from abonos a 
                    where a.id_pago_fk = ".$id_pago;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function querySumaAbonosHoy()
    {
        $query = "select sum(a.monto) as total_abonos_hoy
                from abonos a 
                where a.fecha_registro > DATE_ADD(UTC_DATE(), INTERVAL -2 DAY) 
                and a.fecha_registro <UTC_DATE()";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}