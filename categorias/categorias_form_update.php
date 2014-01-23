<?php
    $idCategoria = $_POST["idCategoria"];

    $db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error());
    mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

    $SQL = "SELECT * from categorias where idCategoria = $idCategoria";
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
            Id: <input type='text' name='idCategoria' value='<?=$fila["idCategoria"]?>' readonly><br>
            Nombre: <input type='text' name='nombreCategoria' value='<?=$fila["nombreCategoria"]?>'><br>

            <input type='submit' value='Submit'>
        </form>
    </body>
</html>