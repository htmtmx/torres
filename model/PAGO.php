<?php
include_once "CONEXION.php";
include_once "I_PAGO.php";

class PAGO extends CONEXION implements I_PAGO
{
    private $id_pago;
    private $no_contrato_fk;
    private $no_transaccion;
    private $concepto;
    private $tipo;//Credito,contado,apartado
    private $total;
    private $fecha_hora_creacion;
    private $no_pago;
    private $detalles;
    private $estatus_pago;
    private  $saldo;

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
    public function setSaldo($saldo): void
    {
        $this->saldo = $saldo;
    }

    /**
     * @return mixed
     */
    public function getIdPago()
    {
        return $this->id_pago;
    }

    /**
     * @param mixed $id_pago
     */
    public function setIdPago($id_pago): void
    {
        $this->id_pago = $id_pago;
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

    public function  queryconsultaPago($no_contrato_fk)
    {
        $filter = $no_contrato_fk>0?" AND p.no_contrato_fk = ".$no_contrato_fk : "";
        $query = "SELECT p.id_pago, p.no_transaccion, p.concepto, p.total, p.saldo, p.fecha_limite_pago as fecha_pago, 
                    c.fecha_primer_pago as pagar_antes_de, p.no_pago, p.estatus_pago, 
		            case
				        when p.estatus_pago = 0 and p.fecha_limite_pago > c.fecha_primer_pago then 'ADEUDO'
				        when p.estatus_pago = 0  and p.fecha_limite_pago < c.fecha_primer_pago then 'PENDIENTE'
				        when p.estatus_pago = 1 and p.fecha_limite_pago < c.fecha_primer_pago then 'PAGADO' 
		                else 'DESCONOCIDO' 
			        end as estatus_del_pago, p.tipo, p.no_contrato_fk, c.no_contrato, p.detalles
                    FROM pago p, contrato c 
                    where p.no_contrato_fk = c.no_contrato

                    and p.no_contrato_fk = ".$no_contrato_fk." order by p.no_pago";

        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    public function queryaddPago()
    {
        $query = "INSERT INTO `pago` (`id_pago`, `no_contrato_fk`, `no_transaccion`, `concepto`, 
                `tipo`, `total`, `saldo` ,`fecha_limite_pago`, `no_pago`, `detalles`, `estatus_pago`) 
                VALUES (".$this->getIdPago().", '".$this->getNoContratoFk()."', '".$this->getNoTransaccion()."', '"
                .$this->getConcepto()."', '".$this->getTipo()."', '".$this->getTotal()."', '".$this->getSaldo()."' , '"
                .$this->getFechaHoraCreacion()."', '".$this->getNoPago()."', '".$this->getDetalles().
                "', '".$this->getEstatusPago()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function queryupdateEstatusPago($id_pago,$estatus_pago)
    {
        $query = "UPDATE `pago` 
                    SET `estatus_pago` = '".$estatus_pago."' 
                    WHERE `pago`.`id_pago` = ".$id_pago;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function queryeliminaPago($folio)
    {
        $query = "UPDATE `pago` 
                    SET folio =folio*(-1) 
                    WHERE `pago`.`folio` = ".$folio;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function consultaAbonos ($id_pago)
    {
        include_once "./ABONOS.php";
        $objAbono = new ABONOS();
        return $objAbono->queryconsultaAbonos($id_pago);
    }

    function queryUpdateSaldo($id_pago,$saldo)
    {
        $query = "UPDATE `pago` 
                SET `saldo` = '".$saldo."' WHERE `pago`.`id_pago` = ".$id_pago;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function queryMontoPagosPendientes()
    {
        $query = "select sum(p.total) as total_pagos 
                from pago p, contrato c 
                where p.no_contrato_fk = c.no_contrato 
                and c.tipo_contrato =0 and p.estatus_pago = 0 and p.saldo != 0";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function queryNoPagosPendientes()
    {
        $query = "select count(p.id_pago) as count_pagos 
                from pago p, contrato c 
                where p.no_contrato_fk = c.no_contrato 
                and c.tipo_contrato = 0 
                and p.estatus_pago = 0 
                and p.saldo != 0";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function queryAllPagosPendintes()
    {
        $query="select c.no_contrato, concat_ws(' ',ma.nombre, mo.nombre, co.anio, co.color) as vehiculo, co.placa, 
		    p.fecha_limite_pago , p.detalles, p.total, p.saldo 
            from contrato c, pago p ,coche co , marca ma , modelo mo 
            where  c.no_contrato = p.no_contrato_fk 
            and c.no_vehiculo_fk = co.no_vehiculo 
            and co.id_modelo_fk = mo.id_modelo 
            and mo.id_marca_fk = ma.id_marca 
            and p.saldo != 0
            and p.estatus_pago = 0 order by c.no_contrato, p.fecha_limite_pago limit 10";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}