<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes {

    public $idCliente;

    public function ajaxEditarCliente() {

        $item = "id";
        $valor = $this->idCliente;

        $respuesta = ControladorCliente::ctrMostrarClientes($item, $valor);

        echo json_encode($respuesta);
    }
}

if(isset($_POST['idCliente'])) {
    $idCliente = new AjaxClientes();
    $idCliente -> idCliente = $_POST['idCliente'];
    $idCliente -> ajaxEditarCliente();
} 