<?php

class ViajeModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarViajes(){

        return $this->database->consulta("select
                                              viajes.Id as IdViaje,
                                              usuario.Id as IdUsuario,
                                              sucursalorigen.Direccion as DireccionOrigen,
                                              sucursaldestino.Descripcion as DireccionDestino,
                                              provincia.Descripcion as Provincia,
                                              viajes.FechaOrigen as FechOrig,
                                              viajes.FechaEstimada as FechEst,
                                              usuario.Nombre as EmpNomb,
                                              usuario.Apellido as EmpAp,
                                              viajes.Finalizado as Estado
                                              from viajes
                                              inner join sucursalorigen on viajes.pSucursalOrigen = sucursalorigen.Id
                                              inner join sucursaldestino on viajes.pSucursalDestino = sucursaldestino.Id
                                              inner join provincia on sucursalorigen.pProvincia = provincia.Id
                                              inner join usuario on viajes.pUsuario = usuario.Id
                                              inner join cliente on viajes.pCliente = cliente.Id
                                              inner join vehiculo on viajes.pVehiculo = vehiculo.Id
                                              inner join arrastre on viajes.pArrastre = arrastre.Id");
    }

    public function listarChoferes(){
        return $this->database->consulta("select *
                                              from usuario
                                              where pTipoUsuario = 1");
    }

    public function registrarViaje($usuario,$sucOrig,$sucDest,$cliente,$vehiculo,$arrastre,$fechaOrig,$fechaEst,$kmEst,$combEst,$precio){
        return $this->database->ejecutar("INSERT INTO viajes (pUsuario ,pSucursalOrigen ,pSucursalDestino , pCliente ,pVehiculo ,pArrastre ,FechaOrigen ,FechaEstimada ,KmEstimado ,CombustibleEst ,Precio ,Finalizado ,pFactura) 
                                            VALUES ('$usuario', '$sucOrig', '$sucDest', '$cliente', '$vehiculo', '$arrastre', '$fechaOrig', '$fechaEst', '$kmEst', '$combEst', '$precio' , 0 , 1)");
    }

}