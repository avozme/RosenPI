<h2>Modificar usuarios</h3>
<?php
    $user = $data["userData"];
    echo "<form action ='index.php' method='get'>";
        echo "<input type='hidden' name='id' value ='".$_REQUEST["id"]."'>";
        echo "Nombre:<br> <input type='text' name='name' value='".$data["name"]."'><br>";
        echo "Contraseña:<br> <input type='password' name='password1' value='".$data["password1"]."'><br>";
        echo "Repetir Contraseña:<br> <input type='password' name='password2' value='".$data["password2"]."'><br>";
        echo "Imagen:<br> <input type='file' name='image' value='".$data["image"]."'><br>";
        echo "Tipo:<br>";
        echo "<select name='tipo'>
                <option value='0'>Pendiente de seleccion</option>
                <option value='1'>Administrador</option>
                <option value='3'>Profesor</option>
            </select><br><br>";
        echo "<input type='hidden' name='do' value='updateUser'>";
        echo "<input type='submit' value='Modificar'><br>";
    echo "</form>";