<?php
class ViajeController
{

    private $viajeModel;
    private $render;

    public function __construct(\Render $render, \ViajeModel $viajeModel)
    {
        $this->render = $render;
        $this->viajeModel = $viajeModel;
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
        $data["sucursal"] = $this->viajeModel->listarSucursales();
        $data["cliente"] = $this->viajeModel->listarClientes();
        $data["vehiculo"] = $this->viajeModel->listarVehiculos();
        $data["arrastre"] = $this->viajeModel->listarArrastres();
        echo $this->render->renderizar("view/altaViaje.mustache", $data);
    }

    public function registrarViaje(){
        if (isset($_SESSION["logueado"])) {
            if(isset($_POST['usuario']) && isset($_POST['sucuOrig']) && isset($_POST['sucuDest']) && isset($_POST['cliente']) && isset($_POST['combEst']) &&
                isset($_POST['vehiculo']) && isset($_POST['arrastre']) && isset($_POST['fechaOrig']) && isset($_POST['fechaEst']) &&
                isset($_POST['kmEst']) && isset($_POST['otrosG']) && isset($_POST['precio'])) {
                $usuario = $_POST['usuario'];
                $sucuOrig = $_POST['sucuOrig'];
                $sucuDest = $_POST['sucuDest'];
                $cliente = $_POST['cliente'];
                $vehiculo = $_POST['vehiculo'];
                $arrastre = $_POST['arrastre'];
                $fechaOrig = $_POST['fechaOrig'];
                $fechaEst = $_POST['fechaEst'];
                $kmEst = $_POST['kmEst'];
                $combEst = $_POST['combEst'];
                $otrosG = $_POST['otrosG'];
                $precio = $_POST['precio'];

                   $this->viajeModel->registrarViaje($usuario, $sucuOrig, $sucuDest, $cliente, $vehiculo, $arrastre, $fechaOrig, $fechaEst, $kmEst, $combEst, $otrosG, $precio);
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