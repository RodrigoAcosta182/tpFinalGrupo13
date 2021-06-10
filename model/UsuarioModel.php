<?php

class UsuarioModel
{
    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarUsuario(){

        return $this->database->consulta("select * from usuario where Active = 1");
    }

    public function getUsuarioByEmailPassword($email,$password){
        return $this->database->consulta("select * from usuario where Email = '$email' and Password = '$password'");
    }

    public function registrarUsuario($nombre, $apellido, $email, $password, $active){
        return $this->database->ejecutar("INSERT INTO usuario(Nombre, Apellido, Email, Password, Active) 
                                            VALUES ('$nombre', '$apellido', '$email', '$password', '$active')");
    }

    public function getUsuarioSiExisteMail($email){
        return $this->database->consulta("SELECT * FROM usuario WHERE Email ='$email'");
    }

    public function getUsuarioById($id){
        return $this->database->consulta("select * from usuario where Id = '$id'");
    }
    public function getPasswordById($id)
    {
        return $this->database->consulta("select Password from usuario where Id = '$id'");
    }

    public function eliminarUsuarioById($id)
    {
        return $this->database->ejecutar("UPDATE usuario SET Active = 0 WHERE Id ='$id'");
    }

    public function editUsuarioById($id,$nombre,$apellido,$email,$contrasenia,$active)
    {
        return $this->database->ejecutar("UPDATE usuario 
                                              SET Nombre = '$nombre', Apellido = '$apellido', Email = '$email', Password = '$contrasenia', Active = '$active'  
                                              WHERE Id ='$id'");
    }


}