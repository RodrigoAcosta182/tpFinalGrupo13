<?php


class RegistrarseController
{

    private $render;
    private $usuarioModel;
    public function __construct(\Render $render, \UsuarioModel $usuarioModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
    }
    public function execute()
    {
        echo $this->render->renderizar("view/registrarse.mustache");
    }
    public function validarRegistro(){



        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['contrasenia'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $contrasenia = md5($_POST['contrasenia']);
            $active = 0;

            if(!$this->usuarioModel->getUsuarioSiExisteMail($email)){
                $this->usuarioModel->registrarUsuario($nombre,$apellido,$email,$contrasenia,$active);
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
    }
}