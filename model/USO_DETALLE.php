<?php

include_once "CONEXION.php";
class USO_DETALLE extends  CONEXION
{
    private $no_vehiculo_fk;
    private $id_detalle_fk;
    private $valor;
    private $estatus;

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
    public function getIdDetalleFk()
    {
        return $this->id_detalle_fk;
    }

    /**
     * @param mixed $id_detalle_fk
     */
    public function setIdDetalleFk($id_detalle_fk)
    {
        $this->id_detalle_fk = $id_detalle_fk;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
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

    public function queryDeleteUsoDetalle($id_detalle_fk,$n_coche_fk)
    {
        $query="DELETE FROM `uso_detalle` WHERE `no_vehiculo_fk`=".$n_coche_fk." AND `id_detalle_fk`=".$id_detalle_fk;
        $this->connect();
        $result=$this->executeInstruction($query);
        $this->close();
        return $result;
    }
    public function queryDetallesVehiculo($no_vehiculo){
        $query = "SELECT det.`id_detalle`, det.`nombre`, det.`categoria`, 
                det.`visible`, det.`oblogatorio`, det.`estatus` AS estatus_detalle, 
                uso.`no_vehiculo_fk`, uso.`id_detalle_fk`, uso.`valor`, 
                uso.`estatus` AS estatus_uso, coc.`no_vehiculo` 
                FROM `detalle` det, `uso_detalle` uso, `coche` coc 
                WHERE coc.`no_vehiculo` = ".$no_vehiculo." 
                AND uso.`no_vehiculo_fk`= coc.`no_vehiculo` 
                AND det.`id_detalle` = uso.`id_detalle_fk`";
        $this->connect();
        $result=$this->getData($query);
        $this->close();
        return $result;
    }
}