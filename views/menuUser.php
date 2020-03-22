<?php
$lista = $data["usersList"];

echo "<table border=1>";
echo "<tr>";
echo "<th colspan='9'>Lista de usuarios</th>";
echo "</tr>";
echo "<tr>";
    echo "<td>Imagen</td>";
    echo "<td>Nombre</td>";
    echo "<td>Tipo</td>";
    echo "<td  colspan='2'>Acciones</td>";
echo "</tr>";
foreach($lista as $fila) {

    if ($user->type == 0)
            $valor = "Pendiente de Asignación" 
    elseif($user->type == 1)  
            $valor = "Administrador" 
    elseif($user->type == 1)  
            $valor = "Profesor"
    endif

    echo "<tr>";
        echo "<td>$fila->image</td>";
        echo "<td>$fial->name</td>";
        echo "<td>$fila->tipo</td>";
        echo "<td>$valor</td>";
        if ($data["type"] == 1 || $data["type"] == 2) {
            echo "<td><a href='index.php?do=deleteUser&id=".$fila->idUsuario."'>Eliminar</a></td>";
            echo "<td><a href='index.php?do=formUpdateUser&id=$fila->idUsuario&name=$fila->name&password=$fila->password&image=$fila->imge&type=$fila->type'>Modificar</a></td>";
        }
    echo "</tr>";
}
echo "</table>";
?>
<br>
<form action ="index.php" method="get">
    <input type="hidden" name="do" value="formCreateUser">
    <input type="submit" value="Insertar usuario">
</form>

<?php
echo "<a href='index.php?do=closeSession'>Cerrar sesión</a><br>";