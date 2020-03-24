<?php
include("views/view.php");
include("models/user.php");
include("models/security.php");

class UserController{

    protected $user;

    public function __construct(){
        $this->user = new User();
        $this->security = new Security();
    }

    public function main(){
        if (isset($_REQUEST["do"])){
            $do = $_REQUEST["do"];
        }else {
            $do = "showForLogin";
        }
        $this->$do();
    }

    private function showForLogin(){
        
        $data["mensaje"] = ((isset($_REQUEST["mensaje"])) ? $_REQUEST["mensaje"] : null);
        View::show("createUser", $data);
    }

    private function checkForLogin(){
        $name = $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $image = $_REQUEST['image'];
        $type = $_REQUEST['type'];
        $user = $this->user->getForUser($name, $password, $image, $type);

        if ($user != null) {
            $this->security->openSession( ["id"=>$user->idUsuario, "type"=>$user->type] );
            View::redirect("mainMenu");
        } else {
            View::redirect("showForLogin");
        }
    }

    private function mainMenu(){

        if ($this->security->get("type") == 1 || $this->security->get("type") == 2) {
            // usuario 1 y 2 (usuario admin y profesor)
            echo "Menu de Administrador";
            $data["usersList"] = $this->user->getAll();
            $data["type"] = $this->security->get("type");
            View::show("indexUser", $data);
        } else if ($this->security->get("type") == 0) {
            // usuario 0 (usuario normal)
            echo "Menu de Usuario";
            $data["usersList"] = $this->user->get($this->security->get("id"));
            $data["type"] = $this->security->get("type");
            View::show("indexUser", $data);
        } else {
            // desconocido o no se ha hecho login
            View::redirect("showForLogin", $data);
        }

        View::show("indexUser", $data);
    }

    //cerrar sesion
    private function closeSession(){

        $this->security->closeSession();
        $data["mensaje"] = "Sesión cerrada con éxito";
        View::redirect("showForLogin", $data);
    }

    //formulario nuevo usuario
    private function formCreateUser(){

        if ($this->security->get("type") == 0) {
            $data["userType"] = 0;
        } else {
            $data["userType"] = 1;
        } else {
            $data["userType"] = 2;
        }
        View::show("newUser", $data);
    }

    //chekea los usuarios creados
    private function createUser(){

        $name = $_REQUEST["name"];
        $password = $_REQUEST["password"];
        $image = $_REQUEST["image"];
        $type = $_REQUEST["type"];
       
        if (isset($_REQUEST['type'])) {
            $data['type'] = $_REQUEST['type'];
        } else {
            $data['type'] = 1;
        }

        $resultInsert = $this->user->insert($data);
        $data = null;
        
        if ($resultInsert == 1) {
            View::redirect("showForLogin", $data);
        } else{
            View::redirect("newUser", $data);
        }
    }

    //borrar usuario
    private function deleteUser() {
        if ($this->security->get("type") == 0) {
            $resultDelete = $this->user->delete($_REQUEST['id']);
            if ($resultDelete) {
                View::redirect("mainMenu", $data);
            } else {
                $data["mensaje"] = "Error al borrar";
            }
        } else {
            View::redirect("showForLogin");
        }
    }

    //modificar usuarios
    private function formUpdateUser() {
        $id = $data["id"];
        $name = $data["name"];
        $passwd = $data["passwd"];
        $type = $data["type"];
        View::show("editUser", $data);
    }

    private function updateUser(){
        $id = $data["id"];
        $name = $data["name"];
        $passwd = $data["passwd"];
        $type = $data["type"];

        if($this->security->get("type") == 0 || $this->security->get("id") == $_REQUEST['id']){
            $resultUpdate = $this->user->update($data);
            if($resultUpdate){
                View::redirect("mainMenu", $data);
            } else {
                $data["mensaje"] = "No se pudo modificar";
                View::redirect("mainMenu", $data);
            }
        }else {
            View::redirect("mainMenu");
        }
    }
}