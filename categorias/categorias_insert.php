<?php
$nombreCategoria=$_POST["nombreCategoria"];


$db=mysql_connect("localhost","root","") or die("Connection Error".mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error Connection to DB".mysql_error());

$SQL = "INSERT INTO categorias VALUES ('null','$nombreCategoria');";
$result=mysql_query($SQL) or die("Couldnt execute query.".mysql_error());

header("Location:../index.html");
?>