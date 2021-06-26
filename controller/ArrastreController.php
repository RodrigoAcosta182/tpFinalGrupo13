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
        $data = array();

        if (isset($_SESSION["mensajeModificar"]) && $_SESSION["mensajeModificar"] == 1) {
            $data["mensajeModificar"] = "El arrastre fue editado exitosamente";
            unset($_SESSION["mensajeModificar"]);
        }
        if (isset($_SESSION["logueado"])) {
        $arrastre["arrastre"] = $this->arrastreModel->listarArrastre();
        echo $this->render->renderizar("view/arrastre.mustache", $arrastre);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function altaArrastre()
    {
        echo $this->render->renderizar("view/altaArrastre.mustache");
    }

    public function registrarArrastre()
    {
        if (isset($_SESSION["logueado"])) {
            if (isset($_POST['carga']) && isset($_POST['patente']) && isset($_POST['chasis'])) {
                $carga = $_POST['carga'];
                $patente = $_POST['patente'];
                $chasis = $_POST['chasis'];

                if (!$this->arrastreModel->getArrastreSiExistePatente($patente)) {
                    $this->arrastreModel->registrarArrastre($carga, $patente, $chasis);
                    $_SESSION['registroCorrecto'] = 1;
                    header("Location: /tpFinalGrupo13/Arrastre");
                } else {
                    $_SESSION['patenteExistente'] = 1;
                    header("Location: /tpFinalGrupo13/Arrastre");
                }
            } else {
                $_SESSION['registroIncorrecto'] = 1;
                header("Location: /tpFinalGrupo13/Arrastre");
            }
        }
    }

    public function modificarArrastre()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
            $idArrastre = $_POST['idArrastre'];
            $data["arrastre"]= $this->arrastreModel->getArrastreById($idArrastre);
            echo $this->render->renderizar("view/modificarArrastre.mustache",$data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
    public function procesoModificarArrastre(){
        if (isset($_SESSION["logueado"])) {
            if (isset($_POST['idArrastre']) && isset($_POST['carga']) && isset($_POST['patente']) && isset($_POST['chasis'])) {
                $idArrastre = $_POST['idArrastre'];
                $carga = $_POST['carga'];
                $patente = $_POST['patente'];
                $chasis = $_POST['chasis'];

                $this->arrastreModel->editArrastre($idArrastre,$carga,$patente, $chasis);
                $_SESSION['mensajeModificar'] = 1;
                header("Location: /tpFinalGrupo13/Arrastre");
            } else {
                $_SESSION['mensajeError'] = 1;
                header("Location: /tpFinalGrupo13/Arrastre");
            }
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
}