<?php
class ViajeController
{

    private $viajeModel;
    private $usuarioModel;
    private $clienteModel;
    private $camionModel;
    private $arrastreModel;
    private $render;

    public function __construct(\Render $render, \ViajeModel $viajeModel, \UsuarioModel $usuarioModel,
                                \ClienteModel $clienteModelModel,\CamionModel $camionModel,\ArrastreModel $arrastreModel)
    {
        $this->render = $render;
        $this->viajeModel = $viajeModel;
        $this->usuarioModel = $usuarioModel;
        $this->clienteModel = $clienteModelModel;
        $this->camionModel = $camionModel;
        $this->arrastreModel = $arrastreModel;
    }

    public function execute()
    {
        $data = array();

        if (isset($_SESSION["mensajeModificar"]) && $_SESSION["mensajeModificar"] == 1) {
            $data["mensajeModificar"] = "El viaje fue editado exitosamente";
            unset($_SESSION["mensajeModificar"]);
        }

        if (isset($_SESSION["mensajeFinalizar"]) && $_SESSION["mensajeFinalizar"] == 1) {
            $data["mensajeFinalizar"] = "El viaje fue finalizado exitosamente";
            unset($_SESSION["mensajeFinalizar"]);
        }


        if (isset($_SESSION["logueado"])) {
            if ($_SESSION["esChofer"] == 1){
                $idChofer =  $_SESSION["id"];
                $data["viaje"] = $this->viajeModel->listarViajesByChofer($idChofer);
            }else{
                $data["viaje"] = $this->viajeModel->listarViajes();
            }
        echo $this->render->renderizar("view/viaje.mustache", $data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function altaViaje()
    {
        $data["chofer"] = $this->usuarioModel->listarChoferes();
        $data["cliente"] = $this->clienteModel->listarClientes();
        $data["vehiculo"] = $this->camionModel->listarVehiculosActivos();
        $data["arrastre"] = $this->arrastreModel->listarArrastre();
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
                $precioCombustible =$_POST['precioCombustibleEstimado'];
                $precio = $_POST['precio'];

                   $this->viajeModel->registrarViaje($usuario, $sucuOrig, $sucuDest, $cliente, $vehiculo, $arrastre, $fechaOrig, $fechaEst, $kmEst, $combEst, $otrosG, $precio,$precioCombustible);
                   $_SESSION['registroCorrecto'] = 1;
                   header("Location: /tpFinalGrupo13/Viaje");

            } else {
                $_SESSION['registroIncorrecto'] = 1;
                header("Location: /tpFinalGrupo13/Viaje");

            }
        }
    }


        public function modificarViaje()
        {
            $data = array();
             if (isset($_SESSION["logueado"])) {
                $idViaje = $_POST['idViaje'];
                $data["viajes"]= $this->viajeModel->getViajeById($idViaje);
               echo $this->render->renderizar("view/modificarViaje.mustache", $data);
            }
             else {
                header("location: /tpFinalGrupo13");
                exit();
            }
        }

    public function procesoModificarViaje(){
        if (isset($_SESSION["logueado"])) {
            if (isset($_POST['usuario']) && isset($_POST['sucuOrig']) && isset($_POST['sucuDest']) &&
                isset($_POST['cliente']) && isset($_POST['vehiculo']) && isset($_POST['arrastre']) &&
                isset($_POST['fechaOrig']) && isset($_POST['fechaEst']) && isset($_POST['kmEst']) &&
                isset($_POST['combEst']) && isset($_POST['precio']) && isset($_POST['otrosG'])) {
                $idViaje =  $_POST['viajeId'];
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
                $precioCombustible = $_POST['precioCombustibleEstimado'];
                $precio = $_POST['precio'];
                $otrosG = $_POST['otrosG'];

                if (isset($_POST['activo']) && $_POST['activo'] === "on") {
                    $activo = true;
                } else {
                    $activo = false;
                }

                $this->viajeModel->editViaje($idViaje,$usuario, $sucuOrig, $sucuDest,$cliente,$vehiculo,$arrastre,$fechaOrig,$fechaEst,$kmEst,$combEst,$precio,$otrosG,$activo,$precioCombustible);
                $_SESSION['mensajeModificar'] = 1;
                header("Location: /tpFinalGrupo13/Viaje");
            } else {
                $_SESSION['mensajeError'] = 1;
                header("Location: /tpFinalGrupo13/Viaje");
            }
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function finalizarViaje(){
        $idViaje = $_POST['finalizarViaje'];
        $this->viajeModel->finalizarViaje($idViaje);
        $_SESSION['mensajeFinalizar'] = 1;
        header("Location: /tpFinalGrupo13/Viaje");
    }


}