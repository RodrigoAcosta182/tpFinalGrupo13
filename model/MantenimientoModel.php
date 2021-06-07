<?php

class MantenimientoModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarMantenimiento(){

        return $this->database->consulta("select tiposervice.id as IdTipoServ, service.Id as IdService, mantenimiento.fecha as Fecha, vehiculo.kilometraje as Km, tiposervice.Descripcion as Descripcion, service.ImporteFinal as Importe
                                              from mantenimiento
                                              inner join service on mantenimiento.pService = service.Id
                                              inner join tiposervice on service.Id = tiposervice.id
                                              inner join vehiculo on mantenimiento.pVehiculo = vehiculo.id");
    }

}