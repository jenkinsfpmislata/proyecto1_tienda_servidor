<?php
    $idArticulo = $_POST["idArticulo"];

    $db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
    mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

    $SQL = "SELECT * from articulos where idArticulo = $idArticulo";
    $result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
    $fila = mysql_fetch_array($result,MYSQL_ASSOC);
    ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    </head>
    <body>
        <h3>Modifica el cliente</h3>
        <form name='update' action='articulos_update.php' method='POST'>
            idArticulo: <input type="text"  name="idArticulo"  value='<?=$fila["idArticulo"]?>' readonly><br />
            nombreArticulo: <input type="text"  name="nombreArticulo"  value='<?=$fila["nombreArticulo"]?>'><br />
            descripcionArticulo: <input type="text"  name="descripcionArticulo"  value='<?=$fila["descripcionArticulo"]?>'><br />
            precioArticulo: <input type="text" name="precioArticulo" value='<?=$fila["precioArticulo"]?>'><br />
            idCategorias: <input type="text"  name="idCategorias" value='<?=$fila["idCategorias"]?>'><br />
            <input type='submit' value='Submit'>
        </form>
    </body>
</html>