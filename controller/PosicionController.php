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

    public function registrarPosicion(){
        $data = array();
        if (isset($_SESSION["logueado"])) {
            //$data["viaje"] = $this->viajeModel->listarViajes();
            echo $this->render->renderizar("view/registrarPosicion.mustache", $data);
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


}