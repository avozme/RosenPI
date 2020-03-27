<?php
    include_once("models/activity.php");

    // Esta clase se utiliza como controlador de la tabla de actividades.
    // Controla el CRUD de la tabla de actividades.
    class ActivityController {
        // Rosendo, te dejo la clase preparada para ir rellenando el código de las funciones.
        // Fíjate en que son las mismas 7 funciones que utiliza Laravel, solo que en Laravel
        // se crean solas y sin framework tenemos que crearlas a mano.
        
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

        // Mostrar todas las actividades existentes
        public function index() {
            echo "Este es el index de ActivityController<br>";
        }

        // Mostrar solo una actividad
        public function show($activity_id) {

        }


        // Mostrar el formulario de nueva actividad
        public function create() {

        } 

        // Almacenar en la BD una nueva actividad
        public function store() {

        }

        // Mostrar el formulario de edición de una actividad existente
        public function edit($activity_id) {

        }

        // Almacenar en la BD los cambios sobre una actividad existente
        public function update() {

        }

        // Eliminar una actividad de la BD
        public function destroy($activity_id) {

        }
    }