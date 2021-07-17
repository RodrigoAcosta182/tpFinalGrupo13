<?php
class PosicionController
{

    private $posicionModel;
    private $viajeModel;
    private $render;
    private $camionModel;

    public function __construct(\Render $render, \PosicionModel $posicionModel,\ViajeModel $viajeModel,
                                \CamionModel $camionModel)
    {
        $this->render = $render;
        $this->posicionModel = $posicionModel;
        $this->viajeModel = $viajeModel;
        $this->camionModel = $camionModel;
    }

    public function execute()
    {

        $data = array();
        if (isset($_SESSION["logueado"])) {
            if ($_SESSION["esChofer"] == 1){
                $idChofer =  $_SESSION["id"];
                $data["posicion"] = $this->posicionModel->listarPosicionesByIdChofer($idChofer);
            }else{
                $data["posicion"] = $this->posicionModel->listarPosiciones();
            }
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
            $idViaje = $_POST['finalizarViaje'];
            $data["viaje"] = $this->viajeModel->getViajeById($idViaje);
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
                isset($_POST['kmReales']) && isset($_POST['combustibleReal']) && isset($_POST['gastosGenerales']) && $_POST['vehiculoId']) {
                $idViaje =  $_POST['idViaje'];
                $chofer = $_POST['chofer'];
                $fechaHoy = $_POST['fechaPosicionHoy'];
                $hora = $_POST['horaPosicionHoy'];
                $latitud = $_POST['latitud'];
                $longitud = $_POST['longitud'];
                $kmReales = $_POST['kmReales'];
                $combustibleReal = $_POST['combustibleReal'];
                $gastosGenerales = $_POST['gastosGenerales'];
                $vehiculoId = $_POST['vehiculoId'];


                $patente = $_POST['patenteVehiculo'];
                $kmActualesVehiculo = $this->camionModel->getKmActuales($patente)[0]['kilometraje'];;
                $kmActualesVehiculo = $kmActualesVehiculo + $kmReales;
                $this->camionModel->setKmActuales($patente,$kmActualesVehiculo);

                $this->posicionModel->guardarPosicion($idViaje,$chofer, $fechaHoy, $hora,$latitud,$longitud,$kmReales,$combustibleReal,$gastosGenerales,$vehiculoId);

                $_SESSION['mensajeRegistroPosicion'] = 1;
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