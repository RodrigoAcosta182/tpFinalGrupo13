<?php
//configuracion del proyecto
include_once("helpers/Configuracion.php");

session_start();
$configuration = new Configuracion();

$urlHelper = $configuration->getUrlHelper();
$module = $urlHelper->getModuleFromRequestOr("login");
$action = $urlHelper->getActionFromRequestOr("execute");


$router = $configuration->getRouter();
$router->executeActionFromModule($action, $module);




//$page = isset( $_GET['page'])? $_GET['page'] : "login" ;
//
//switch ($page){
//    case "login":
//        $loginController = Configuracion::getLoginController();
//        $loginController->renderLogin();
//        break;
//    case "inicio":
//        $inicioController = Configuracion::getInicioController();
//        $inicioController->renderInicio();
//        break;
//}





