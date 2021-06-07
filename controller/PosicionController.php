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
        $posicion["posicion"] = $this->posicionModel->listarPosicion();
        echo $this->render->renderizar("view/posicionvehiculo.mustache", $posicion);
    }
}