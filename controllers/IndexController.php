<?php
include("views/view.php");
include("models/security.php");

class IndexController{

    function main(){
       
        View::show("vistaIndex");
    }
}