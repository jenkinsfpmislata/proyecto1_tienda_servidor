<?php

$idCliente = $_POST["idCliente"];
$nombre = $_POST["nombre"];
$apellido1 = $_POST["apellido1"];
$apellido2 = $_POST["apellido2"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$email = $_POST["email"];
$dni = $_POST["dni"];

$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "UPDATE proyecto1_tienda_servidor.clientes SET nombre='$nombre',apellido1='$apellido1',apellido2='$apellido2',telefono='$telefono',direccion='$direccion',email='$email',dni='$dni' WHERE idCliente='$idCliente';";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
 
header ("Location: ../clientes.html");
?>
