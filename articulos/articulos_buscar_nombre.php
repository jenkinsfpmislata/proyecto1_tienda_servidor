<?php

$nombreArticulo = $_POST['nombreArticulo'];

$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "SELECT * from articulos where nombreArticulo like '%$nombreArticulo%' ; ";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());

$i = 0;
while($fila = mysql_fetch_array($result,MYSQL_ASSOC)) 
	{
		$datos[$i]=array('idArticulo'=>$fila["idArticulo"],'nombreArticulo'=>$fila["nombreArticulo"],'descripcionArticulo'=>$fila["descripcionArticulo"],'precioArticulo'=>$fila["precioArticulo"],'idCategorias'=>$fila["idCategorias"]);
		$i++;
	}
header('Content-type: application/json');
echo json_encode($datos);
?>
