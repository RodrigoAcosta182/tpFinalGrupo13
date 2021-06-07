<?php

class CamionModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarCamiones(){

        return $this->database->consulta("select marca.Descripcion as Marca, modelo.Descripcion as Modelo, vehiculo.Patente as Patente, vehiculo.NroChasis as Chasis, vehiculo.NroMotor as Motor, vehiculo.AñoFabricacion as aFab, vehiculo.kilometraje as Km, tipovehiculo.Descripcion as tipoV
                                              from vehiculo
                                              inner join modelo on vehiculo.pModelo = modelo.Id
                                              inner join marca on vehiculo.pMarca = marca.Id
                                              inner join tipovehiculo on vehiculo.pTipoVehiculo = tipovehiculo.id");
    }

}