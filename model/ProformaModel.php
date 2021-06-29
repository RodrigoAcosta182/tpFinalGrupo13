<?php

class ProformaModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function getProformaById($idViaje)
    {
        return $this->database->consulta("select viajeId as ViajeId,
                                                    fechaOrigen as FechaOrigen,
                                                    fechaEstimada as FechaEstimada,
                                                    precioViaje as Precio,
                                                    KmEstimado as Km,
                                                    CombustibleEst as Combustible,
                                                    OtrosGastos as Og,
                                                    usuario as Chofer,
                                                    cliente as Cliente,
                                                    patenteVehiculo as Vehiculo,
                                                    patenteArrastre as Arrastre,
                                                    SucursalOrigen as SucOrigen,
                                                    SucursalDestino as SucDestino
                                              from vproforma
                                              where viajeId = '$idViaje'");
    }


}