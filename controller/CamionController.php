<?php
class CamionController
{

    private $camionModel;
    private $render;

    public function __construct(\Render $render, \CamionModel $camionModel)

    {
        $this->render = $render;
        $this->camionModel = $camionModel;
    }

    public function execute()
    {
        $data = array();

        if (isset($_SESSION["mensajeModificar"]) && $_SESSION["mensajeModificar"] == 1) {
            $data["mensajeModificar"] = "El camion fue editado exitosamente";
            unset($_SESSION["mensajeModificar"]);
        }
        if (isset($_SESSION["logueado"])) {
        $camion["camion"] = $this->camionModel->listarCamiones();
        echo $this->render->renderizar("view/camion.mustache", $camion);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function altaVehiculo()
    {
        echo $this->render->renderizar("view/altaCamion.mustache");
    }

    public function modificarCamion()
    {
        $idCamion = $_POST['idCamion'];
        $camion["camion"]= $this->camionModel->getCamionById($idCamion);
        echo $this->render->renderizar("view/modificarCamion.mustache",$camion);
    }
}