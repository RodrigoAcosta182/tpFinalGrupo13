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
        $viaje["viaje"] = $this->viajeModel->listarViajes();
        echo $this->render->renderizar("view/viaje.mustache", $viaje);
    }

    public function modificarCliente()
    {
        echo $this->render->renderizar("view/modificarViaje.mustache");
    }
}