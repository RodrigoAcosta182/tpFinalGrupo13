<?php
class ClienteController
{

    private $clienteModel;
    private $render;

    public function __construct(\Render $render, \ClienteModel $clienteModel)
    {
        $this->render = $render;
        $this->clienteModel = $clienteModel;
    }

    public function execute()
    {
        $clientes["clientes"] = $this->clienteModel->listarClientes();
        echo $this->render->renderizar("view/cliente.mustache", $clientes);
    }

    public function modificarCliente()
    {
        echo $this->render->renderizar("view/modificarCliente.mustache");
    }

    public function altaCliente()
    {
        echo $this->render->renderizar("view/altaCliente.mustache");
    }
}