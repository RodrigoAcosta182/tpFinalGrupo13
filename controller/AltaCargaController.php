<?php


class AltaCargaController
{

    private $render;

    public function __construct(\Render $render)
    {
        $this->render = $render;
    }

    public function execute()
    {
        echo $this->render->renderizar("view/altaCarga.mustache");
    }
}