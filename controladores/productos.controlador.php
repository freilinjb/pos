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

    /**
     * @todo REGISTRAR PRODUCTO
     *
     * @return string
     */
    static public function ctrCrearProducto() {

        if(isset($_POST['nuevaDescripcion'])) {
            print_r($_POST);
            if(true) {
                    
                $ruta = "vistas/img/productos/default/anonymous.php";

                $tabla = "productos";
                $datos = array("id_categoria" => $_POST['nuevaCategoria'],
                            "codigo" => $_POST['nuevoCodigo'],
                            "descripcion" => $_POST['nuevaDescripcion'],
                            "stock" => $_POST['nuevoStock'],
                            "PrecioCompra" => $_POST['nuevoPrecioCompra'],
                            "PrecioVenta" => $_POST['nuevoPrecioVenta'],
                            "imagen" => $ruta);
                
                $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

                if($respuesta == 'ok') {
                    echo '<script>

					swal({

						type: "success",
						title: "La categoria ha sido actualizada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
							window.location = "productos";
						}

					});
				</script>';
                }
                
            } else {
                echo '<script>

						swal({
	
							type: "error",
							title: "¡La producto no puede ir con los campos vacíos o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
	
						}).then(function(result){
	
							if(result.value){
								window.location = "productos";
							}
	
						});
					
	
					</script>';
            }
        }         
    }
}