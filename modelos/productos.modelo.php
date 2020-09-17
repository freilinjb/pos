<?php

require_once "conexion.php";

class ModeloProductos {
    
    static public function mdlMostrarProductos($tabla, $item, $valor) {

        if($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();
            return $stmt->fetch();

        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlIngresarProducto($tabla, $datos) {


        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta)
            VALUES(:id_categoria, :codigo, :descripcion, :imagen, :stock, :precio_compra, :precio_venta)");

        $stmt->bindParam(":id_categoria", $datos['id_categoria'],PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos['codigo'],PDO::PARAM_INT);
        $stmt->bindParam(":descripcion", $datos['descripcion'],PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos['imagen'],PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos['stock'],PDO::PARAM_INT);
        $stmt->bindParam(":precio_compra", $datos['PrecioCompra'],PDO::PARAM_INT);
        $stmt->bindParam(":precio_venta", $datos['PrecioVenta'],PDO::PARAM_INT);
        
        if($stmt->execute()) {
            return "ok";
        } else return "error";
    }
}