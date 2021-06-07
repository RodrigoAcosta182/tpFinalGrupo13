<?php

class UsuarioModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarUsuario(){

        return $this->database->consulta("select * from usuario");
    }

}