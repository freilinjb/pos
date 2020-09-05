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
					var_dump($_FILES['nuevaFoto']['tmp_name']);

				}


				$tabla = "usuarios";

				$datos = array("nombre"=> $_POST['nuevoNombre'],
								"usuario"=> $_POST['nuevoUsuario'],
								"password"=> $_POST['nuevoPassword'],
								"perfil"=> $_POST['nuevoPerfil']);

				// var_dump($datos);
				#Enviar los datos al modelo
				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				// if($respuesta == "ok") {
				// 	echo '<script>

				// 	swal({

				// 		type: "success",
				// 		title: "¡El usuario ha sido guardado correctamente!",
				// 		showConfirmButton: true,
				// 		confirmButtonText: "Cerrar",
				// 		closeOnConfirm: false

				// 	}).then(function(result){

				// 		if(result.value){
						
				// 			// window.location = "usuarios";

				// 		}

				// 	});
				

				// </script>';
				// }

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
