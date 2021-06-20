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

        if(isset($_SESSION['registroCorrecto']) && $_SESSION['registroCorrecto'] === 1){
            $data['registroCorrecto'] = "Se ha registrado correctamente. El Administrador activará su cuenta pronto.";
            unset($_SESSION['registroCorrecto']);
        }

        if(isset($_SESSION['registroIncorrecto']) && $_SESSION['registroIncorrecto'] === 1){
            $data['registroIncorrecto'] = "Hubo un problema, intente nuevamente.";
            unset($_SESSION['registroIncorrecto']);
        }
        if(isset($_SESSION['emailExistente']) && $_SESSION['emailExistente'] === 1){
            $data['emailExistente'] = "Ya posee una cuenta con ese Email. Contacte un Administrador para ser habilitado.";
            unset($_SESSION['emailExistente']);
        }

        echo $this->render->renderizar("view/login.mustache",$data);
    }

    public function validarLogin(){
        if (isset($_POST["email"]) && isset($_POST["contrasenia"])) {
            $usuario = $_POST["email"];
            $password = md5($_POST["contrasenia"]);

            $user = $this->usuarioModel->getUsuarioByEmailPassword($usuario,$password);

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
                $_SESSION["id"] = $user[0]["Id"];;
                $_SESSION["nombre"] = $user[0]["Nombre"];
                $_SESSION["apellido"] = $user[0]["Apellido"];

                $_SESSION["esAdministrador"] = $this->isAdmin($user[0]["pTipoUsuario"]);
                $_SESSION["esChofer"] = $this->isChofer($user[0]["pTipoUsuario"]);
                $_SESSION["esMecanico"] = $this->isMecanico($user[0]["pTipoUsuario"]);
                $_SESSION["esSupervisor"] = $this->isSupervisor($user[0]["pTipoUsuario"]);
                $_SESSION["esEncargado"] = $this->isEncargado($user[0]["pTipoUsuario"]);
                $_SESSION["esLlano"] = $this->isLlano($user[0]["pTipoUsuario"]);

                header("Location: /tpFinalGrupo13/home");
                exit();
            }
        }
    }
    public function isAdmin($rol) {
        return  $rol == 3 ? true : false;
    }

    public function isSupervisor($rol) {
        return  $rol == 4 ? true : false;
    }

    public function isEncargado($rol) {
        return  $rol == 7 ? true : false;
    }

    public function isChofer($rol) {
        return  $rol == 1 ? true : false;
    }

    public function isMecanico($rol) {
        return  $rol == 2 ? true : false;
    }
    public function isLlano($rol) {
        return  $rol == 6 ? true : false;
    }
}