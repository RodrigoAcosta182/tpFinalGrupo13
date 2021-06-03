<?php
//configuracion del proyecto
include_once("helpers/Configuracion.php");
session_start();

$page = isset( $_GET['page'])? $_GET['page'] : "login" ;

switch ($page){
    case "login":
        $loginController = Configuracion::getLoginController();
        $loginController->renderLogin();
        break;
    case "inicio":
        $inicioController = Configuracion::getInicioController();
        $inicioController->renderInicio();
        break;
}


