<!-- Formulario de login -->

<form action="index.php" method="GET">
    Usuario:
    <input type="text" name="name">
    <br>
    Password:
    <input type="text" name="password">
    <br>
    <input type="hidden" name="controller" value="loginController">
    <input type="hidden" name="do" value="checkLogin">
    <input type="submit" value="Enviar">
</form>
