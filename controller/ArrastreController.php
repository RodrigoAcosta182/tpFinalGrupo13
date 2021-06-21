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

    public function modificarArrastre()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
            $data["acoplado"]= $this->arrastreModel->getRemolques();
        echo $this->render->renderizar("view/modificarArrastre.mustache");
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function procesoModificarRemolque(){
        if (isset($_SESSION["logueado"])) {
            $id = $_GET['id'];
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $email = $_GET['email'];

            if(isset($_GET['active']) && $_GET['active'] === "on" ){
                $active = 1;
            }else{
                $active = 0;
            }

            if(isset($_GET['contrasenia']) && $_GET['contrasenia'] != "" )
            {
                $contrasenia = md5($_GET['contrasenia']);
            }else{
                $contrasenia = ($this->usuarioModel->getUsuarioById($id)[0]['Password']);
            }

            if(isset($_GET['rol']) && $_GET['rol'] != "" )
            {
                $rol = $_GET['rol'];
            }else{
                $rol = ($this->usuarioModel->getUsuarioById($id)[0]['pTipoUsuario']);
            }

            if(isset($_GET['licencia']) && $_GET['licencia'] != "" )
            {
                $licencia = $_GET['licencia'];
            }else{
                $licencia = ($this->usuarioModel->getUsuarioById($id)[0]['pLicencia']);
            }

            $this->usuarioModel->editUsuario($id,$nombre,$apellido,$email,$contrasenia,$active,$rol,$licencia);
            $_SESSION['mensajeModificar'] = 1;
            header("Location: /tpfinalGrupo13/Usuario");

        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
}