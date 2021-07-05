<?php


class EMPLEADO
{
    private $no_empleado;
    private $rfc_fk;
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
    public function getRfcFk()
    {
        return $this->rfc_fk;
    }

    /**
     * @param mixed $rfc_fk
     */
    public function setRfcFk($rfc_fk)
    {
        $this->rfc_fk = $rfc_fk;
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


}