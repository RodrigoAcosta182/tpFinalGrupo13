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
        $idUsuario = $_POST['idUsuario'];
        $usuario["usuario"]= $this->usuarioModel->getUsuarioById($idUsuario);
        echo $this->render->renderizar("view/modificarUsuario.mustache",$usuario);
    }

    public function procesoModificarUsuario(){
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $email = $_GET['email'];
        $contrasenia = $_GET['contrasenia'];
        $rol = $_GET['rol'];
        $licencia = $_GET['licencia'];
        $active = $_GET['active'];

        $_SESSION['mensajeModificar'] = 1;

        header("Location: /tpfinalGrupo13/Usuario");
    }

    public function eliminarUsuario(){
        $idUsuario = $_POST['idUsuarioEliminar'];
        $this->usuarioModel->eliminarUsuarioById($idUsuario);

        echo $this->render->renderizar("view/usuario.mustache");
    }

}

