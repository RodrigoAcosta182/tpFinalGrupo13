<?php

class UsuarioModel
{
    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarUsuario(){

        return $this->database->consulta("SELECT u.*,t.Descripcion AS Rol FROM usuario u 
                                              INNER JOIN tipousuario t ON u.pTipoUsuario = t.Id ");
    }

    public function listarUsuario2(){

        return $this->database->consulta("SELECT * FROM usuario");
    }

    public function getUsuarioByEmailPassword($email,$password){
        return $this->database->consulta("SELECT * FROM usuario where Email = '$email' and Password = '$password'");
    }

    public function registrarUsuario($nombre, $apellido, $email, $password, $active){
        return $this->database->ejecutar("INSERT INTO usuario(Nombre, Apellido, Email, Password, Active) 
                                            VALUES ('$nombre', '$apellido', '$email', '$password', '$active')");
    }

    public function getUsuarioSiExisteMail($email){
        return $this->database->consulta("SELECT * FROM usuario WHERE Email ='$email'");
    }

    public function getUsuarioById($id){
        return $this->database->consulta("SELECT u.*, 
                                                     t.Id AS Id_tipo, 
                                                     t.Descripcion AS Descrip,
                                                     l.Id As Id_licencia,
                                                     l.Codigo AS Descripcion_licencia
                                              FROM usuario u 
                                              INNER JOIN tipousuario t ON t.Id = u.pTipoUsuario
                                              LEFT JOIN licencia l ON l.Id = u.pLicencia 
                                              where u.Id = '$id'");
    }

    public function eliminarUsuarioById($id)
    {
        return $this->database->ejecutar("UPDATE usuario SET Active = 0 WHERE Id ='$id'");
    }

    public function editUsuario($id,$nombre,$apellido,$email,$contrasenia,$active,$rol,$licencia)
    {
        return $this->database->ejecutar("UPDATE usuario 
                                              SET Nombre = '$nombre', Apellido = '$apellido', Email = '$email', Password = '$contrasenia', Active = '$active',
                                                  pTipoUsuario = '$rol', pLicencia = '$licencia'
                                              WHERE Id ='$id'");
    }

    public function getRoles(){
        return $this->database->consulta("SELECT * FROM tipousuario");
    }

    public function getLicencias()
    {
        return $this->database->consulta("SELECT * FROM licencia");
    }

    public function listarChoferes(){
        return $this->database->consulta("select *
                                              from usuario
                                              where pTipoUsuario = 1");
    }

}