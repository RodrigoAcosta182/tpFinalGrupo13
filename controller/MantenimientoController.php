<?php
class MantenimientoController
{

    private $mantenimientoModel;
    private $camionModel;
    private $render;

    public function __construct(\Render $render, \MantenimientoModel $mantenimientoModel,\CamionModel $camionModel)
    {
        $this->render = $render;
        $this->mantenimientoModel = $mantenimientoModel;
        $this->camionModel = $camionModel;
    }

    public function execute()
    {
        $data = array();

        if (isset($_SESSION["mensajeModificar"]) && $_SESSION["mensajeModificar"] == 1) {
            $data["mensajeModificar"] = "El cliente fue editado exitosamente";
            unset($_SESSION["mensajeModificar"]);
        }
        if (isset($_SESSION["logueado"])) {
        $mantenimiento["mantenim"] = $this->mantenimientoModel->listarMantenimiento();
        echo $this->render->renderizar("view/mantenimiento.mustache", $mantenimiento);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function altaMantenimiento()
    {   $data = array();
        $data['camiones'] = $this->camionModel->listarCamiones();
        echo $this->render->renderizar("view/altaMantenimiento.mustache",$data);
    }

    public function registrarMantenimiento()
    {
        if (isset($_SESSION["logueado"])) {
            if (isset($_POST['service']) && isset($_POST['vehiculo']) && isset($_POST['importe']) &&
                isset($_POST['fdesde'])&& isset($_POST['fhasta'])&& isset($_POST['descripcion'])) {
                $service = $_POST['service'];
                $vehiculo = $_POST['vehiculo'];
                $importe = $_POST['importe'];
                $fdesde = $_POST['fdesde'];
                $fhasta = $_POST['fhasta'];
                $descripcion = $_POST['descripcion'];

                $this->camionModel->camionEnMantenimiento($vehiculo);
                $this->mantenimientoModel->registrarMantenimiento($service, $vehiculo, $importe,$fdesde,$fhasta,$descripcion);
                $_SESSION['registroCorrecto'] = 1;
                header("Location: /tpFinalGrupo13/Mantenimiento");

            } else {
                $_SESSION['registroIncorrecto'] = 1;
                header("Location: /tpFinalGrupo13/Mantenimiento");
            }
        }
    }

    public function modificarMantenimiento()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
            $idMantenimiento = $_POST['IdMantenimiento'];
            $data["mantenim"]= $this->mantenimientoModel->getMantenimientoById($idMantenimiento);

            echo $this->render->renderizar("view/modificarMantenimiento.mustache",$data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function procesoModificarMantenimiento(){
        if (isset($_SESSION["logueado"])) {
            if (isset($_POST['service']) && isset($_POST['vehiculo']) && isset($_POST['importe']) &&
                isset($_POST['fdesde'])&& isset($_POST['fhasta'])&& isset($_POST['descripcion'])) {
                $id_mantenimiento =  $_POST['IdMantenimiento'];
                $service = $_POST['service'];
                $vehiculo = $_POST['vehiculo'];
                $importe = $_POST['importe'];
                $fdesde = $_POST['fdesde'];
                $fhasta = $_POST['fhasta'];
                $descripcion = $_POST['descripcion'];

                $this->mantenimientoModel->editMantenimiento($id_mantenimiento,$service, $vehiculo, $importe,$fdesde,$fhasta,$descripcion);
                $_SESSION['mensajeModificar'] = 1;
                header("Location: /tpFinalGrupo13/Mantenimiento");
            } else {
                $_SESSION['mensajeError'] = 1;
                header("Location: /tpFinalGrupo13/Mantenimiento");
            }
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function finalizarMantenimiento(){
        $idMantenimiento = $_POST['IdMantenimiento'];
        $idVehiculo = $_POST['IdVehiculo'];
        $this->camionModel->camionFinalizarMantenimiento($idVehiculo);
        $this->mantenimientoModel->finalizarMantenimiento($idMantenimiento);
        header("Location: /tpFinalGrupo13/Mantenimiento");
    }

}