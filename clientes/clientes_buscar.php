<?php

$idCliente = $_POST['idCliente'];

$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "SELECT * from clientes where idCliente = $idCliente ; ";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());


$fila = mysql_fetch_array($result, MYSQL_ASSOC);
$datos=array('idCliente'=>$fila["idCliente"],'nombre'=>$fila["nombre"],'apellido1'=>$fila["apellido1"],'apellido2'=>$fila["apellido2"],'telefono'=>$fila["telefono"],'direccion'=>$fila["direccion"],'email'=>$fila["email"],'dni'=>$fila["dni"]);


header('Content-type: application/json');
echo json_encode($datos);
?>
