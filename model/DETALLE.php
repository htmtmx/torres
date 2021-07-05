<?php


class DETALLE
{
    private $id_detalle;
    private $nombre;
    private $categoria;
    private $visible;
    private $oblogatorio;
    private $estatus;

    /**
     * @return mixed
     */
    public function getIdDetalle()
    {
        return $this->id_detalle;
    }

    /**
     * @param mixed $id_detalle
     */
    public function setIdDetalle($id_detalle)
    {
        $this->id_detalle = $id_detalle;
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
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @param mixed $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return mixed
     */
    public function getOblogatorio()
    {
        return $this->oblogatorio;
    }

    /**
     * @param mixed $oblogatorio
     */
    public function setOblogatorio($oblogatorio)
    {
        $this->oblogatorio = $oblogatorio;
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