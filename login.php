<?php

session_start();

if ($_POST["username"] == null || $_POST["password"] == null) {
    header('Location: login.html');
} else {
//------------------------------------------------// 

    $user = $_POST["username"];
    $pass = $_POST["password"];

    $user = stripslashes($user);
    $pass = stripslashes($pass);

    $user = mysql_real_escape_string($user);
    $pass = mysql_real_escape_string($pass);
//-----------------------------------------------//
    $db = mysql_connect("localhost", "root", "frodo2013") or die("Connection Error: " . mysql_error());
    mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

    $SQL = "SELECT * FROM  `login` WHERE username =  '$user' AND PASSWORD =  '$pass';";
    $result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());

    $fila = mysql_fetch_array($result, MYSQL_ASSOC);
//-----------------------------------------------//
    $hash = md5($pass);
//-----------------------------------------------//       
    if ($hash == md5($fila['password'])) {
        $_SESSION['username'] = $fila['username'];
        header("Location: index.php");
    } else {
        header("Location: login.html");
    }
}
?>