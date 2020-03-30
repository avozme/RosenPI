<?php
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

            $name = $_REQUEST['name'];
            $password = $_REQUEST['password'];
            $user = $this->user->findUser($name, $password);

            if($user == "" or $user == null){
                View::redirect('loginController', 'show');
            }else{
                View::redirect('UserController', 'show');
            }
        }

        // Mostrar solo un usuario
        public function show($user_id) {
            $name = $_REQUEST['name'];
            $password = $_REQUEST['password'];
            $user = $this->user->findUser($name, $password);

            if ($user != null) {
                $users[0] = $user;
            } else {
                $users = null;
            }
            View::show("user/index");
        }

        // Mostrar el formulario de nuevo usuario
        public function create() {
            $id = $data["id"];
            $name = $name["name"];
            $passwd = $data["passwd"];
            $type = $data["type"];
        
            if (isset($_REQUEST['type'])) {
                $data['type'] = $_REQUEST['type'];
            } else {
                $data['type'] = 1;
            }

            $resultInsert = $this->user->insert($data);
            $data = null;
            
            if ($resultInsert == 1) {
                View::redirect('loginController', 'checkLogin');
            } else{
                View::redirect("UserController", 'index');
            }
        } 

        // Almacenar en la BD un nuevo usuario
        public function store() {
            User::create([
                'name' => $u['name'],
                'password' => $u['password'],
                'type' => $u['type'],
            ]);
            View::show("user/index");
        }

        // Mostrar el formulario de edición de un usuario existente
        public function edit($user_id) {
            $id = $data["id"];
            $name = $name["name"];
            $password = $data["password"];
            $type = $data["type"];
            View::show("user/edit");
        }

        // Almacenar en la BD los cambios sobre un usuario existente
        public function update() {
            $id = $data["id"];
            $name = $name["name"];
            $password = $data["password"];
            $type = $data["type"];

            if($user->type == 1 || $user->id == $_REQUEST['id']){
                $resultUpdate = $this->user->update($data);
                if($resultUpdate){
                    View::redirect("mainMenu", $data);
                } else {
                    echo "No se pudo modificar";
                    View::redirect("mainMenu", $data);
                }
            }else {
                View::redirect("mainMenu");
            }
        }

        // Eliminar un usuario de la BD
        public function destroy($user_id) {
            if ($user->type == 0) {
                $resultDelete = $this->user->delete($_REQUEST['id']);
                if ($resultDelete) {
                    View::redirect("mainMenu", $data);
                } else {
                    echo "Error al borrar";
                }
            } else {
                View::redirect("showForLoging");
            }
        }        
 
}    