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

    /**
     * @todo EDITAR PRODUCTO [COPIADO Y EDITADO DE AGRERGAR PRODUCTO]
     */

    static public function ctrEditarProducto() {

        if(isset($_POST['editarDescripcion'])) {
            print_r($_POST);
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) ||
            preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&
            preg_match('/^[0-9,.]+$/', $_POST["editarPrecioCompra"]) &&
            preg_match('/^[0-9,.]+$/', $_POST["editarPrecioVenta"])) {

                //VALIDAR IMAGEN
                $ruta = $_POST['imagenActual'];
				//VALIDAR IMAGEN
				if(isset($_FILES['editarImagen']['tmp_name']) && !empty($_FILES['editarImagen']['tmp_name'])) {
					//Crear nuevo array
					list($ancho, $alto) = getimagesize($_FILES['editarImagen']['tmp_name']);
					
					//Redimencionar
					$nuevoAncho = 500;
					$nuevoAlto = 500;

                    $directorio = 'vistas/img/productos/'.$_POST['editarCodigo'];
                    
                    /**
                     * PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN EL DB
                     */
                    if(!empty($_POST['imagenActual']) && $_POST['imagenActual'] != 'vistas/img/productos/default/anonymous.png') {

                        //borrar si la foto actual
                        unlink($_POST['imagenActual']);
                    } else {
                        //0755 permiso de lectura y estricura
					    mkdir($directorio, 0755);
                    }
					
					/**
					 * De acuerdo al tipo de imagen aplicamos las funciones por defecto
					 * de PHP
					 */

					 if($_FILES['editarImagen']['type'] == 'image/jpeg') {
						 /**
						  * Guardar la imagen em el directorio
						  */

						  $aleatorio = mt_rand(100,999);

						  $ruta = "vistas/img/usuarios/".$_POST[' editarCodigo']."/".$aleatorio.".jpg";
  
						  $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						
  
						  $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
  
						  imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
  
						  imagejpeg($destino, $ruta);
					 }

					 if($_FILES['editarImagen']['type'] == 'image/png') {
						/**
						 * Guardar la imagen em el directorio
						 */

						 $aleatorio = mt_rand(100,999);

						 $ruta = "vistas/img/productos/".$_POST['editarCodigo']."/".$aleatorio.".png";
 
						 $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						
 
						 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
 
						 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
 
						 imagepng($destino, $ruta);
					}

				}



                $tabla = "productos";
                $datos = array("id_categoria" => $_POST['editarCategoria'],
                            "codigo" => $_POST['editarCodigo'],
                            "descripcion" => $_POST['editarDescripcion'],
                            "stock" => $_POST['editarStock'],
                            "PrecioCompra" => $_POST['editarPrecioCompra'],
                            "PrecioVenta" => $_POST['editarPrecioVenta'],
                            "imagen" => $ruta);
                
                $respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

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