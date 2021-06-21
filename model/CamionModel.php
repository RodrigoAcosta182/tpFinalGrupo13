<?php

class CamionModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarCamiones(){

        return $this->database->consulta("select 
                                                v.Id as Id_camion,
                                                ma.Id as Id_marca,
                                                a.Id as Id_arrastre,
                                                ma.Descripcion as Marca, 
                                                mo.Descripcion as Modelo, 
                                                v.Patente as Patente, 
                                                v.NroChasis as Chasis, 
                                                v.NroMotor as Motor, 
                                                v.AñoFabricacion as aFab,
                                                v.kilometraje as Km, 
                                                case when ta.Descripcion is null then 'Sin arrastre' else  ta.Descripcion end as tipoV,
                                                v.Activo as Activo
                                              from vehiculo v
                                              inner join modelo mo on v.pModelo = mo.Id
                                              inner join marca ma on v.pMarca = ma.Id
                                              left join arrastre a on a.Id = v.pArrastre
                                              inner join tipoarrastre ta on a.pTipoArrastre = ta.Id");
    }

    public function registrarCamion($nombre, $apellido, $email, $password, $active){
        return $this->database->ejecutar("INSERT INTO vehiculo(Nombre, Apellido, Email, Password, Active) 
                                            VALUES ('$nombre', '$apellido', '$email', '$password', '$active')");
    }

    public function getCamionSiExistePatente($patente){
        return $this->database->consulta("SELECT * FROM vehiculo WHERE Patente ='$patente'");
    }

    public function getCamionById($id){
        return $this->database->consulta("select 
                                                v.Id as Id_camion,
                                                ma.Id as Id_marca,
                                                a.Id as Id_arrastre,
                                                mo.Id as Id_modelo,
                                                ma.Descripcion as Marca, 
                                                mo.Descripcion as Modelo, 
                                                ta.Descripcion as Arrastre,
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
                                              inner join tipoarrastre ta on a.pTipoArrastre = ta.Id
                                              where v.Id = '$id'");
    }

    public function editCamion($id,$patente,$chasis,$motor,$aniofab,$km,$modelo,$arrastre,$mantenimiento,$marca)
    {
        return $this->database->ejecutar("UPDATE vehiculo 
                                              SET pModelo = '$modelo',
                                              Patente = '$patente',
                                              NroChasis = '$chasis',
                                              NroMotor = '$motor',
                                              AñoFabricacion = '$aniofab',
                                              pArrastre = '$arrastre',
                                              kilometraje = '$km',
                                              pMantenimiento = '$mantenimiento',
                                              pMarca = '$marca'
                                              WHERE Id ='$id'");
    }

    public function getModelo(){
        return $this->database->consulta("SELECT * FROM modelo");
    }

    public function getArrastre()
    {
        return $this->database->consulta("SELECT * FROM arrastre");
    }

    public function getMantenimiento(){
        return $this->database->consulta("SELECT * FROM mantenimiento");
    }

    public function getMarca()
    {
        return $this->database->consulta("SELECT * FROM marca");
    }
    public function getTipoArrastre()
    {
        return $this->database->consulta("SELECT * FROM tipoarrastre");
    }
}