 <?

    class Conexion {
        public function conectar() {
            $link = new POD("mysql:host=localhost;dbname=pos","root","");

            #Para permitir caracteres en latinos
            $link->exec("set names utf8");

            return $link;
        }
    }