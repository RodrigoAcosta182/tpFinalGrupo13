<?php

class MantenimientoModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarMantenimiento(){

        return $this->database->consulta("select 
                                                mantenimiento.Id as Id_mantenimiento,
                                                tiposervice.id as IdTipoServ, 
                                                vehiculo.patente as Patente, 
                                                mantenimiento.FechaDesde as FechaDesde,
                                                mantenimiento.FechaHasta as FechaHasta, 
                                                mantenimiento.Descripcion as Descripcion,
                                                vehiculo.kilometraje as Km, 
                                                tiposervice.Descripcion as Tipo, 
                                                mantenimiento.importe as Importe,
                                                mantenimiento.Finalizado as MantenimientoFinalizado,
                                                mantenimiento.pVehiculo as IdVehiculo
                                                 from mantenimiento  
                                                 inner join tiposervice on mantenimiento.pservice = tiposervice.id
                                                 inner join vehiculo on mantenimiento.pVehiculo = vehiculo.id
                                                 where vehiculo.Activo = 1");
    }

    public function getMantenimientoById($id){
        return $this->database->consulta("select 
                                                mantenimiento.Id as Id_mantenimiento,
                                                tiposervice.id as IdTipoServ,
                                                vehiculo.Id as Id_vehiculo,  
                                                vehiculo.patente as Patente, 
                                                mantenimiento.FechaDesde as FechaDesde,
                                                mantenimiento.FechaHasta as FechaHasta, 
                                                mantenimiento.Descripcion as Descripcion,
                                                vehiculo.kilometraje as Km, 
                                                tiposervice.Descripcion as Tipo, 
                                                mantenimiento.importe as Importe
                                                  from mantenimiento  
                                                 inner join tiposervice on mantenimiento.pservice = tiposervice.id
                                                 inner join vehiculo on mantenimiento.pVehiculo = vehiculo.id
                                              where mantenimiento.Id = '$id'");
    }

    public function registrarMantenimiento($service, $vehiculo, $importe,$fdesde,$fhasta,$descripcion)
    {
        return $this->database->ejecutar("INSERT INTO mantenimiento (pVehiculo , Importe, FechaDesde,FechaHasta, pService,Descripcion)
                                            VALUES ('$vehiculo', '$importe', '$fdesde','$fhasta','$service','$descripcion')");
    }

    public function editMantenimiento($id_mantenimiento,$service, $vehiculo, $importe,$fdesde,$fhasta,$descripcion)
    {
        return $this->database->ejecutar("UPDATE mantenimiento SET 
                                                    pService  = '$service',
                                                    pVehiculo  = '$vehiculo', 
                                                    Importe = '$importe', 
                                                    FechaDesde = '$fdesde', 
                                                    FechaHasta = '$fhasta', 
                                                    Descripcion = '$descripcion'
                                                    WHERE Id = '$id_mantenimiento'");
    }

    public function finalizarMantenimiento($idMantenimiento)
    {
        return $this->database->ejecutar("UPDATE mantenimiento SET Finalizado = 1 where Id= '$idMantenimiento' ");
    }


}