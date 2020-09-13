<?php

class ControladorProductos {

    /**
     * @todo MOSTRAR PRODUCTOS
     */
    static public function ctrMostrarProductos($item, $valor) {
        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;
    }
}