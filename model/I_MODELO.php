<?php
interface I_MODELO
{
    function consultaModelos ($id_marca);

    function addModelo ($id_marca,$nombre);
    function updateModelo ();
}