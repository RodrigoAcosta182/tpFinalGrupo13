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
        $viaje["viaje"] = $this->viajeModel->listarViajes();
        echo $this->render->renderizar("view/viaje.mustache", $viaje);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
}