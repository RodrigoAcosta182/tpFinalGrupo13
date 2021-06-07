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
        if (isset($_SESSION["logueado"])) {
            $usuarios["usuarios"] = $this->usuarioModel->listarUsuario();
            echo $this->render->renderizar("view/usuario.mustache", $usuarios);
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

    public function eliminarUsuario(){
        $idUsuario = $_POST['idUsuarioEliminar'];
        $this->usuarioModel->eliminarUsuarioById($idUsuario);
    }

}

