<?php
    include_once("views/view.php");

    // Esta clase se utiliza para gestionar los menús de la aplicación    
    class MenuController {

        // La función main() es el punto de entrada al controlador. Mira el valor de la variable "do"
        // y redirige el flujo hacia alguna otra función.
        public function main(){
            if (isset($_REQUEST["do"])){
                $do = $_REQUEST["do"];
            }else {
                $do = "index";
            }
            $this->$do();
        }

        // Vista principal del panel de administración de la aplicación
        private function index(){
            View::show("admin/index");
        }

    }