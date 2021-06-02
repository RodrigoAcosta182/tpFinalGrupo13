<?php


class LoginController
{

    private $render;

    public function __construct(\Render $render)
    {
        $this->render = $render;
    }

    public function renderLogin()
    {
        echo $this->render->renderizar("view/login.mustache");
    }
}