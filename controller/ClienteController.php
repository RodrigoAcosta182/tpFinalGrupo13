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
        if (isset($_SESSION["mensajeError"]) && $_SESSION["mensajeError"] == 1) {
            $data["mensajeError"] = "Hubo un problema al editar el Cliente";
            unset($_SESSION["mensajeError"]);
        }


        if (isset($_SESSION["registroCorrecto"]) && $_SESSION["registroCorrecto"] == 1) {
            $data["registroCorrecto"] = "El Cliente se ha registrado correctamente";
            unset($_SESSION["registroCorrecto"]);
        }

        if (isset($_SESSION["dniExistente"]) && $_SESSION["dniExistente"] == 1) {
            $data["dniExistente"] = "El DNI ingresado ya se encuentra registrado";
            unset($_SESSION["dniExistente"]);
        }

        if (isset($_SESSION["registroIncorrecto"]) && $_SESSION["registroIncorrecto"] == 1) {
            $data["registroIncorrecto"] = "El no pudo realizarse, intentelo nuevamente";
            unset($_SESSION["registroIncorrecto"]);
        }

        if (isset($_SESSION["logueado"])) {
            $data["clientes"] = $this->clienteModel->listarClientes();
        echo $this->render->renderizar("view/cliente.mustache", $data);
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
            $domicilio = $_POST['domicilio'];

            if(!$this->clienteModel->getClienteSiExisteDni($dni)){
                $this->clienteModel->registrarCliente($nombre,$apellido,$dni,$domicilio);
                $_SESSION['registroCorrecto'] = 1;
                header("Location: /tpFinalGrupo13/Cliente");
            }else{

                $_SESSION['dniExistente'] = 1;
                header("Location: /tpFinalGrupo13/Cliente");
            }
        }else{
            $_SESSION['registroIncorrecto'] = 1;
            header("Location: /tpFinalGrupo13/Cliente");

        }
    }
    public function modificarCliente()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
        $idCliente = $_POST['idCliente'];
            $data["clientes"]= $this->clienteModel->getClienteById($idCliente);
        echo $this->render->renderizar("view/modificarCliente.mustache",$data);
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
            $domicilio = $_GET['domicilio'];

            if(isset($_GET['activo']) && $_GET['activo'] === "on" ){
                $active = true;
            }else{
                $active = false;
            }
                if(isset($id) && isset($nombre) && isset($apellido) && isset($dni) && isset($domicilio) ){
                $this->clienteModel->editCliente($id,$nombre,$apellido,$dni,$domicilio,$active);
                $_SESSION['mensajeModificar'] = 1;
                header("Location: /tpFinalGrupo13/Cliente");
                }else{
                    $_SESSION['mensajeError'] = 1;
                    header("Location: /tpFinalGrupo13/Cliente");
                }
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
}