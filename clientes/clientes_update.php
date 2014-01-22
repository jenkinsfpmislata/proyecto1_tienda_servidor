<?php

$db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "SELECT * from clientes";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());
$i = 0;
while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $datos[$i] = array('idCliente' => $fila["idCliente"], 'nombre' => $fila["nombre"]);
    $i++;
}

header('Content-type: application/json');
echo json_encode($datos);
?>
