<?php

class FacturaModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarFactura(){

        return $this->database->consulta("select factura.nroFact as NroFactura, cliente.Nombre as NombreCl, cliente.Apellido as ApellidoCl, cliente.Domicilio as DomicilioCl, cliente.Telefono as Tel, cliente.Dni as Dni, factura.fechaFact as Facturacion
                                              from factura
                                              inner join viajes on factura.pViaje = viajes.Id
                                              inner join cliente on viajes.pCliente = cliente.id");
    }

}