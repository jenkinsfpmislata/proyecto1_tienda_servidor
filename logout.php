<?php
session_start();    
unset($_SESSION['username']); //eliminamos la variable con los datos de usuario;
    session_write_close(); //nos asegurmos que se guarda y cierra la sesion
    header('Location:login.html');
?>
