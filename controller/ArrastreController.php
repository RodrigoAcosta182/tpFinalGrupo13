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

    public function altaArrastre()
    {
        echo $this->render->renderizar("view/altaArrastre.mustache");
    }

    public function modificarArrastre()
    {
        echo $this->render->renderizar("view/modificarArrastre.mustache");
    }

}