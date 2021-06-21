<?php
class ClienteController
{

    private $clienteModel;
    private $render;

    public function __construct(\Render $render, \ClienteModel $clienteModel)
    {
        $this->render = $render;
        $this->clienteModel = $clienteModel;
    }

    public function execute()
    {
        $data = array();

        if (isset($_SESSION["mensajeModificar"]) && $_SESSION["mensajeModificar"] == 1) {
            $data["mensajeModificar"] = "El cliente fue editado exitosamente";
            unset($_SESSION["mensajeModificar"]);
        }

        if (isset($_SESSION["logueado"])) {
        $clientes["clientes"] = $this->clienteModel->listarClientes();
        echo $this->render->renderizar("view/cliente.mustache", $clientes);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }


    public function modificarCliente()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
        $idCliente = $_POST['idCliente'];
        $cliente["clientes"]= $this->clienteModel->getClienteById($idCliente);
        echo $this->render->renderizar("view/modificarCliente.mustache",$cliente);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
    public function procesoModificarCliente(){
        if (isset($_SESSION["logueado"])) {
            $id = $_GET['id'];
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $dni = $_GET['dni'];

            if(isset($_GET['activo']) && $_GET['activo'] === "on" ){
                $active = 1;
            }else{
                $active = 0;
            }

            $this->clienteModel->editCliente($id,$nombre,$apellido,$dni,$active);
            $_SESSION['mensajeModificar'] = 1;
            header("Location: /tpfinalGrupo13/Cliente");

        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function altaCliente()
    {
        echo $this->render->renderizar("view/altaCliente.mustache");
    }

    public function registrarCliente(){
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $active = 1;

            if(!$this->clienteModel->getClienteSiExisteDni($dni)){
                $this->clienteModel->registrarCliente($nombre,$apellido,$dni);
                $_SESSION['registroCorrecto'] = 1;
                header("Location: /tpFinalGrupo13");
            }else{
                $_SESSION['emailExistente'] = 1;
                header("Location: /tpFinalGrupo13");
            }
        }else{
            $_SESSION['registroIncorrecto'] = 1;
            header("Location: /tpFinalGrupo13");
        }
    }

}