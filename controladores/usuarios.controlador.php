<?php

    class ControladorUsuarios {

        //Metodo de ingreso de usuario
        public function ctrIngresoUsuario() {
            if(isset($_POST['ingUsuario'])) {
                if(preg_match('^/[a-zA-Z-9]+$/', $_POST['ingUsuario']) && preg_match('^/[a-zA-Z-9]+$/', $_POST['ingPassword'])) {
                    $tabla = "usuarios";
                    $item = "usuario";
                    $valor = $_POST['ingUsuario'];

                    $respuesta = ModeloUsuario::MdlMostrarUsuarios($tabla,$item,$valor);

                    var_dump($respuesta);
                }
            }
        }
    }

?>