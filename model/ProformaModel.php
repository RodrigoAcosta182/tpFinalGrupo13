<?php

class ProformaModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function getProformaById($idViaje)
    {
        return $this->database->consulta("select * from vviajes where viajeId = '$idViaje'");
    }


}