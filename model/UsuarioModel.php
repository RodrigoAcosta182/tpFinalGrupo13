<?php

class UsuarioModel
{
    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarUsuario(){

        return $this->database->consulta("select * from usuario");
    }

    public function getUsuarioByEmailPassword($email,$password){
        return $this->database->consulta("select * from usuario where Email = '$email' and Password = '$password'");
    }

    public function registrarUsuario($nombre, $apellido, $email, $password, $active){
        echo $nombre;
        return $this->database->ejecutar("INSERT INTO usuario(Nombre, Apellido, Email, Password, Active) 
                                            VALUES ('$nombre', '$apellido', '$email', '$password', '$active')");
    }

    public function getUsuarioSiExisteMail($email){
        return $this->database->consulta("SELECT * FROM usuario WHERE Email ='$email'");
    }

}