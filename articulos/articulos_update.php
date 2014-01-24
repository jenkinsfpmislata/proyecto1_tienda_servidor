<?php
$idArticulo=$_POST["idArticulo"];
$nombreArticulo=$_POST["nombreArticulo"];
$descripcionArticulo=$_POST["descripcionArticulo"];
$precioArticulo=$_POST["precioArticulo"];
$idCategorias=$_POST["idCategorias"];


$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "UPDATE proyecto1_tienda_servidor.articulos SET nombreArticulo='$nombreArticulo',descripcionArticulo='$descripcionArticulo',precioArticulo='$precioArticulo',idCategorias='$idCategorias' WHERE idArticulo='$idArticulo';";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
 
header ("Location: articulos.html");
?>
