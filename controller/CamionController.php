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
        $data["camion"] = $this->camionModel->listarCamiones();
        echo $this->render->renderizar("view/camion.mustache",$data);
    }

    public function altaVehiculo(){
        if(isset($_POST['patente']) && isset($_POST['chasis']) && isset($_POST['motor']) && isset($_POST['aniofab'])){
            $patente = $_POST['patente'];
            $chasis = $_POST['chasis'];
            $motor = $_POST['motor'];
            $aniofab = ($_POST['aniofab']);
            $km = ($_POST['km']);
            $active = 1;

            if(!$this->camionModel->getCamionSiExistePatente($patente)){
                $this->camionModel->registrarCamion($patente,$chasis,$motor,$aniofab,$km);
                $_SESSION['registroCorrecto'] = 1;
                header("Location: /tpFinalGrupo13");
            }else{
                $_SESSION['emailExistente'] = 1;
                header("Location: /tpFinalGrupo13");
            }
        }else{
            $_SESSION['registroIncorrecto'] = 1;
            header("Location: /tpFinalGrupo13");
        }
        echo $this->render->renderizar("view/altaCamion.mustache");
    }

    public function modificarCamion()
    {

        $data = array();
        if (isset($_SESSION["logueado"])) {
            $idCamion = $_POST['idCamion'];
            $data["modelo"]= $this->camionModel->getModelo();
            $data["arrastre"] = $this->camionModel->getArrastre();
            $data["mantenimiento"]= $this->camionModel->getMantenimiento();
            $data["marca"] = $this->camionModel->getMarca();
            $data["idCamion"]= $this->camionModel->getCamionById($idCamion);


            echo $this->render->renderizar("view/modificarCamion.mustache",$data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }

    }

    public function procesoModificarCamion(){
        if (isset($_SESSION["logueado"])) {
            $id = $_GET['id'];
            $patente = $_POST['patente'];
            $chasis = $_POST['chasis'];
            $motor = $_POST['motor'];
            $aniofab = ($_POST['aniofab']);
            $km = ($_POST['km']);

            if(isset($_GET['modelo']) && $_GET['modelo'] != "" )
            {
                $modelo = ($_GET['modelo']);
            }else{
                $modelo = ($this->camionModel->getCamionById($id)[0]['pModelo']);
            }

            if(isset($_GET['arrastre']) && $_GET['arrastre'] != "" )
            {
                $arrastre = $_GET['arrastre'];
            }else{
                $arrastre = ($this->camionModel->getCamionById($id)[0]['pArrastre']);
            }

            if(isset($_GET['mantenimiento']) && $_GET['mantenimiento'] != "" )
            {
                $mantenimiento = $_GET['mantenimiento'];
            }else{
                $mantenimiento = ($this->camionModel->getCamionById($id)[0]['pMantenimiento']);
            }

            if(isset($_GET['marca']) && $_GET['marca'] != "" )
            {
                $marca = $_GET['marca'];
            }else{
                $marca = ($this->camionModel->getCamionById($id)[0]['pMarca']);
            }

            $this->camionModel->editCamion($id,$patente,$chasis,$motor,$aniofab,$km,$modelo,$arrastre,$mantenimiento,$marca);
            $_SESSION['mensajeModificar'] = 1;
            header("Location: /tpfinalGrupo13/Camion");

        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
}