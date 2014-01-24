<?php
$id = $_POST["id"];

$db = mysql_connect("localhost","root","") or die("Connection Error: " . mysql_error());
    mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");
    
    $SQL = "DELETE from clientes where idCliente = $id"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());   
    ?>
