<?php


class Configuracion
{

    public static function getDatabase()
    {
        include_once("Database.php");
        $config = self::getConfigurationParameters();
        return new Database($config["servername"],$config["username"],$config["password"],$config["dbname"]);

    }

    private static function getConfigurationParameters()
    {
        return parse_ini_file("configuration/config.ini");
    }

    public static function getRender()
    {
        include("third-party/mustache/src/Mustache/Autoloader.php");
        include_once("Render.php");
        return new Render("view/partial");
    }

    public static function getUsuarioModel(){
        $database = self::getDatabase();
        include_once ("model/UsuarioModel.php");
        return new UsuarioModel($database);
    }

    public static function getLoginController()
    {
        $render = self::getRender();
        $usuarioModel = self::getUsuarioModel();
        include_once("controller/LoginController.php");
        return new LoginController($render,$usuarioModel);
    }

    public static function getLogoutController(){
        include_once ("controller/LogoutController.php");
        return new LogoutController();
    }

    public static function getHomeController()
    {
        $render = self::getRender();
        include_once("controller/HomeController.php");
        return new HomeController($render);
    }
    public static function getRegistrarseController()
    {
        $render = self::getRender();
        $usuarioModel = self::getUsuarioModel();
        include_once("controller/RegistrarseController.php");
        return new RegistrarseController($render,$usuarioModel);
    }

    public static function getModificarUsuarioController()
    {
        $render = self::getRender();

        include_once("controller/ModificarUsuarioController.php");
        return new ModificarUsuarioController($render);
    }

    public static function getAltaClienteController()
    {
        $render = self::getRender();

        include_once("controller/AltaUsuarioController.php");
        return new AltaClienteController($render);
    }

    public static function getModificarClienteController()
    {
        $render = self::getRender();

        include_once("controller/ModificarClienteController.php");
        return new ModificarClienteController($render);
    }

    public static function getAltaVehiculoController()
    {
        $render = self::getRender();

        include_once("controller/AltaVehiculoController.php");
        return new AltaVehiculoController($render);
    }

    public static function getModificarVehiculoController()
    {
        $render = self::getRender();

        include_once("controller/ModificarVehiculoController.php");
        return new ModificarVehiculoController($render);
    }

    public static function getAltaCargaController()
    {
        $render = self::getRender();

        include_once("controller/AltaCargaController.php");
        return new AltaCargaController($render);
    }

    public static function getModificarCargaController()
    {
        $render = self::getRender();

        include_once("controller/ModificarCargaController.php");
        return new ModificarCargaController($render);
    }

    public static function getAltaServicioController()
    {
        $render = self::getRender();

        include_once("controller/AltaServicioController.php");
        return new AltaServicioController($render);
    }

    public static function getModificarServicioController()
    {
        $render = self::getRender();

        include_once("controller/ModificarServicioController.php");
        return new ModificarServicioController($render);
    }



    public function getRouter(){
        include_once("Router.php");
        return new Router($this);
    }

    public function getUrlHelper(){
        include_once("helpers/UrlHelper.php");
        return new UrlHelper();
    }
}