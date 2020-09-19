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
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) ||
            preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
            preg_match('/^[0-9,.]+$/', $_POST["nuevoPrecioCompra"]) &&
            preg_match('/^[0-9,.]+$/', $_POST["nuevoPrecioVenta"])) {

                //VALIDAR IMAGEN
                $ruta = "vistas/img/productos/default/anonymous.png";
				//VALIDAR IMAGEN
				if(isset($_FILES['nuevaImagen']['tmp_name'])) {
					//Crear nuevo array
					list($ancho, $alto) = getimagesize($_FILES['nuevaImagen']['tmp_name']);
					
					//Redimencionar
					$nuevoAncho = 500;
					$nuevoAlto = 500;

					$directorio = 'vistas/img/productos/'.$_POST['nuevoCodigo'];
					
					//0755 permiso de lectura y estricura
					mkdir($directorio, 0755);

					/**
					 * De acuerdo al tipo de imagen aplicamos las funciones por defecto
					 * de PHP
					 */

					 if($_FILES['nuevaImagen']['type'] == 'image/jpeg') {
						 /**
						  * Guardar la imagen em el directorio
						  */

						  $aleatorio = mt_rand(100,999);

						  $ruta = "vistas/img/usuarios/".$_POST['nuevoCodigo']."/".$aleatorio.".jpg";
  
						  $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						
  
						  $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
  
						  imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
  
						  imagejpeg($destino, $ruta);
					 }

					 if($_FILES['nuevaImagen']['type'] == 'image/png') {
						/**
						 * Guardar la imagen em el directorio
						 */

						 $aleatorio = mt_rand(100,999);

						 $ruta = "vistas/img/productos/".$_POST['nuevoCodigo']."/".$aleatorio.".png";
 
						 $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						
 
						 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
 
						 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
 
						 imagepng($destino, $ruta);
					}

				}



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
						confirmButtonText: "Cerrar",

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