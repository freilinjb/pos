 <?php

    class Conexion {

        static public function conectar() {
            
            $link = new PDO("mysql:host=localhost;dbname=pos","root","");

            //Para permitir caracteres en latinos
            $link->exec("set names utf8");

            return $link;
        }
    }