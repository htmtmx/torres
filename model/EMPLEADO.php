<?php
include_once "CONEXION.php";
include_once "I_EMPLEADO.php";

class EMPLEADO extends CONEXION implements I_EMPLEADO
{
    private $no_empleado;
    private $id_empresa_fk;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $telefono;
    private $celular;
    private $sexo;
    private $fecha_registro;
    private $correo_user;
    private $pw;
    private $puesto;
    private $nivel_acceso;
    private $estatus;
    private $system_state;

    /**
     * @return mixed
     */
    public function getNoEmpleado()
    {
        return $this->no_empleado;
    }

    /**
     * @param mixed $no_empleado
     */
    public function setNoEmpleado($no_empleado)
    {
        $this->no_empleado = $no_empleado;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaFk()
    {
        return $this->id_empresa_fk;
    }

    /**
     * @param mixed $id_empresa_fk
     */
    public function setIdEmpresaFk($id_empresa_fk): void
    {
        $this->id_empresa_fk = $id_empresa_fk;
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
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
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
    public function getCorreoUser()
    {
        return $this->correo_user;
    }

    /**
     * @param mixed $correo_user
     */
    public function setCorreoUser($correo_user)
    {
        $this->correo_user = $correo_user;
    }

    /**
     * @return mixed
     */
    public function getPw()
    {
        return $this->pw;
    }

    /**
     * @param mixed $pw
     */
    public function setPw($pw)
    {
        $this->pw = $pw;
    }

    /**
     * @return mixed
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * @param mixed $puesto
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;
    }

    /**
     * @return mixed
     */
    public function getNivelAcceso()
    {
        return $this->nivel_acceso;
    }

    /**
     * @param mixed $nivel_acceso
     */
    public function setNivelAcceso($nivel_acceso)
    {
        $this->nivel_acceso = $nivel_acceso;
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

    public function consultaEmpleado($no_empleado)
    {
        $concat="";
        if ($no_empleado!=0) {
            $concat = " AND `no_empleado`= ".$no_empleado;
        }
        $query = "SELECT empl.`no_empleado`, empl.`id_empresa_fk`, empl.`nombre`, 
                empl.`apaterno`, empl.`amaterno`, empl.`telefono`, empl.`celular`, 
                empl.`sexo`, empl.`fecha_registro`, empl.`correo_user`, 
                empl.`pw`, empl.`puesto`, empl.`nivel_acceso`, empl.`estatus`, 
                empl.`system_state`,  empr.`id_empresa`, empr.`nombre` AS nombre_empresa
                FROM `empleado` empl, `empresa` empr
                WHERE empr.`id_empresa` = empl.`id_empresa_fk` ".$concat;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    public function consultaEmpleados($id_empresa_fk)
    {
        $query = "SELECT empl.`no_empleado`, empl.`id_empresa_fk`, empl.`nombre`, 
                empl.`apaterno`, empl.`amaterno`, empl.`telefono`, empl.`celular`, 
                empl.`sexo`, empl.`fecha_registro`, empl.`correo_user`, empl.`pw`, 
                empl.`puesto`, empl.`nivel_acceso`, empl.`estatus`, 
                empl.`system_state`, empr.`id_empresa`, empr.`nombre` AS nombre_empresa  
                FROM `empleado` empl, `empresa` empr  
                WHERE empr.`id_empresa`= empl.`id_empresa_fk` AND empl.`id_empresa_fk` = ".$id_empresa_fk;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    public function addEmpleado()
    {
        $query = "INSERT INTO `empleado` (
                `no_empleado`, `id_empresa_fk`, `nombre`, `apaterno`, `amaterno`, `telefono`, 
                `celular`, `sexo`, `fecha_registro`, `correo_user`, `pw`, `puesto`, 
                `nivel_acceso`, `estatus`, `system_state`) 
                VALUES ('".$this->getNoEmpleado()."', '".$this->getIdEmpresaFk()."', '"
                .$this->getNombre()."', '".$this->getApaterno()."', '"
                .$this->getAmaterno()."', '".$this->getTelefono()."', '"
                .$this->getCelular()."', '".$this->getSexo()."', '"
                .date('Y-m-d H:i:s')."', '".$this->getCorreoUser()."', '"
                .$this->getPw()."', '".$this->getPuesto()."', '"
                .$this->getNivelAcceso()."', '1', '1')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function updateEmpleado()
    {
        $query = "UPDATE `empleado` 
        SET `id_empresa_fk` = '".$this->getIdEmpresaFk()."', `nombre` = '".$this->getNombre()."', 
        `apaterno` = '".$this->getApaterno()."', `amaterno` = '".$this->getAmaterno()."', 
        `telefono` = '".$this->getTelefono()."', `celular` = '".$this->getCelular()."', 
        `sexo` = '".$this->getSexo()."', `correo_user` = '".$this->getCorreoUser()."', 
        `puesto` = '".$this->getPuesto()."', `nivel_acceso` = '".$this->getNivelAcceso()."' 
        WHERE `empleado`.`no_empleado` = ".$this->getNoEmpleado();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function updatePw($no_empleado, $pwd)
    {
        $query = "UPDATE `empleado` 
        SET `pw` = '".md5($pwd)."' 
        WHERE `empleado`.`no_empleado` = ".$no_empleado ;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function updateStatusEmpleado($no_empleado, $estatus)
    {
        $query = "UPDATE `empleado` 
        SET `estatus` = '".$estatus."', `system_state` = '".$estatus."'
        WHERE `empleado`.`no_empleado` = ".$no_empleado;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function deleteEmpleado($no_empleado)
    {
        $query = "DELETE FROM `empleado` 
        WHERE `empleado`.`no_empleado` = ".$no_empleado;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}