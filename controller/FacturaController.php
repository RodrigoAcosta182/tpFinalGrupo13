<?php
class FacturaController
{

    private $facturaModel;
    private $render;

    public function __construct(\Render $render, \FacturaModel $facturaModel)
    {
        $this->render = $render;
        $this->facturaModel = $facturaModel;
    }

    public function execute()
    {
        $factura["factura"] = $this->facturaModel->listarFactura();
        echo $this->render->renderizar("view/factura.mustache", $factura);
    }
}