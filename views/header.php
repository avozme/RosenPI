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
            <li><a href="">Inicio</a></li>
            <li><a href="<?php echo Config::$baseUrl; ?>/index.php?controller=UserController&do=main">Usuarios</a></li>
        </ul>
    </head>
    <body>
        <h2>Titulo de prueba</h2>
