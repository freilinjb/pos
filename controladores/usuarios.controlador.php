<?php

class ControladorUsuarios
{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	public function ctrIngresoUsuario()
	{

		if (isset($_POST["ingUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
			) {

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
				echo "respuesta: ".strlen($respuesta['password']);
				echo "encriptada: ".strlen($encriptar);
				if($respuesta['password'] == $encriptar) {
					echo 'iguales';
				}

				if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {

					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["id"] = $respuesta['id'];
					$_SESSION["nombre"] = $respuesta['nombre'];
					$_SESSION["usuario"] = $respuesta['usuario'];
					$_SESSION["foto"] = $respuesta['foto'];
					$_SESSION["perfil"] = $respuesta['perfil'];

					echo '<script>

						window.location = "inicio";

					</script>';
				} else {

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}
			}
		}
	}

	//Regustri de usuario
	static public function ctrCrearUsuario()
	{
		// var_dump($_POST);

		if (isset($_POST['nuevoUsuario'])) {

			if(isset($_POST['nuevoUsuario'])){

				//VALIDAR IMAGEN
				if(isset($_FILES['nuevaFoto']['tmp_name'])) {
					//Crear nuevo array
					list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
					
					//Redimencionar
					$nuevoAncho = 500;
					$nuevoAlto = 500;

					$foto = "";

					$directorio = 'vistas/img/usuarios/'.$_POST['nuevoUsuario'];
					
					//0755 permiso de lectura y estricura
					mkdir($directorio, 0755);

					/**
					 * De acuerdo al tipo de imagen aplicamos las funciones por defecto
					 * de PHP
					 */

					 if($_FILES['nuevaFoto']['type'] == 'image/jpeg') {
						 /**
						  * Guardar la imagen em el directorio
						  */

						  $aleatorio = mt_rand(100,999);

						  $foto = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
  
						  $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						
  
						  $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
  
						  imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
  
						  imagejpeg($destino, $foto);
					 }

					 if($_FILES['nuevaFoto']['type'] == 'image/png') {
						/**
						 * Guardar la imagen em el directorio
						 */

						 $aleatorio = mt_rand(100,999);

						 $foto = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
 
						 $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						
 
						 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
 
						 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
 
						 imagepng($destino, $foto);
					}

				}


				$tabla = "usuarios";

				$encriptar = crypt($_POST['nuevoPassword'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("nombre"=> $_POST['nuevoNombre'],
								"usuario"=> $_POST['nuevoUsuario'],
								"password"=> $encriptar,
								"perfil"=> $_POST['nuevoPerfil'],
								"foto" => $foto);

				// var_dump($datos);
				#Enviar los datos al modelo
				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				if($respuesta == "ok") {
					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then(function(result){

						if(result.value){
						
							// window.location = "usuarios";

						}

					});
				

				</script>';
				}

			} 
			else {
				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							// window.location = "usuarios";

						}

					});
				

				</script>';
			}
			$_POST = null;
		}
	}
	static public function ctrMostrarUsuarios($item, $valor) {
		
		$tabla = "usuarios";
		
		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrEditarUsuario() {

        if (isset($_POST['editarUsuario'])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {
				
				//VALIDAR IMAGEN
				$ruta = $_POST['fotoActual'];
				
				//Evitamos que nos borre el archivo si esta bacio
				if(isset($_FILES['editarFoto']['tmp_name']) && !empty($_FILES['editarFoto']['tmp_name'])) {
					//Crear nuevo array
					list($ancho, $alto) = getimagesize($_FILES['editarFoto']['tmp_name']);
					
					//Redimencionar
					$nuevoAncho = 500;
					$nuevoAlto = 500;

					$directorio = 'vistas/img/usuarios/'.$_POST['editarUsuario'];
					
					//PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					if(!empty($_POST['fotoActual'])) {
						//Elimina la foto que existe en el servidor
						unlink($_POST['fotoActual']);
					} else {
						//Crea la carpeta del usuario
						mkdir($directorio, 0755);
					}

					/**
					 * De acuerdo al tipo de imagen aplicamos las funciones por defecto
					 * de PHP
					 */

					 if($_FILES['editarFoto']['type'] == 'image/jpeg') {
						 /**
						  * Guardar la imagen em el directorio
						  */

						  $aleatorio = mt_rand(100,999);

						  $ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
  
						  $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						
  
						  $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
  
						  imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
  
						  imagejpeg($destino, $ruta);
					 }

					 if($_FILES['editarFoto']['type'] == 'image/png') {
						/**
						 * Guardar la imagen em el directorio
						 */

						 $aleatorio = mt_rand(100,999);

						 $ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";
 
						 $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						
 
						 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
 
						 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
 
						 imagepng($destino, $ruta);
					}

				}
				$tabla = "usuarios";

				if($_POST['editarPassword'] != '') {

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['editarPassword'])) {
						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					} else {
						echo '<script>

						swal({
	
							type: "error",
							title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
	
						}).then(function(result){
	
							if(result.value){
								window.location = "usuarios";
							}
	
						});
					
	
					</script>';
					}
				} else {
					$encriptar = $_POST['passwordActual'];
				}

				$datos = array('nombre'=> $_POST['editarNombre'],
							   'usuario'=> $_POST['editarUsuario'],
							   'password'=> $encriptar,
							   'perfil'=> $_POST['editarPerfil'],
							   'foto'=> $ruta);
			
				var_dump($datos);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if($respuesta == 'ok') {
					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then(function(result){

						if(result.value){
						
							// window.location = "usuarios";

						}

					});
				

				</script>';
				}
            } else {
				echo '<script>

					swal({

						type: "error",
						title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';
			}
        }
    }
}
