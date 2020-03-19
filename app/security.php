<?php
    class Security {
        public function __construct() {
            session_start();
        }

        /**
         * Abre la sesión
         * @param array $vars Lista de variables de sesión que hay que crear
         */
        public function openSession($vars) {
            foreach($vars as $var=>$value) {
                $_SESSION[$var] = $value;
            }
        }

        /**
         * Cierra la sesión
         */
        public function closeSession() {
            session_destroy();
        }

        /**
         * Devuelve el valor de una variable de sesión
         * @param String $var Nombre de la variable
         * @return El valor de la variable de sesión o -1 si la variable no existe
         */
        public function get($var) {
            if (isset($_SESSION[$var]))
                return $_SESSION[$var];
            else   
                return -1;
        }
    }