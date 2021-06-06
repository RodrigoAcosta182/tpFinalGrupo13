<?php

class LoginModel
{
    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function login($usuario,$password){
        return $this->database->consulta("select * from usuario where Nombre = '$usuario' and Contrasenia = '$password'");
    }

}