<?php
include_once "CONEXION.php";
include_once "I_CONTRATO.php";

class CONTRATO extends CONEXION implements I_CONTRATO
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

    public function consultaDetallesContrato($no_contrato)
    {
        $concat = "";
        if ($no_contrato!= 0) {
            $concat = " AND `no_contrato` = ".$no_contrato;
        }
        $query = "SELECT con.no_contrato, concat_ws(' ',e.apaterno, e.amaterno, e.nombre) as empleado, e.telefono as emp_tel, e.celular as emp_cel,
		e.sexo as emp_sex, e.fecha_registro as emp_fe_re, e.correo_user as emp_email, e.puesto as emp_puesto, 
		e.nivel_acceso as emp_lv_access, e.estatus as emp_status,
		concat_ws(' ',cli.apaterno, cli.amaterno, cli.nombre) as cliente, cli.telefono as cli_tel, cli.celular as cli_cel,
		cli.correo as cli_email, cli.subscripcion as cli_suscripcion, cli.empresa as cli_empresa, cli.rfc as cli_rfc, 
		cli.fecha_registro as cli_fe_re, cli.medio_identificación as cli_med_ide, 
		cli.folio as cli_folio, cli.tipo_cliente as cli_tipo, cli.estatus as cli_status,
		concat_ws(' ',ma.nombre, mo.nombre, v.anio) as vehiculo, v.color, v.kilometros, v.placa, v.fecha_registro as veh_fe_re, 
		v.entidad_placa,  v.transimision, v.combustible, v.no_puertas, v.precio_contado, v.precio_credito,
		v.opc_credito, v.observaciones, v.estatus as veh_status,
		con.hora_fecha_creacion as cont_date_creacion, con.tipo_contrato, con.plazo, con.fecha_primer_pago, 
		con.enganche, con.saldo, con.forma_pago, con.subtotal, con.iva, con.total, con.estatus as cont_status,
		con.no_empleado_fk, con.no_cliente_fk, con.no_vehiculo_fk,v.id_modelo_fk,mo.id_marca_fk 
        FROM contrato con, empleado e, cliente cli, coche v, marca ma, modelo mo 
        where con.no_empleado_fk = e.no_empleado AND con.no_cliente_fk = cli.no_cliente 
        AND con.no_vehiculo_fk = v.no_vehiculo AND ma.id_marca = mo.id_marca_fk AND v.id_modelo_fk = mo.id_modelo ".$concat;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function consultaContrato($no_contrato)
    {
        $query = "SELECT con.no_contrato,con.plazo,con.fecha_primer_pago, con.enganche, con.saldo,
		con.subtotal, con.iva, con.total,con.no_vehiculo_fk, con.no_empleado_fk, con.no_cliente_fk, 
		con.hora_fecha_creacion as cont_date_creacion,  
		 con.forma_pago,  con.tipo_contrato, 
		case 
			when con.tipo_contrato = 0 then 'Venta de Vehiculo'
			when con.tipo_contrato = 1 then 'Adquisición de Vehiculo'
			else 'Tipo de contrato desconocido'
			end as nombre_tipo_de_contrato,con.estatus as cont_status
        FROM contrato con 
        where con.no_contrato = ".$no_contrato;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function consultaAllContratos()
    {
        $query = "select c.no_contrato , concat_ws(' ', ma.nombre, m.nombre, co.anio, co.color, concat('Placa: ',co.placa)) as vehiculo, convert(c.hora_fecha_creacion,date) as fecha_venta
                from contrato c , coche co , modelo m , marca ma 
                where co.no_vehiculo = c.no_vehiculo_fk 
                and co.id_modelo_fk = m.id_modelo 
                and m.id_marca_fk = ma.id_marca 
                and c.tipo_contrato = 0 and co.estatus = 1 order by c.no_contrato, c.hora_fecha_creacion";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
/*********************
 * Preguntar si se utiliza
**********************/
    public function consultaPagosAbonosDeContrato($no_contrato)
    {
        $query = "";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    public function queryaddContrato()
    {
        $query = "INSERT INTO `contrato` (`no_contrato`, `no_empleado_fk`, `no_cliente_fk`, 
        `no_vehiculo_fk`, `hora_fecha_creacion`, `tipo_contrato`, `plazo`, `fecha_primer_pago`, 
        `enganche`, `saldo`, `forma_pago`, `subtotal`, `iva`, `total`, `estatus`) 
        VALUES ('".$this->getNoContrato()."', '".$this->getNoEmpleadoFk()."', '"
            .$this->getNoClienteFk()."', '".$this->getNoVehiculoFk()."', '".$this->getHoraFechaCreacion()."', '"
            .$this->getTipoContrato()."', '".$this->getPlazo()."', '".$this->getFechaPrimerPago()."', '"
            .$this->getEnganche()."', '".$this->getSaldo()."', '".$this->getFormaPago()."', '"
            .$this->getSubtotal()."', '".$this->getIva()."', '".$this->getTotal()."', '".$this->getEstatus()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function queryupdateEstatusContrato($no_contrato, $estatus)
    {
        $query = "UPDATE `contrato` 
                SET `estatus` = '".$estatus."' 
                WHERE `contrato`.`no_contrato` = ".$no_contrato;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function querydeleteContrato($no_contrato)
    {
        $query = "UPDATE `contrato` 
                    SET `no_contrato` = no_contrato * (-1)  
                    WHERE `contrato`.`no_contrato` = ".$no_contrato;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    public function queryconsultaContratosPorCoche($no_vehiculo)
    {
        $query = "SELECT con.no_contrato, concat_ws(' ',cli.apaterno, cli.amaterno, cli.nombre) as cliente , 
		concat_ws(' ',e.apaterno, e.amaterno, e.nombre) as vendido_comprado_por , 
		concat_ws(' ',ma.nombre, mo.nombre, v.anio, v.color) as vehiculo, 
		con.forma_pago , con.subtotal, con.iva, con.total , con.enganche , con.saldo ,  
		con.tipo_contrato, con.estatus as cont_status,con.hora_fecha_creacion,
		con.no_empleado_fk, con.no_cliente_fk, con.no_vehiculo_fk,v.id_modelo_fk,mo.id_marca_fk, 
		case 
			when con.tipo_contrato = 0 then 'Venta de Vehiculo'
			when con.tipo_contrato = 1 then 'Adquisición de Vehiculo'
			else 'Tipo de contrato desconocido'
			end as nombre_tipo_de_contrato
        FROM contrato con, empleado e, cliente cli, coche v, marca ma, modelo mo 
        where con.no_empleado_fk = e.no_empleado AND con.no_cliente_fk = cli.no_cliente 
        AND con.no_vehiculo_fk = v.no_vehiculo AND ma.id_marca = mo.id_marca_fk 
        AND v.id_modelo_fk = mo.id_modelo AND no_vehiculo_fk= ".$no_vehiculo." order by con.tipo_contrato";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}