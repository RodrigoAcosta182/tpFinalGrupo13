<?php

class ArrastreModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarArrastre(){

        return $this->database->consulta("select * from arrastre");
    }

    public function getArrastreById($idArrastre)
    {
        return $this->database->consulta("SELECT * FROM arrastre WHERE Id = '$idArrastre'");
    }

    public function getArrastreSiExistePatente($patente)
    {
        return $this->database->consulta("SELECT * FROM arrastre WHERE Patente ='$patente'");
    }

    public function registrarArrastre($carga, $patente, $chasis)
    {
        return $this->database->ejecutar("INSERT INTO arrastre (Descripcion,Patente,NroChasis)
                                            VALUES ('$carga','$patente','$chasis')");
    }

    public function editArrastre($idArrastre,$carga, $patente, $chasis)
    {
        echo $idArrastre;
        echo $carga;
        echo $patente;
        echo $chasis;

        $this->database->ejecutar("UPDATE arrastre SET Descripcion = '$carga', Patente = '$patente', NroChasis = '$chasis'  WHERE Id = '$idArrastre'");
    }




}