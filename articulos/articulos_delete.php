<?php
$idArticulo = $_POST["idArticulo"];

$db = mysql_connect("localhost","root","frodo2013") or die("Connection Error: " . mysql_error());
    mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");
    
    $SQL = "DELETE from articulos where idArticulo = $idArticulo"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
    
    ?>
