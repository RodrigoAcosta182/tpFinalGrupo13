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

    public static function getUsuarioController()
    {
        $render = self::getRender();
        $usuarioModel = self::getUsuarioModel();

        include_once("controller/UsuarioController.php");
        return new UsuarioController($render, $usuarioModel);
    }

    public static function getClienteModel(){

        $database = self::getDatabase();

        include_once ("model/ClienteModel.php");

        return new ClienteModel($database);
    }

    public static function getClienteController()
    {
        $render = self::getRender();
        $clienteModel = self::getClienteModel();

        include_once("controller/ClienteController.php");
        return new ClienteController($render, $clienteModel);
    }

    public static function getCamionModel(){

        $database = self::getDatabase();

        include_once ("model/CamionModel.php");

        return new CamionModel($database);
    }

    public static function getCamionController()
    {
        $render = self::getRender();
        $camionModel = self::getCamionModel();

        include_once("controller/CamionController.php");
        return new CamionController($render, $camionModel);
    }

    public static function getArrastreModel(){

        $database = self::getDatabase();

        include_once ("model/ArrastreModel.php");

        return new ArrastreModel($database);
    }

    public static function getArrastreController()
    {
        $render = self::getRender();
        $arrastreModel = self::getArrastreModel();

        include_once("controller/ArrastreController.php");
        return new ArrastreController($render, $arrastreModel);
    }

    public static function getMantenimientoModel(){

        $database = self::getDatabase();

        include_once ("model/MantenimientoModel.php");

        return new MantenimientoModel($database);
    }

    public static function getMantenimientoController()
    {
        $render = self::getRender();
        $MantenimientoModel = self::getMantenimientoModel();
        $camionModel = self::getCamionModel();

        include_once("controller/MantenimientoController.php");
        return new MantenimientoController($render, $MantenimientoModel,$camionModel);
    }

    public static function getFacturaModel(){

        $database = self::getDatabase();

        include_once ("model/FacturaModel.php");

        return new FacturaModel($database);
    }

    public static function getFacturaController()
    {
        $render = self::getRender();
        $FacturaModel = self::getFacturaModel();

        include_once("controller/FacturaController.php");
        return new FacturaController($render, $FacturaModel);
    }

    public static function getViajeModel(){

        $database = self::getDatabase();

        include_once ("model/ViajeModel.php");

        return new ViajeModel($database);
    }

    public static function getViajeController()
    {
        $render = self::getRender();
        $viajeModel = self::getViajeModel();


        include_once("controller/ViajeController.php");
        return new ViajeController($render, $viajeModel);
    }

    public static function getPosicionModel(){

        $database = self::getDatabase();

        include_once ("model/PosicionModel.php");

        return new PosicionModel($database);
    }

    public static function getPosicionController()
    {
        $render = self::getRender();
        $PosicionModel = self::getPosicionModel();
        $viajeModel = self::getViajeModel();

        include_once("controller/PosicionController.php");
        return new PosicionController($render, $PosicionModel,$viajeModel);
    }

    public static function getQRModel(){
        $database = self::getDatabase();
        include_once ("model/QRModel.php");
        return new QRModel($database);
    }

    public static function getProformaModel(){
        $database = self::getDatabase();
        include_once ("model/ProformaModel.php");
        return new ProformaModel($database);
    }

    public static function getProformaController()
    {
        $render = self::getRender();
        $proformaModel = self::getProformaModel();
        $qrModel = self::getQRModel();
        $posicionModel = self::getPosicionModel();
        include_once("controller/ProformaController.php");
        return new ProformaController($render, $proformaModel,$qrModel,$posicionModel);
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