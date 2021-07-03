<?php
class PosicionController
{

    private $posicionModel;
    private $render;

    public function __construct(\Render $render, \PosicionModel $posicionModel)
    {
        $this->render = $render;
        $this->posicionModel = $posicionModel;
    }

    public function execute()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
        //$data["posicion"] = $this->posicionModel->listarPosicion();
        echo $this->render->renderizar("view/posicionvehiculo.mustache", $data);
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

    }
}