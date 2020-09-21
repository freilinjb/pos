<?php

//Se carga el modelo y controlador porque el datatable dattable-producto 
//se dispara desde el archivo desde javascript
//

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class TablaProductosVentas {

    /**
    * @todo MOSTRAR LABLA DE PRODUCTOS
    */

    public function mostrarTablaProdutosVentas() {

        $item = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

        $datosJson = '{
            "data": [';

        $length = count($productos);

        #btn Eliminar se le agrega codigo y foto a la clase para 
        #identificarlo y poder cambiarlos

        for($i = 0; $i < $length; $i++) {

            #AGREGA LA IMAGEN
            $imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";
            #AGRERGA LOS BOTONES CON SUS ID DEL PRODUCTO
            $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]['id']."' codigo='".$productos[$i]['codigo']."' imagen='".$productos[$i]['imagen']."'><i class='fa fa-times'></i></button></div>";
            #STOCK
            $clase = null;
            if($productos[$i]["stock"] <= 10) {
                $clase = "danger";

            } else if ($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){ 
                $clase = "warning";

            } else {
                $clase = "success";
            }
            $stock = "<span class='badge label-".$clase."'>".$productos[$i]["stock"]."</span>";
            
            /**
             * .recuperarBoton esta clase permitira inabilitar el producto 
             * que esten agregado a la lista
             */
            $botones = "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["id"]."'>Agregar</button></div>";
            #CONSTRULLE EL JSON PARA EL DATATABLE
            $datosJson .= '[
                "'.($i+1).'",
                "'.$imagen.'",
                "'.$productos[$i]["codigo"].'",
                "'.$productos[$i]["descripcion"].'",
                "'.$stock.'",
                "'.$productos[$i]["fecha"].'",
                "'.$botones.'"
            ],';
        }
        #El -1 elimina la comilla ',' que esta en el JSON 
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
            }';
          
        echo $datosJson;
    }
}

/**
 * @todo ACTIVAR LA TABLA DE PRODUCTOS
 */
 $activarProductos = new TablaProductosVentas();
 $activarProductos -> mostrarTablaProdutosVentas();
