<?php

$idCategoria = $_POST["idCategoria"];
$nombreCategoria = $_POST["nombreCategoria"];


$db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "UPDATE proyecto1_tienda_servidor.categorias SET nombreCategoria='$nombreCategoria' WHERE idCategoria='$idCategoria';";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
 
header ("Location: categorias.html");
?>
