<?php

$user = $_POST["username"];
$pass = $_POST["password"];
$user = stripslashes($user);
$pass = stripslashes($pass);
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);

$db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "SELECT username FROM  `login` WHERE username =  '$user' AND PASSWORD =  '$pass';";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());

$count = mysql_num_rows($result);
$fila = mysql_fetch_array($result, MYSQL_ASSOC);

if ($count == 1) {
    header("Location: index.html?username=$user");
} else {
    echo "you are not logged in";
}
?>
