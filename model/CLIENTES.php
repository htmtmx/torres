<?php
include_once "CONEXION.php";
include_once "I_CLIENTES.php";

class CLIENTES extends CONEXION implements I_CLIENTES
{
    private $no_cliente;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $telefono;
    private $celular;
    private $correo;
    private $subscripcion;
    private $empresa;
    private $rfc;
    private $fecha_registro;
    private $medio_identificación;
    private $folio;
    private $tipo_cliente;
    private $estatus;
    private $system_state;

    /**
     * @return mixed
     */
    public function getNoCliente()
    {
        return $this->no_cliente;
    }

    /**
     * @param mixed $no_cliente
     */
    public function setNoCliente($no_cliente)
    {
        $this->no_cliente = $no_cliente;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApaterno()
    {
        return $this->apaterno;
    }

    /**
     * @param mixed $apaterno
     */
    public function setApaterno($apaterno)
    {
        $this->apaterno = $apaterno;
    }

    /**
     * @return mixed
     */
    public function getAmaterno()
    {
        return $this->amaterno;
    }

    /**
     * @param mixed $amaterno
     */
    public function setAmaterno($amaterno)
    {
        $this->amaterno = $amaterno;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getSubscripcion()
    {
        return $this->subscripcion;
    }

    /**
     * @param mixed $subscripcion
     */
    public function setSubscripcion($subscripcion)
    {
        $this->subscripcion = $subscripcion;
    }

    /**
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param mixed $empresa
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }

    /**
     * @return mixed
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * @param mixed $rfc
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;
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
    public function getMedioIdentificación()
    {
        return $this->medio_identificación;
    }

    /**
     * @param mixed $medio_identificación
     */
    public function setMedioIdentificación($medio_identificación)
    {
        $this->medio_identificación = $medio_identificación;
    }

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
    public function getTipoCliente()
    {
        return $this->tipo_cliente;
    }

    /**
     * @param mixed $tipo_cliente
     */
    public function setTipoCliente($tipo_cliente)
    {
        $this->tipo_cliente = $tipo_cliente;
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

    /**
     * @return mixed
     */
    public function getSystemState()
    {
        return $this->system_state;
    }

    /**
     * @param mixed $system_state
     */
    public function setSystemState($system_state)
    {
        $this->system_state = $system_state;
    }

    public function queryconsultaCliente($no_cliente)
    {
        $concat=$no_cliente>0 ? " AND `cliente`.`no_cliente` = ".$no_cliente : " ";
        $query = "SELECT `no_cliente`, `nombre`, `apaterno`, `amaterno`, `telefono`,
            `celular`, `correo`, `subscripcion`, `empresa`, `rfc`, `fecha_registro`,
            `medio_identificación`, `folio`, `tipo_cliente`, `estatus`
            FROM `cliente` WHERE system_state > 0 ".$concat." ORDER BY `apaterno`,`amaterno`";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;

    }

    public function queryaddCliente()
    {
        $query = "INSERT INTO `cliente` (
                `no_cliente`, `nombre`, `apaterno`, `amaterno`, `telefono`, `celular`, `correo`, 
                `subscripcion`, `empresa`, `rfc`, `fecha_registro`, `medio_identificación`, 
                `folio`, `tipo_cliente`, `estatus`, `system_state`) VALUES ('".$this->getNoCliente()."', '"
                .$this->getNombre()."', '".$this->getApaterno()."', '".$this->getAmaterno()."', '"
                .$this->getTelefono()."', '".$this->getCelular()."', '".$this->getCorreo()."', '"
                .$this->getSubscripcion()."', '".$this->getEmpresa()."', '".$this->getRfc()."', '"
                .date('Y-m-d H:i:s')."', '".$this->getMedioIdentificación()."', '"
                .$this->getFolio()."', '".$this->getTipoCliente()."', '1', '1')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function queryupdateCliente()
    {
        $query = "UPDATE `cliente` 
                SET `nombre` = '".$this->getNombre()."', `apaterno` = '".$this->getApaterno()."', 
                `amaterno` = '".$this->getAmaterno()."', `telefono` = '".$this->getTelefono()."', 
                `celular` = '".$this->getCelular()."', `correo` = '".$this->getCorreo()."', 
                `subscripcion` = '".$this->getSubscripcion()."', `empresa` = '".$this->getEmpresa()."', 
                `rfc` = '".$this->getRfc()."', `medio_identificación` = '".$this->getMedioIdentificación()."', 
                `folio` = '".$this->getFolio()."', `tipo_cliente` = '".$this->getTipoCliente()."', 
                `estatus` = '".$this->getEstatus()."' 
                WHERE `cliente`.`no_cliente` = ".$this->getNoCliente();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }


    public function querydeleteCliente($no_cliente)
    {
        $query = "UPDATE `cliente` 
                SET `system_state` = `system_state`*(-1) 
                WHERE `cliente`.`no_cliente` = ".$no_cliente;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    public function querydireccionCliente($no_cliente)
    {
        include_once "../model/DIRECCIONES.php";
        $tempDireccion = new DIRECCIONES();
        $direccionCliente = $tempDireccion->consultaDireccion($no_cliente);
        return $direccionCliente;
    }


}