<?php
include_once("controllers/LoginController.php");
include_once("controllers/UserController.php");
include_once("controllers/ActivityController.php");
include_once("controllers/MenuController.php");
// Añadir aquí un include para cada controlador que se vaya creando

// Esta clase es el controlador primario.
// Se limita a instanciar otro controlador y pasarle el control de la ejecución.
// El controlador que hay que instanciar se pasa por la URL.
class IndexController{

    function main(){
        // Miramos a ver qué controlador hay que instanciar según la variable $_REQUEST["controller"]
        if ($_REQUEST["controller"]) {
            $controller = $_REQUEST["controller"];
        } else {
            $controller = "LoginController";    // Controlador por defecto
        }
       
        // Instanciamos el controlador seleccionado y le pasamos el control a su función main()
        $c = new $controller();
        $c->main();
    }

}
