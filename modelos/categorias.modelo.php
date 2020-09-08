<?php

    require_once "conexion.php";

    class ModeloCategorias {

        /**
         * todo CREAR CATEGORIAS
         */

         static public function mdlIngresarCategoria($tabla, $datos) {

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES(:categoria)");

            $stmt -> bindParam(":categoria", $datos, PDO::PARAM_STR);

            return ($stmt->execute()) ? "ok" : "error";

         }
    }