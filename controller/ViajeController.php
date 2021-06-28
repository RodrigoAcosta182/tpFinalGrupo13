<?php
class ViajeController
{

    private $usuarioModel;
    private $viajeModel;
    private $render;

    public function __construct(\Render $render, \ViajeModel $viajeModel, \UsuarioModel $usuarioModel)
    {
        $this->render = $render;
        $this->viajeModel = $viajeModel;
        $this->usuarioModel = $usuarioModel;
    }

    public function execute()
    {
        $data = array();

        if (isset($_SESSION["mensajeModificar"]) && $_SESSION["mensajeModificar"] == 1) {
            $data["mensajeModificar"] = "El viaje fue editado exitosamente";
            unset($_SESSION["mensajeModificar"]);
        }
        if (isset($_SESSION["logueado"])) {
        $data["viaje"] = $this->viajeModel->listarViajes();
        echo $this->render->renderizar("view/viaje.mustache", $data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function altaViaje()
    {
        $data["viaje"] = $this->viajeModel->listarChoferes();
        echo $this->render->renderizar("view/altaViaje.mustache", $data);
    }

    public function registrarViaje(){
        if (isset($_SESSION["logueado"])) {
            if(isset($_POST['usuario']) && isset($_POST['sucOrig']) && isset($_POST['sucDest']) && isset($_POST['cliente']) &&
                isset($_POST['vehiculo']) && isset($_POST['arrastre']) && isset($_POST['fechaOrig']) && isset($_POST['fechaEst']) &&
                isset($_POST['kmEst']) && isset($_POST['combEst']) && isset($_POST['precio'])) {
                $usuario = $_POST['usuario'];
                $sucOrig = $_POST['sucOrig'];
                $sucDest = $_POST['sucDest'];
                $cliente = $_POST['cliente'];
                $vehiculo = $_POST['vehiculo'];
                $arrastre = $_POST['arrastre'];
                $fechaOrig = $_POST['fechaOrig'];
                $fechaEst = $_POST['fechaEst'];
                $kmEst = $_POST['kmEst'];
                $combEst = $_POST['combEst'];
                $precio = $_POST['precio'];

                   $this->viajeModel->registrarViaje($usuario, $sucOrig, $sucDest, $cliente, $vehiculo, $arrastre, $fechaOrig, $fechaEst, $kmEst, $combEst, $precio);
                   $_SESSION['registroCorrecto'] = 1;
                   header("Location: /tpFinalGrupo13/Viaje");

            } else {
                $_SESSION['registroIncorrecto'] = 1;
                header("Location: /tpFinalGrupo13/Viaje");

            }
        }
    }

    public function modificarCliente()
    {
        echo $this->render->renderizar("view/modificarViaje.mustache");
    }
}