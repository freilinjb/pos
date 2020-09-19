<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos {

    public $idCategoria;

    /**
     * @todo GENERAR CODIGO A PARTIR DEL ID CATEGORIA
     *
     * @return JSON
     */
    
    public function ajaxCrearCodigoProducto() {
        $item = "id_categoria";
        $valor = $this->idCategoria;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }

    /**
    * @todo EDITAR PRODUCTO
    */

    public $idProducto;

    public function ajaxEditarProducto() {
        $item = "id";
        $valor = $this->idProducto;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }
}


/**
 * @todo GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
 */
if(isset($_POST['idCategoria'])) {
    $codigoProducto = new AjaxProductos();
    $codigoProducto -> idCategoria = $_POST['idCategoria'];
    $codigoProducto -> ajaxCrearCodigoProducto();
}


/**
 * @todo GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
 */
if(isset($_POST['idProducto'])) {
    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST['idProducto'];
    $editarProducto -> ajaxEditarProducto();
}





