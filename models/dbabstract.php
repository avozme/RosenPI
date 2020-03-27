<?php
    include_once ("config.php");

    // Capa de abstracción de la base de datos 
    class DBAbstract {
        private $mysql;

        public function __construct() {
            echo Config::$dbHost."<br>";
            echo Config::$dbUser."<br>";
            echo Config::$dbPass."<br>";
            echo Config::$dbName."<br>";
            $this->mysql = new mysqli(Config::$dbHost, Config::$dbUser, Config::$dbPass, Config::$dbName);
        }

        /**
         * Lanza una sentencia SELECT contra la base de datos
         * @return Un array con el resultado de la consulta
         */
        public function sqlSelect($sql) {
            $result = $this->mysql->query($sql);
            $a = array();
            while ($row = $result->fetch_object()) {
                $a[] = $row;
            }
            return $a;
        }

        /**
         * Lanza una sentencia SQL (excepto SELECT) contra la base de datos
         * @return Número de registros afectados por la sentencia SQL
         */
        public function sqlOther($sql) {
            $this->mysql->query($sql);
            return $this->mysql->affected_rows;
        }
    }
