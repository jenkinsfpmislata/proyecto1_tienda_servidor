<?php
$username = $_POST["username"];
$password = $_POST["password"];

    $db = mysql_connect("localhost","root","frodo2013") or die("Connection Error: " . mysql_error());
    mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");
    
    $SQL = "SELECT username from login where username = $username and password = $password;";
    $result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
    $fila = mysql_fetch_array($result, MYSQL_ASSOC);
    $datos = array('username' => $fila['username']);
    
    header("Location : index.html");
?>
