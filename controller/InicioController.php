<?php
class InicioController
{

private $render;

public function __construct(\Render $render)
{
$this->render = $render;
}

public function renderInicio()
{
echo $this->render->renderizar("view/inicio.mustache");
}
}