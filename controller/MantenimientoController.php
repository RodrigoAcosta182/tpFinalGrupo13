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
        $mantenimiento["mantenim"] = $this->mantenimientoModel->listarMantenimiento();
        echo $this->render->renderizar("view/mantenimiento.mustache", $mantenimiento);
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