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
        $camion["camion"] = $this->camionModel->listarCamiones();
        echo $this->render->renderizar("view/camion.mustache", $camion);
    }
}