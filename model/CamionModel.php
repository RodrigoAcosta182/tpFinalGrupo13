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
                                                a.Id as Id_arrastre,
                                                ma.Descripcion as Marca, 
                                                mo.Descripcion as Modelo, 
                                                v.Patente as Patente, 
                                                v.NroChasis as Chasis, 
                                                v.NroMotor as Motor, 
                                                v.AñoFabricacion as aFab,
                                                v.kilometraje as Km, 
                                                case when a.Descripcion is null then 'Sin arrastre' else  a.Descripcion end as tipoV,
                                                v.Activo as Activo
                                              from vehiculo v
                                              inner join modelo mo on v.pModelo = mo.Id
                                              inner join marca ma on v.pMarca = ma.Id
                                              left join arrastre a on a.id = v.pArrastre");
    }

    public function getCamionById($id){
        return $this->database->consulta("select 
                                                v.id as Id_camion,
                                                ma.Id as Id_marca,
                                                a.Id as Id_arrastre,
                                                mo.Id as Id_modelo,
                                                ma.Descripcion as Marca, 
                                                mo.Descripcion as Modelo, 
                                                a.Descripcion as Arrastre,
                                                v.Patente as Patente, 
                                                v.NroChasis as Chasis, 
                                                v.NroMotor as Motor, 
                                                v.AñoFabricacion as aFab,
                                                v.kilometraje as Km, 
                                                v.Activo as Activo
                                              from vehiculo v
                                              inner join modelo mo on v.pModelo = mo.Id
                                              inner join marca ma on v.pMarca = ma.Id
                                              left join arrastre a on a.id = v.pArrastre
                                              where v.Id = '$id'");
    }

    public function getCamionSiExistePatente($patente)
    {
        return $this->database->consulta("SELECT * FROM vehiculo WHERE Patente ='$patente'");
    }

    public function registrarCamion($marca, $modelo, $patente, $chasis, $motor, $kilometraje, $fabricacion, $arrastre, $activo)
    {
        return $this->database->ejecutar("INSERT INTO vehiculo (pMarca, pModelo, Patente,NroChasis, NroMotor, kilometraje, AñoFabricacion, pArrastre,Activo)
                                            VALUES ('$marca', '$modelo', '$patente','$chasis','$motor','$kilometraje','$fabricacion','$arrastre','$activo')");
    }

    public function editCamion($idCamion,$marca, $modelo, $patente, $chasis, $motor, $kilometraje, $fabricacion, $arrastre, $activo)
    {
        return $this->database->ejecutar("UPDATE vehiculo SET 
                                                    pMarca = '$marca', 
                                                    pModelo = '$modelo', 
                                                    Patente = '$patente', 
                                                    NroChasis = '$chasis', 
                                                    NroMotor = '$motor',  
                                                    kilometraje='$kilometraje', 
                                                    AñoFabricacion='$fabricacion',
                                                    pArrastre='$arrastre',
                                                    Activo='$activo'
                                                    WHERE Id = '$idCamion'");
    }
}