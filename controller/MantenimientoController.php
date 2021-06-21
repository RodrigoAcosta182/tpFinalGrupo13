<?php
class MantenimientoController
{

    private $mantenimientoModel;
    private $render;

    public function __construct(\Render $render, \MantenimientoModel $mantenimientoModel)
    {
        $this->render = $render;
        $this->mantenimientoModel = $mantenimientoModel;
    }

    public function execute()
    {
        $data = array();

        if (isset($_SESSION["mensajeModificar"]) && $_SESSION["mensajeModificar"] == 1) {
            $data["mensajeModificar"] = "El cliente fue editado exitosamente";
            unset($_SESSION["mensajeModificar"]);
        }
        if (isset($_SESSION["logueado"])) {
        $mantenimiento["mantenim"] = $this->mantenimientoModel->listarMantenimiento();
        echo $this->render->renderizar("view/mantenimiento.mustache", $mantenimiento);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function altaMantenimiento()
    {
        echo $this->render->renderizar("view/altaMantenimiento.mustache");
    }

    public function modificarMantenimiento()
    {
        echo $this->render->renderizar("view/modificarMantenimiento.mustache");
    }
}