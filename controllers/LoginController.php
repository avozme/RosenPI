<?php
include_once("views/view.php");
include_once("models/user.php");

// Este controlador se utiliza para validar el login, iniciar la sesión y cerrar la sesión
class LoginController{

    protected $user;

    public function __construct(){
        $this->user = new User();
    }

    // La función main() es el punto de entrada al controlador. Mira el valor de la variable "do"
    // y redirige el flujo hacia alguna otra función.
    public function main(){
        if (isset($_REQUEST["do"])){
            $do = $_REQUEST["do"];
        }else {
            $do = "show";
        }
        $this->$do();
    }

    // Muestra el formulario de login
    private function show(){
        View::show("login/show");
    }

    // Procesa el formulario de login
    private function checkLogin(){
        $name = $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $user = $this->user->findUser($name, $password);

        if ($user != null) {
            View::redirect("MenuController","index");
        } else {
            View::redirect("loginController","show");
        }
    }

}