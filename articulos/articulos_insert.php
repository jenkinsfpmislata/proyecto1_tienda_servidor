<?php
$nombreArticulo=$_POST["nombreArticulo"];
$descripcionArticulo=$_POST["descripcionArticulo"];
$precioArticulo=$_POST["precioArticulo"];
$idCategorias=$_POST["idCategorias"];


$db=mysql_connect("localhost","root","frodo2013") or die("Connection Error".mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error Connection to DB".mysql_error());

$SQL = "INSERT INTO articulos VALUES (null,'$nombreArticulo','$descripcionArticulo','$precioArticulo','$idCategorias');";
$result=mysql_query($SQL) or die("Couldnt execute query.".mysql_error());

header("Location:articulos.html");
?>