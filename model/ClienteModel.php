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

    public function getClienteById($id){
        return $this->database->consulta("select * from cliente where Id = '$id'");
    }

    public function getClienteSiExisteDni($dni){
        return $this->database->consulta("SELECT * FROM usuario WHERE Dni ='$dni'");
    }

    public function registrarCliente($nombre, $apellido, $dni){
        return $this->database->ejecutar("INSERT INTO cliente(Nombre, Apellido, Dni, Activo) 
                                            VALUES ('$nombre', '$apellido', '$dni', 1)");
    }

    public function editCliente($id,$nombre,$apellido,$dni,$active)
    {
        return $this->database->ejecutar("UPDATE cliente 
                                              SET Nombre = '$nombre', 
                                                  Apellido = '$apellido', 
                                                  Dni = '$dni', 
                                                  Activo = '$active'
                                              WHERE Id ='$id'");
    }

}