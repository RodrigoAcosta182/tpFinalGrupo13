<?php

class ClienteModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarClientes(){

        return $this->database->consulta("select * from cliente");
    }

}