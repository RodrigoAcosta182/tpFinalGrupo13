<?php
include_once("helpers/Configuracion.php");

session_start();
$configuration = new Configuracion();

$urlHelper = $configuration->getUrlHelper();
$module = $urlHelper->getModuleFromRequestOr("login");
$action = $urlHelper->getActionFromRequestOr("execute");

$router = $configuration->getRouter();
$router->executeActionFromModule($action, $module);


