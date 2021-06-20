<?php

class ViajeModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarViajes(){

        return $this->database->ejecutar("select viajes.id as IdViaje, sucursalorigen.Direccion as DireccionOrigen, provincia.Descripcion as ProvinciaOrigen, viajes.FechaOrigen as FechOrig, viajes.FechaEstimada as FechEst, empleado.Nombre as EmpNomb, empleado.Apellido as EmpAp
                                              from viajes
                                              inner join sucursalorigen on viajes.pSucursalOrigen = sucursalorigen.id
                                              inner join provincia on sucursalorigen.id = provincia.Id
                                              inner join empleado on viajes.pEmpleado = empleado.Id");
    }

}