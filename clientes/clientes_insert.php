<?php
$nombre=$_POST["nombre"];
$apellido1=$_POST["apellido1"];
$apellido2=$_POST["apellido2"];
$telefono=$_POST["telefono"];
$direccion=$_POST["direccion"];
$email=$_POST["email"];
$dni=$_POST["dni"];


$db=mysql_connect("localhost","root","frodo2013") or die("Connection Error".mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error Connection to DB".mysql_error());

$SQL = "INSERT INTO clientes VALUES ('null','$nombre','$apellido1','$apellido2','$telefono','$direccion','$email','$dni');";
$result=mysql_query($SQL) or die("Couldnt execute query.".mysql_error());

header("Location:../clientes.php");
?>