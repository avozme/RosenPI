<h2>Regristro de usuarios</h2>
<?php
    echo "<form action ='index.php' method='get'>";
        echo "Nombre:<br> <input type='text' name='name'><br>";
        echo "Contraseña:<br> <input type='password' name='password'><br>";
        echo "Repetir Contraseña:<br> <input type='password' name='password2'><br>";
        echo "Imagen:<br> <input type='file' name='image'><br>";
        /*echo "<form action='index.php' enctype='multipart/form-data' method='post'>";
            echo "Imagen:<br> <input type='file' name= 'image'>";
            echo "<input type= 'submit' value= 'Subir imagen'>";
        echo "</form><br>";*/
        echo "Tipo:<br>";
        echo "<select name='type'>
                <option value='0'>Pendiente de seleccion</option>
                <option value='1'>Administrador</option>
                <option value='3'>Profesor</option>
            </select><br><br>";
        echo "<input type='hidden' name='do' value='createUser'>";
        echo "<input type='submit' value='Aceptar'>";
    echo "</form>";