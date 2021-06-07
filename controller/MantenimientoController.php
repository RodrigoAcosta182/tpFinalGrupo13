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
}