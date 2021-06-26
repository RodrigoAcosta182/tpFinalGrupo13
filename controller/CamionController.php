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
        $data = array();

        if (isset($_SESSION["registroCorrecto"]) && $_SESSION["registroCorrecto"] == 1) {
            $data["registroCorrecto"] = "El camion fue agregado exitosamente";
            unset($_SESSION["registroCorrecto"]);
        }
        if (isset($_SESSION["registroIncorrecto"]) && $_SESSION["registroIncorrecto"] == 1) {
            $data["registroIncorrecto"] = "Hubo un error al agregar el Camion";
            unset($_SESSION["registroIncorrecto"]);
        }
        if (isset($_SESSION["patenteExistente"]) && $_SESSION["patenteExistente"] == 1) {
            $data["patenteExistente"] = "La patente ingresada ya se encuentra registrada";
            unset($_SESSION["patenteExistente"]);
        }
        if (isset($_SESSION["mensajeModificar"]) && $_SESSION["mensajeModificar"] == 1) {
            $data["mensajeModificar"] = "El camion fue editado exitosamente";
            unset($_SESSION["mensajeModificar"]);
        }

        if (isset($_SESSION["mensajeError"]) && $_SESSION["mensajeError"] == 1) {
            $data["mensajeError"] = "Hubo un error al editar el Camion";
            unset($_SESSION["mensajeError"]);
        }

        if (isset($_SESSION["logueado"])) {
            $data["camion"] = $this->camionModel->listarCamiones();
        echo $this->render->renderizar("view/camion.mustache", $data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function altaCamion()
    {
        echo $this->render->renderizar("view/altaCamion.mustache");
    }

    public function registrarCamion(){

        if(isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['patente']) && isset($_POST['chasis']) &&
            isset($_POST['motor']) && isset($_POST['kilometraje']) && isset($_POST['fabricacion']) && isset($_POST['arrastre'])){
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $patente = $_POST['patente'];
            $chasis = $_POST['chasis'];
            $motor = $_POST['motor'];
            $kilometraje = $_POST['kilometraje'];
            $fabricacion = $_POST['fabricacion'];
            $arrastre = $_POST['arrastre'];

            if(!$this->camionModel->getCamionSiExistePatente($patente)){
            $this->camionModel->registrarCamion($marca,$modelo,$patente,$chasis,$motor,$kilometraje,$fabricacion,$arrastre,true);
                $_SESSION['registroCorrecto'] = 1;
                header("Location: /tpFinalGrupo13/Camion");
            }else{
                $_SESSION['patenteExistente'] = 1;
                header("Location: /tpFinalGrupo13/Camion");
            }
        }else{
            $_SESSION['registroIncorrecto'] = 1;
            header("Location: /tpFinalGrupo13/Camion");
        }
    }

    public function modificarCamion()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
            $idCamion = $_POST['idCamion'];
            $data["camion"]= $this->camionModel->getCamionById($idCamion);
            echo $this->render->renderizar("view/modificarCamion.mustache",$data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function procesoModificarCamion(){
        if (isset($_SESSION["logueado"])) {
            if (isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['patente']) && isset($_POST['chasis']) &&
                isset($_POST['motor']) && isset($_POST['kilometraje']) && isset($_POST['fabricacion']) && isset($_POST['arrastre'])) {
                $idCamion = $_POST['idCamion'];
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $patente = $_POST['patente'];
                $chasis = $_POST['chasis'];
                $motor = $_POST['motor'];
                $kilometraje = $_POST['kilometraje'];
                $fabricacion = $_POST['fabricacion'];
                $arrastre = $_POST['arrastre'];

                if (isset($_POST['activo']) && $_POST['activo'] === "on") {
                    $activo = true;
                } else {
                    $activo = false;
                }
                    $this->camionModel->editCamion($idCamion,$marca, $modelo, $patente, $chasis, $motor, $kilometraje,$fabricacion,$arrastre,$activo);
                    $_SESSION['mensajeModificar'] = 1;
                    header("Location: /tpFinalGrupo13/Camion");
                } else {
                    echo "2";
                    $_SESSION['mensajeError'] = 1;
                    header("Location: /tpFinalGrupo13/Camion");
                }
            } else {
                header("location: /tpFinalGrupo13");
                exit();
            }
    }



}