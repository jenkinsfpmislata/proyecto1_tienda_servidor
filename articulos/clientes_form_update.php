<?php
    $idCliente = $_POST["id"];

    $db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error());
    mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

    $SQL = "SELECT * from clientes where idCliente = $idCliente";
    $result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
    $fila = mysql_fetch_array($result,MYSQL_ASSOC);
    ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    </head>
    <body>
        <h3>Modifica el cliente</h3>
        <form name='update' action='clientes_update.php' method='POST'> 
            Id: <input type='text' name='idCliente' value='<?=$fila["idCliente"]?>' readonly><br>
            Nombre: <input type='text' name='nombre' value='<?=$fila["nombre"]?>'><br>
            Apellido1: <input type='text' name='apellido1' value='<?=$fila["apellido1"]?>'><br>
            Apellido2: <input type='text' name='apellido2' value='<?=$fila["apellido2"]?>'><br>
            Telefono: <input type='text' name='telefono' value='<?=$fila["telefono"]?>'><br>
            Direccion: <input type='text' name='direccion' value='<?=$fila["direccion"]?>'><br>
            Email: <input type='text' name='email' value='<?=$fila["email"]?>'><br>
            DNI: <input type='text' name='dni' value='<?=$fila["dni"]?>'><br>

            <input type='submit' value='Submit'>
        </form>
    </body>
</html>