<?php

//Se carga el modelo y controlador porque el datatable dattable-producto 
//se dispara desde el archivo desde javascript
//

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaProductos {

    /**
    * @todo MOSTRAR LABLA DE PRODUCTOS
    */

    public function mostrarTablaProdutos() {

        $item = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

        $botones =  "<div class='btn-group'><button class='btn btn-warning'><i class='fa fa-pencil'></i></button><button class='btn btn-danger'><i class='fa fa-times'></i></button></div>";        

        
        // print_r($productos);

        $datosJson = '{
            "data": [';

        $length = count($productos);

        for($i = 0; $i < $length; $i++) {

            $imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";

            $datosJson .= '[
                "'.($i+1).'",
                "'.$imagen.'",
                "'.$productos[$i]["codigo"].'",
                "'.$productos[$i]["descripcion"].'",
                "Taladros",
                "'.$productos[$i]["stock"].'",
                "'.$productos[$i]["precio_compra"].'",
                "'.$productos[$i]["precio_venta"].'",
                "'.$productos[$i]["fecha"].'",
                "'.$botones.'"
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
            }';
          
        echo $datosJson;
    }
}

/**
 * @todo ACTIVAR LA TABLA DE PRODUCTOS
 */
 $activarProductos = new TablaProductos();
 $activarProductos -> mostrarTablaProdutos();
