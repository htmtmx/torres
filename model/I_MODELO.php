<?php
interface I_MODELO
{
    function consultaModelos ($id_marca);
    function consultaModelo ($id_modelo);
    function addModelo ($id_marca,$nombre);
    function updateModelo ();
    function deleteModelo($id_modelo);
}