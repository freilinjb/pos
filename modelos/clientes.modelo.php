<?php

require_once "conexion.php";

class ModeloClientes {

    static public function mdlIngresarCliente($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, documento, email, telefono, direccion, fecha_nacimiento)
            VALUES(:nombre, :documento, :email, :telefono, :direccion, :fecha_nacimiento)");

        $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos['documento'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datos['fecha_nacimiento'], PDO::PARAM_STR);

        return ($stmt->execute()) ? "ok" : "error";
    }

    static public function mdlMostrarClientes($tabla ,$item, $valor) {
        if($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
}