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
        $data["chofer"] = $this->viajeModel->listarChoferes();
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


        public function modificarViaje()
        {
            $data = array();
             if (isset($_SESSION["logueado"])) {
                $idViaje = $_POST['idViaje'];
                $data["viajes"]= $this->viajeModel->getViajeById($idViaje);
                $data["cliente"] = $this->viajeModel->listarClientes();
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
                $precio = $_POST['precio'];
                $otrosG = $_POST['otrosG'];

                /*
                if(isset($_GET['finalizado']) && $_GET['finalizado'] === "on" ){
                    $active = true;
                }else{
                    $active = false;
                }*/

//                echo $idViaje . ' ' . "Viaje"."<br>";
//                echo $arrastre. ' ' . "arrastre"."<br>";
//                echo $usuario. ' ' . "usuario"."<br>";
//                echo $sucuOrig . ' ' . "sucorigen"."<br>";
//                echo $sucuDest . ' ' . "sucdestino"."<br>";
//                echo $cliente. ' ' . "cliente"."<br>";
//                echo $vehiculo. ' ' . "vehiculo"."<br>";
//                echo $fechaOrig. ' ' . "fechaOrig"."<br>";
//                echo $fechaEst . ' ' . "fechaEst"."<br>";
//                echo $kmEst. ' ' . "kmEst"."<br>";
//                echo $combEst. ' ' . "combEst"."<br>";
//                echo $precio . ' ' . "precio"."<br>";
//                echo $otrosG. ' ' . "otrosG"."<br>";

                $this->viajeModel->editViaje($idViaje,$usuario, $sucuOrig, $sucuDest,$cliente,$vehiculo,$arrastre,$fechaOrig,$fechaEst,$kmEst,$combEst,$precio,$otrosG);
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
}