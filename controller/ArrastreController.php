<?php
class ArrastreController
{

    private $arrastreModel;
    private $render;

    public function __construct(\Render $render, \ArrastreModel $arrastreModel)
    {
        $this->render = $render;
        $this->arrastreModel = $arrastreModel;
    }

    public function execute()
    {
        $arrastre["arrastre"] = $this->arrastreModel->listarArrastre();
        echo $this->render->renderizar("view/arrastre.mustache", $arrastre);
    }
}