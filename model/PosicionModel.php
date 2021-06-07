<?php

class PosicionModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarPosicion(){

        return $this->database->consulta("select ubicaciondiaria.codigo as IdPos, vehiculo.Patente as Patente, vehiculo.NroChasis as Chasis, ubicaciondiaria.Ubicacion as Ubic
                                              from ubicaciondiaria
                                              inner join vehiculo on ubicaciondiaria.pEmpleado = vehiculo.id");
    }

}