<?php
include_once "CONEXION.php";
include_once "I_EMPRESA.php";

class EMPRESA extends CONEXION implements I_EMPRESA
{
    private $rfc;
    private $nombre;
    private $calle;
    private $no_ext;
    private $no_int;
    private $colonia;
    private $cp;
    private $de_mun;
    private $estado;
    private $telefono;
    private $correo;
    private $sitio_web;
    private $path_logo;
    private $version;
    private $licencia;

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
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    /**
     * @return mixed
     */
    public function getNoExt()
    {
        return $this->no_ext;
    }

    /**
     * @param mixed $no_ext
     */
    public function setNoExt($no_ext)
    {
        $this->no_ext = $no_ext;
    }

    /**
     * @return mixed
     */
    public function getNoInt()
    {
        return $this->no_int;
    }

    /**
     * @param mixed $no_int
     */
    public function setNoInt($no_int)
    {
        $this->no_int = $no_int;
    }

    /**
     * @return mixed
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * @param mixed $colonia
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getDeMun()
    {
        return $this->de_mun;
    }

    /**
     * @param mixed $de_mun
     */
    public function setDeMun($de_mun)
    {
        $this->de_mun = $de_mun;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
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
    public function getSitioWeb()
    {
        return $this->sitio_web;
    }

    /**
     * @param mixed $sitio_web
     */
    public function setSitioWeb($sitio_web)
    {
        $this->sitio_web = $sitio_web;
    }

    /**
     * @return mixed
     */
    public function getPathLogo()
    {
        return $this->path_logo;
    }

    /**
     * @param mixed $path_logo
     */
    public function setPathLogo($path_logo)
    {
        $this->path_logo = $path_logo;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getLicencia()
    {
        return $this->licencia;
    }

    /**
     * @param mixed $licencia
     */
    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;
    }


}