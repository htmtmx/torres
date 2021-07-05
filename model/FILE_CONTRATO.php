<?php


class FILE_CONTRATO
{
    private $id_file_c;
    private $id_tipo_archivo_fk;
    private $no_contrato_fk;
    private $nombre;
    private $path;
    private $ext;
    private $nivel_acceso;
    private $estatus;

    /**
     * @return mixed
     */
    public function getIdFileC()
    {
        return $this->id_file_c;
    }

    /**
     * @param mixed $id_file_c
     */
    public function setIdFileC($id_file_c)
    {
        $this->id_file_c = $id_file_c;
    }

    /**
     * @return mixed
     */
    public function getIdTipoArchivoFk()
    {
        return $this->id_tipo_archivo_fk;
    }

    /**
     * @param mixed $id_tipo_archivo_fk
     */
    public function setIdTipoArchivoFk($id_tipo_archivo_fk)
    {
        $this->id_tipo_archivo_fk = $id_tipo_archivo_fk;
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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @param mixed $ext
     */
    public function setExt($ext)
    {
        $this->ext = $ext;
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


}