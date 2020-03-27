<?php
	include_once("models/config.php");
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
            <li><a href="<?php echo Config::$baseUrl; ?>/index.php?controller=MenuController&do=index">Inicio</a></li>
            <li><a href="<?php echo Config::$baseUrl; ?>/index.php?controller=ActivityController&do=index">Clases</a></li>
            <li><a href="<?php echo Config::$baseUrl; ?>/index.php?controller=UserController&do=index">Usuarios</a></li>
        </ul>
        <style>
            #imagen { 
                background-image: url('imgs/index/inicio.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center; 
                width: 100%;
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
