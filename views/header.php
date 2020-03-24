<?php
	include("models/config.php");
?>
<style type="text/css">

#button {
 padding: 0;
}

#button li {
 display: inline;
}
</style>

<html>
    <head>
        <ul id="button">
            <li><a href="">Clases</a></li>
            <li><a href="<?php echo Config::$baseUrl; ?>/index.php?controllers=IndexController&do=main">Inicio</a></li>
            <li><a href="<?php echo Config::$baseUrl; ?>/index.php?controllers=UserController&do=mainMenu">Usuarios</a></li>
        </ul>
        <style>
            #imagen { 
                background-image: url('imgs/index/inicio.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center; 
            }
            #cuerpo {
                width: 79%;
                float: left;
            }
            #nuevo {
                width: 19%;
                float: left;
            }
        </style>
    </head>
    <body>
        <h2>Titulo de prueba</h2>
