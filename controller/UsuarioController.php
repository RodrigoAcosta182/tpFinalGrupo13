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
        $usuarios["usuarios"] = $this->usuarioModel->listarUsuario();
        echo $this->render->renderizar("view/usuario.mustache", $usuarios);
    }
}