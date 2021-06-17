<?php
class UsuarioController
{

    private $usuarioModel;
    private $render;

    public function __construct(\Render $render, \UsuarioModel $usuarioModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
    }

    public function execute()
    {
        $data = array();

        if (isset($_SESSION["mensajeModificar"]) && $_SESSION["mensajeModificar"] == 1) {
            $data["mensajeModificar"] = "El usuario fue editado exitosamente";
            unset($_SESSION["mensajeModificar"]);
        }

        if (isset($_SESSION["logueado"])) {
            $data["usuarios"] = $this->usuarioModel->listarUsuario();
           echo $this->render->renderizar("view/usuario.mustache",$data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
    public function modificarUsuario()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
            $idUsuario = $_POST['idUsuario'];
            $data["roles"]= $this->usuarioModel->getRoles();
            $data["licencias"] = $this->usuarioModel->getLicencias();
            $data["usuario"]= $this->usuarioModel->getUsuarioById($idUsuario);


         echo $this->render->renderizar("view/modificarUsuario.mustache",$data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function procesoModificarUsuario(){
        if (isset($_SESSION["logueado"])) {
            $id = $_GET['id'];
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $email = $_GET['email'];
            $rol = $_GET['rol'];
            $licencia = $_GET['licencia'];



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


            $this->usuarioModel->editUsuario($id,$nombre,$apellido,$email,$contrasenia,$active,$rol,$licencia);
            $_SESSION['mensajeModificar'] = 1;
            header("Location: /tpfinalGrupo13/Usuario");

        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
}

