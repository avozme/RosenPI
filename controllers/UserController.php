<?
    include_once("models/user.php"); 

    // Controlador de usuario.
    // Esta clase se utilizar para hacer el CRUD de la tabla de usuarios

    // (Rosendo: te dejo la clase preparada, con todas sus funciones, pero sin código,
    // para que tú escribas el código. LUEGO BORRA ESTE COMENTARIO)
    class UserController {

        private $user = null;               // Modelo User

        public function __construct() {
            $this->user = new User();       // Instanciamos un modelo User para poder usarlo en toda la clase
        }

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

        // Mostrar todos los usuarios existentes
        public function index() {
            echo "Este es el index de UserController<br>";
        }

        // Mostrar solo un usuario
        public function show($user_id) {

        }

        // Mostrar el formulario de nuevo usuario
        public function create() {

        } 

        // Almacenar en la BD un nuevo usuario
        public function store() {

        }

        // Mostrar el formulario de edición de un usuario existente
        public function edit($user_id) {

        }

        // Almacenar en la BD los cambios sobre un usuario existente
        public function update() {

        }

        // Eliminar un usuario de la BD
        public function destroy($user_id) {

        }        
 
}    