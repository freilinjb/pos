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

				if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {

					$_SESSION["iniciarSesion"] = "ok";

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
}
