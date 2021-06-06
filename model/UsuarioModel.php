<?php

class UsuarioModel
{
    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function getUsuarioByEmailPassword($email,$password){
        return $this->database->consulta("select * from usuario where Email = '$email' and Password = '$password'");
    }
}