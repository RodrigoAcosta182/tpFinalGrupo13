<?php


class LoginController
{

    private $render;

    public function __construct(\Render $render)
    {
        $this->render = $render;
    }

    public function execute()
    {
        echo $this->render->renderizar("view/login.mustache");
    }

    public function validarLogin(){
        if (!empty($_POST["usuario"]) && !empty($_POST["contrasenia"])) {
            $usuario = $_POST["usuario"];
            $password = $_POST["contrasenia"];


            $resultado = $this->login($usuario,$password);
            $cantidadDeFilas = mysqli_num_rows($resultado);
            session_start();

            if ($cantidadDeFilas == 1) {
                $_SESSION["logueado"] = 1;
                $_SESSION["usuario"] = $_POST['usuario'];
                header("Location: ../../index.php");
            } else {
                $_SESSION["msg"] = "Usuario Inexistente";
                header("Location: ../../index.php");
            }
        }
    }
}