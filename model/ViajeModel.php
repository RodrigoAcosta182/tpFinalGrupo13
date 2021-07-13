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

    public function listarVehiculosActivos(){
        return $this->database->consulta("select *
                                              from vehiculo where MantenimientoActivo = 0");
    }

    public function listarArrastres(){
        return $this->database->consulta("select *
                                              from arrastre");
    }

    public function registrarViaje($usuario,$sucuOrig,$sucuDest,$cliente,$vehiculo,$arrastre,$fechaOrig,$fechaEst,$kmEst,$combEst,$otrosG,$precio,$precioCombustible){
        return $this->database->ejecutar("INSERT INTO viajes (pUsuario, pCliente ,SucursalOrigen,SucursalDestino ,pVehiculo ,pArrastre ,FechaOrigen ,FechaEstimada ,KmEstimado ,CombustibleEst, Precio, OtrosGastos ,Finalizado,PrecioCombustibleEstimado) 
                                            VALUES ('$usuario', '$cliente', '$sucuOrig', '$sucuDest' , '$vehiculo', '$arrastre', '$fechaOrig', '$fechaEst', '$kmEst', '$combEst', '$precio', '$otrosG' , 0,'$precioCombustible')");
    }

    public function getViajeById($idViaje)
    {
        return $this->database->consulta("select * from vviajes where viajeId = '$idViaje'");
    }

    public function editViaje($idViaje, $usuario, $sucuOrig, $sucuDest, $cliente, $vehiculo, $arrastre,
                              $fechaOrig, $fechaEst, $kmEst, $combEst, $precio, $otrosG,$activo,$precioCombustible)
    {
        return $this->database->ejecutar("UPDATE viajes SET
                                                    pUsuario = '$usuario',
                                                    pCliente = '$cliente',
                                                    SucursalOrigen = '$sucuOrig',
                                                    SucursalDestino = '$sucuDest', 
                                                    pArrastre = '$arrastre',
                                                    pVehiculo  = '$vehiculo', 
                                                    Precio = '$precio', 
                                                    FechaOrigen = '$fechaOrig', 
                                                    FechaEstimada = '$fechaEst', 
                                                    KmEstimado = '$kmEst',
                                                    CombustibleEst = '$combEst',
                                                    OtrosGastos = '$otrosG',
                                                    Finalizado = '$activo',
                                                    PrecioCombustibleEstimado = '$precioCombustible'
                                                    WHERE Id = '$idViaje'");
    }

    public function finalizarViaje($idViaje)
    {
        return $this->database->ejecutar("UPDATE viajes SET Finalizado = 1 WHERE Id = '$idViaje'");
    }

    public function listarViajesByChofer($idChofer)
    {
        return $this->database->consulta("select * from vviajes where usuarioId = '$idChofer'");
    }


}