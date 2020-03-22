<?php
include("views/view.php");
include("models/security.php");

class IndexController{

    private function main(){
       
        View::show("vistaIndex");
    }

   /* //cerrar sesion
    private function closeSession(){

        $this->security->closeSession();
        $data["mensaje"] = "Sesión cerrada con éxito";
        View::redirect("showForLogin", $data);
    }*/

}