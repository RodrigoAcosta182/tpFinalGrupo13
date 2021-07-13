<?php

class CamionModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarCamiones(){

        return $this->database->consulta("select 
                                                v.id as Id_camion,
                                                ma.Id as Id_marca,
                                                ma.Descripcion as Marca, 
                                                mo.Descripcion as Modelo, 
                                                v.Patente as Patente, 
                                                v.NroChasis as Chasis, 
                                                v.NroMotor as Motor, 
                                                v.AñoFabricacion as aFab,
                                                v.kilometraje as Km,
                                                v.Activo as Activo,
                                                v.MantenimientoActivo as MantenimientoActivo
                                              from vehiculo v
                                              inner join modelo mo on v.pModelo = mo.Id
                                              inner join marca ma on v.pMarca = ma.Id
                                              ");
    }

    public function getCamionById($id){
        return $this->database->consulta("select 
                                                v.id as Id_camion,
                                                ma.Id as Id_marca,
                                                mo.Id as Id_modelo,
                                                ma.Descripcion as Marca, 
                                                mo.Descripcion as Modelo, 
                                                v.Patente as Patente, 
                                                v.NroChasis as Chasis, 
                                                v.NroMotor as Motor, 
                                                v.AñoFabricacion as aFab,
                                                v.kilometraje as Km, 
                                                v.Activo as Activo
                                              from vehiculo v
                                              inner join modelo mo on v.pModelo = mo.Id
                                              inner join marca ma on v.pMarca = ma.Id
                                              where v.Id = '$id'");
    }

    public function getCamionSiExistePatente($patente)
    {
        return $this->database->consulta("SELECT * FROM vehiculo WHERE Patente ='$patente'");
    }

    public function registrarCamion($marca, $modelo, $patente, $chasis, $motor, $kilometraje, $fabricacion, $activo)
    {
        return $this->database->ejecutar("INSERT INTO vehiculo (pMarca, pModelo, Patente,NroChasis, NroMotor, kilometraje, AñoFabricacion,Activo)
                                            VALUES ('$marca', '$modelo', '$patente','$chasis','$motor','$kilometraje','$fabricacion','$activo')");
    }

    public function editCamion($idCamion,$marca, $modelo, $patente, $chasis, $motor, $kilometraje, $fabricacion, $activo)
    {
        return $this->database->ejecutar("UPDATE vehiculo SET 
                                                    pMarca = '$marca', 
                                                    pModelo = '$modelo', 
                                                    Patente = '$patente', 
                                                    NroChasis = '$chasis', 
                                                    NroMotor = '$motor',  
                                                    kilometraje='$kilometraje', 
                                                    AñoFabricacion='$fabricacion',
                                                    Activo='$activo'
                                                    WHERE Id = '$idCamion'");
    }

    public function camionEnMantenimiento($idVehiculo)
    {
        return $this->database->ejecutar("UPDATE vehiculo SET MantenimientoActivo = 1 WHERE Id = '$idVehiculo'");
    }

    public function camionFinalizarMantenimiento($idVehiculo)
    {
        return $this->database->ejecutar("UPDATE vehiculo SET MantenimientoActivo = 0 WHERE Id = '$idVehiculo'");
    }
}