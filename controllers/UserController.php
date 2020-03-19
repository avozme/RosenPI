<?php
include("views/view.php");
include("models/user.php");
include("models/security.php");

class ControllerUser{

    protected $user;

    public function __construct(){
        $this->user = new User();
        $this->security = new Security();
    }

    public function main(){
        if (isset($_REQUEST["do"])){
            $do = $_REQUEST["do"];
        }else {
            $do = "showForLoging";
        }
        $this->$do();
    }

    private function showForLoging(){
        
        $data["mensaje"] = ((isset($_REQUEST["mensaje"])) ? $_REQUEST["mensaje"] : null);
        View::show("forLoging", $data);
    }

    private function checkForLoging(){
        $nombre = $_REQUEST['nombre'];
        $passwd = $_REQUEST['passwd'];
        $user = $this->user->getForUser($nombre, $passwd);

        if ($user != null) {
            $this->security->openSession( ["id"=>$user->idUsuario, "tipo"=>$user->tipo] );
            View::redirect("mainMenu");
        } else {
            View::redirect("showForLoging");
        }
    }

    private function mainMenu(){

        if ($this->security->get("tipo") == 0) {
            // usuario 0 (usuario admin)
            echo "Menu de Administrador";
            $data["usersList"] = $this->user->getAll();
            $data["tipo"] = $this->security->get("tipo");
            View::show("menuUser0", $data);
        } else if ($this->security->get("tipo") == 1) {
            // usuario 1 (usuario normal)
            echo "Menu de Usuario";
            $data["usersList"] = $this->user->get($this->security->get("id"));
            $data["tipo"] = $this->security->get("tipo");
            View::show("menuUser0", $data);
        } else {
            // desconocido o no se ha hecho login
            View::redirect("showForLoging", $data);
        }
    }

    //cerrar sesion
    private function closeSession(){

        $this->security->closeSession();
        $data["mensaje"] = "Sesión cerrada con éxito";
        View::redirect("showForLoging", $data);
    }

    //formulario nuevo usuario
    private function formCreateUser(){

        if ($this->security->get("tipo") == 0) {
            $data["userType"] = 0;
        } else {
            $data["userType"] = 1;
        }
        View::show("newUser", $data);
    }

    //chekea los usuarios creados
    private function createUser(){

        $id = $data["id"];
        $nick = $data["nick"];
        $email = $data["email"];
        $passwd = $data["passwd"];
        $type = $data["type"];
       
        if (isset($_REQUEST['tipo'])) {
            $data['tipo'] = $_REQUEST['tipo'];
        } else {
            $data['tipo'] = 1;
        }

        var_dump($data);
        $resultInsert = $this->user->insert($data);
        $data = null;
        
        if ($resultInsert == 1) {
            View::redirect("showForLoging", $data);
        } else{
            View::redirect("formCreateUser", $data);
        }
    }

    //borrar usuario
    private function deleteUser() {
        if ($this->security->get("tipo") == 0) {
            $resultDelete = $this->user->delete($_REQUEST['id']);
            if ($resultDelete) {
                View::redirect("mainMenu", $data);
            } else {
                $data["mensaje"] = "Error al borrar";
            }
        } else {
            View::redirect("showForLoging");
        }
    }

    //modificar usuarios
    private function formUpdateUser() {
        $id = $data["id"];
        $nick = $data["nick"];
        $email = $data["email"];
        $passwd = $data["passwd"];
        $type = $data["type"];
        View::show("editUser", $data);
    }

    private function updateUser(){
        $id = $data["id"];
        $nick = $data["nick"];
        $email = $data["email"];
        $passwd = $data["passwd"];
        $type = $data["type"];

        if($this->security->get("tipo") == 0 || $this->security->get("id") == $_REQUEST['id']){
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

    //error
    private function error() {
        View::error();
    }
}