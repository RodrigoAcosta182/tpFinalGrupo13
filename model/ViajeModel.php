<?php

class ViajeModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarViajes(){

        return $this->database->consulta("select * from vviajes");
    }

    public function listarChoferes(){
        return $this->database->consulta("select *
                                              from usuario
                                              where pTipoUsuario = 1");
    }

    public function listarSucursales(){
        return $this->database->consulta("select sucursales.Id as IdSuc,
                                              sucursales.Direccion as DireccionSuc,
                                              provincia.Descripcion as Provincia
                                              from sucursales
                                              inner join provincia on sucursales.pProvincia = provincia.Id");
    }

    public function listarClientes(){
        return $this->database->consulta("select *
                                              from cliente");
    }

    public function listarVehiculos(){
        return $this->database->consulta("select *
                                              from vehiculo");
    }

    public function listarArrastres(){
        return $this->database->consulta("select *
                                              from arrastre");
    }

    public function registrarViaje($usuario,$sucuOrig,$sucuDest,$cliente,$vehiculo,$arrastre,$fechaOrig,$fechaEst,$kmEst,$combEst,$otrosG,$precio){
        return $this->database->ejecutar("INSERT INTO viajes (pUsuario, pCliente ,pSucursalOrigen,pSucursalDestino ,pVehiculo ,pArrastre ,FechaOrigen ,FechaEstimada ,KmEstimado ,CombustibleEst, Precio, OtrosGastos ,Finalizado) 
                                            VALUES ('$usuario', '$cliente', '$sucuOrig', '$sucuDest' , '$vehiculo', '$arrastre', '$fechaOrig', '$fechaEst', '$kmEst', '$combEst', '$precio', '$otrosG' , 0)");
    }

    public function getViajeById($idViaje)
    {
        return $this->database->consulta("select * from vviajes where viajeId = '$idViaje'");
    }

    public function editViaje($idViaje, $usuario, $sucuOrig, $sucuDest, $cliente, $vehiculo, $arrastre,
                              $fechaOrig, $fechaEst, $kmEst, $combEst, $precio, $otrosG)
    {
        return $this->database->ejecutar("UPDATE viajes SET
                                                    pUsuario = '$usuario',
                                                    pCliente = '$cliente',
                                                    pSucursalOrigen = '$sucuOrig',
                                                    pSucursalDestino = '$sucuDest', 
                                                    pArrastre = '$arrastre',
                                                    pVehiculo  = '$vehiculo', 
                                                    Precio = '$precio', 
                                                    FechaOrigen = '$fechaOrig', 
                                                    FechaEstimada = '$fechaEst', 
                                                    KmEstimado = '$kmEst',
                                                    CombustibleEst = '$combEst',
                                                    OtrosGastos = '$otrosG'
                                                    WHERE Id = '$idViaje'");
    }

}