<?php
class PosicionController
{

    private $posicionModel;
    private $viajeModel;
    private $render;

    public function __construct(\Render $render, \PosicionModel $posicionModel,\ViajeModel $viajeModel)
    {
        $this->render = $render;
        $this->posicionModel = $posicionModel;
        $this->viajeModel = $viajeModel;
    }

    public function execute()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
            $data["viaje"] = $this->viajeModel->listarViajes();
        echo $this->render->renderizar("view/posicion.mustache", $data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }


    public function obtenerPosicion(){
        $datos = array();
        $datos['latitud'] = $_POST['latitud'];
        $datos['longitud'] = $_POST['longitud'];

        if(!empty($datos)) {
            echo json_encode($datos);
        } else {
            echo json_encode(['campo1'=>'', 'campo2'=>'']);
        }
    }
    public function registrarPosicion(){
        $data = array();
        if (isset($_SESSION["logueado"])) {
            $data["viaje"] = $this->viajeModel->listarViajes();
            echo $this->render->renderizar("view/registrarPosicion.mustache", $data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function procesoRegistrarPosicion(){

        if (isset($_SESSION["logueado"])) {
            if (isset($_POST['idViaje']) && isset($_POST['chofer']) && isset($_POST['fechaPosicionHoy']) &&
                isset($_POST['horaPosicionHoy']) && isset($_POST['latitud']) && isset($_POST['longitud']) &&
                isset($_POST['kmReales']) && isset($_POST['combustibleReal']) && isset($_POST['gastosGenerales']) && $_POST['patenteVehiculo']) {
                $idViaje =  $_POST['idViaje'];
                $chofer = $_POST['chofer'];
                $fechaHoy = $_POST['fechaPosicionHoy'];
                $hora = $_POST['horaPosicionHoy'];
                $latitud = $_POST['latitud'];
                $longitud = $_POST['longitud'];
                $kmReales = $_POST['kmReales'];
                $combustibleReal = $_POST['combustibleReal'];
                $gastosGenerales = $_POST['gastosGenerales'];
                $patenteVehiculo = $_POST['patenteVehiculo'];


                $this->posicionModel->guardarPosicion($idViaje,$chofer, $fechaHoy, $hora,$latitud,$longitud,$kmReales,$combustibleReal,$gastosGenerales,$patenteVehiculo);
                //$_SESSION['mensajeModificar'] = 1;
                //header("Location: /tpFinalGrupo13/Posicion");
            } else {
                $_SESSION['mensajeError'] = 1;
                echo "error 1";
                //header("Location: /tpFinalGrupo13/Posicion");
            }
        } else {
            //header("location: /tpFinalGrupo13");
            exit();
        }
    }


}