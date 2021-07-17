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
        return $this->database->consulta("SELECT * FROM cliente WHERE Dni ='$dni'");
    }

    public function registrarCliente($nombre, $apellido, $dni,$domicilio){
        return $this->database->ejecutar("INSERT INTO cliente(Nombre, Apellido, Dni,Domicilio, Activo) 
                                            VALUES ('$nombre', '$apellido', '$dni','$domicilio', 1)");
    }

    public function editCliente($id,$nombre,$apellido,$dni,$domicilio,$activo)
    {
        return $this->database->ejecutar("UPDATE cliente SET Nombre = '$nombre', Apellido = '$apellido', Dni = '$dni', Domicilio = '$domicilio', Activo = '$activo' WHERE Id = '$id'");
    }

    public function listarClientesActivos()
    {
        return $this->database->consulta("select * from cliente where Activo = 1");
    }
}