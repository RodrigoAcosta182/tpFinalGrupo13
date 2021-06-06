<?php


class LoginController
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
        $data = array();

        if (isset($_SESSION["errorLogin"]) && $_SESSION["errorLogin"] == 1) {
            $data["MensajeErrorLogin"] = "E-Mail o contraseña incorrecta";
            unset($_SESSION["errorLogin"]);
        }

        if (isset($_SESSION["usuarioInactivo"]) && $_SESSION["usuarioInactivo"] == 1) {
            $data["MensajeUsuarioInactivo"] = "Usuario deshabilitado. Contactar a un Administrador";
            unset($_SESSION["usuarioInactivo"]);
        }
        echo $this->render->renderizar("view/login.mustache",$data);
    }

    public function validarLogin(){

        if (isset($_POST["email"]) && isset($_POST["contrasenia"])) {
            $usuario = $_POST["email"];
            $password = $_POST["contrasenia"];

            $user = $this->usuarioModel->getUsuarioByEmailPassword($usuario,$password);
            echo json_encode($user);

            if(empty($user)){
                $_SESSION["errorLogin"] = 1;
                header("Location: /tpFinalGrupo13");
                exit();
            } else if($user[0]["Active"] == 0){
                $_SESSION["usuarioInactivo"] = 1;
                header("Location: /tpFinalGrupo13");
                exit();
            }else  {
                $_SESSION["logueado"] = 0;
                $_SESSION["id"] = $user[0]["Id"];
                $_SESSION["nombre"] = $user[0]["Nombre"];
                $_SESSION["apellido"] = $user[0]["Apellido"];

                header("Location: /tpFinalGrupo13/home");
                exit();
            }

        }
    }
}