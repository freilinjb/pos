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
        
        print_r($productos);
        
        return;

        $imagen = "<img src='vistas/img/usuarios/juanmt/126.png' width='40px'>";
        $botones =  "<div class='btn-group'><button class='btn btn-warning'><i class='fa fa-pencil'></i></button><button class='btn btn-danger'><i class='fa fa-times'></i></button></div>";        

            echo '{
                "data": [
                  [
                    "Tiger Nixon",
                    "System Architect",
                    "'.$imagen.'",
                    "5421",
                    "2011/04/25",
                    "'.$botones.'"
                  ],
                  [
                    "Garrett Winters",
                    "Accountant",
                    "'.$imagen.'",
                    "8422",
                    "2011/07/25",
                    "'.$botones.'"
                  ]
                ]
              }';
    }
}

/**
 * @todo ACTIVAR LA TABLA DE PRODUCTOS
 */
 $activarProductos = new TablaProductos();
 $activarProductos -> mostrarTablaProdutos();
