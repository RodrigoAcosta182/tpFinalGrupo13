<?php
class ProformaController
{

    private $proformaModel;
    private $render;

    public function __construct(\Render $render, \ProformaModel $proformaModel)
    {
        $this->render = $render;
        $this->proformaModel = $proformaModel;
    }

    public function execute()
    {
        $data = array();

        if (isset($_SESSION["logueado"])) {
        echo $this->render->renderizar("view/proforma.mustache", $data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }


}