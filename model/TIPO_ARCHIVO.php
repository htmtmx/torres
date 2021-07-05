<?php


class TIPO_ARCHIVO
{
    private $id_tipo_archivo;
    private $nombre;
    private $tipo_uso;
    private $prioridad;
    private $estatus;

    /**
     * @return mixed
     */
    public function getIdTipoArchivo()
    {
        return $this->id_tipo_archivo;
    }

    /**
     * @param mixed $id_tipo_archivo
     */
    public function setIdTipoArchivo($id_tipo_archivo)
    {
        $this->id_tipo_archivo = $id_tipo_archivo;
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
    public function getTipoUso()
    {
        return $this->tipo_uso;
    }

    /**
     * @param mixed $tipo_uso
     */
    public function setTipoUso($tipo_uso)
    {
        $this->tipo_uso = $tipo_uso;
    }

    /**
     * @return mixed
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * @param mixed $prioridad
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;
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