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


}