<?php

    require_once "conexion.php";

    class ModeloCategorias {

        /**
         * @todo CREAR CATEGORIAS
         */

         static public function mdlIngresarCategoria($tabla, $datos) {

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES(:categoria)");

            $stmt -> bindParam(":categoria", $datos, PDO::PARAM_STR);

            return ($stmt->execute()) ? "ok" : "error";

         }

        /**
         * @todo EDITAR CATEGORIAS
         */

        static public function mdlEditarCategoria($tabla, $datos) {

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");

            $stmt -> bindParam(":categoria", $datos['categoria'], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $datos['id'], PDO::PARAM_STR);

            return ($stmt->execute()) ? "ok" : "error";

         }

         /**
          * @todo MOSTRAR CATEGORIAS
          */
        static public function mdlMostrarCategorias($tabla, $item, $valor) {
            if($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetch();
            }
            else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

                $stmt -> execute();

                return $stmt -> fetchAll();
            }
        }   
    }