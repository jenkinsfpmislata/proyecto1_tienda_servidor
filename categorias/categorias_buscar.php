<?php

$idCategoria = $_POST['idCategoria'];

$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "SELECT * from categorias where idCategoria = $idCategoria ; ";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());


$fila = mysql_fetch_array($result, MYSQL_ASSOC);
$datos = array('idCategoria' => $fila['idCategoria'], 'nombreCategoria' => $fila['nombreCategoria']);

header('Content-type: application/json');
echo json_encode($datos);
?>
