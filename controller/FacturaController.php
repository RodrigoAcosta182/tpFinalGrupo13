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
        if (isset($_SESSION["logueado"])) {
        $factura["factura"] = $this->facturaModel->listarFactura();
        echo $this->render->renderizar("view/factura.mustache", $factura);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
}