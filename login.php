<?php

$user = $_POST["username"];
$pass = $_POST["password"];
$user = stripslashes($user);
$pass = stripslashes($pass);
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);
//-----------------------------------------------//
$db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error());
mysql_select_db("proyecto1_tienda_servidor") or die("Error conecting to db.");

$SQL = "SELECT * FROM  `login` WHERE username =  '$user' AND PASSWORD =  '$pass';";
$result = mysql_query($SQL) or die("Couldn t execute query." . mysql_error());

$count = mysql_num_rows($result);
$fila = mysql_fetch_array($result, MYSQL_ASSOC);
//-----------------------------------------------//
if ($fila) {
    switch ('md5') {
        case 'sha1' | 'SHA1':
            $hash = sha1($pass);
            break;
        case 'md5' | 'MD5':
            $hash = md5($pass);
            break;
        case 'texto' | 'TEXTO':
            $hash = $pass;
            break;
        default:
            trigger_error('El valor de la constante md5 no es válido. Utiliza MD5 o SHA1 o TEXTO', E_USER_ERROR);
    }

    if ($hash == md5($fila['password'])) {
        @session_start();
        $_SESSION['user'] = array('user' => $fila['username']); 
        return true;
        header("Location: index.php");
    } else {
        @session_start();
        unset($_SESSION['user']); 
        return false;
        header("Location: login.html");
    }
} else {
    return false;
}
//if ($count == 1) {
//    $_SESSION["user"] = $user;
//    $_SESSION["pass"] = $pass;
//    header("Location: index.php");
//} else {
//    header("Location: login.html");
//}
?>
