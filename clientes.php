<?php
session_start();

if(!isset($_SESSION['username'])) 
{
    header('Location: login.html'); 
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <title>Densetech Management</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8" />
        <script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    dataType: 'json',
                    url: 'clientes/clientes.php',
                    success: function(data) {
                        datos = '<table><tr><th></th><th>Id</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Telefono</th><th>Direccion</th><th>Email</th><th>DNI</th><th colspan="2" align="center">Opciones</th></tr>';

                        $.each(data, function(index) {
                            datos += '<tr><td></td><td>' + data[index].idCliente + '</td><td>' + data[index].nombre + '</td><td>' + data[index].apellido1 + '</td><td>' + data[index].apellido2 + '</td><td>' + data[index].telefono + '</td><td>' + data[index].direccion + '</td><td>' + data[index].email + '</td><td>' + data[index].dni + '</td><td><a href=javascript:borrar(' + data[index].idCliente + ')>Borrar</a></td><td><a href=javascript:actualizar(' + data[index].idCliente + ')>Update</a></td></tr>';
                        });
                        datos += '</table>';
                        $('#clientes').html(datos);
                    }
                });
            });
            function borrar(idCliente) {
                $.ajax({
                    dataType: 'json',
                    url: 'clientes/clientes_delete.php',
                    type: 'POST',
                    data: 'idCliente=' + idCliente,
                    success: function() {
                        $.ajax({
                            dataType: 'json',
                            url: 'clientes/clientes.php',
                            success: function(data) {
                                datos = '<table><tr><th></th><th>Id</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Telefono</th><th>Direccion</th><th>Email</th><th>DNI</th><th colspan="2" align="center">Opciones</th></tr>';

                                $.each(data, function(index) {
                                    datos += '<tr><td></td><td>' + data[index].idCliente + '</td><td>' + data[index].nombre + '</td><td>' + data[index].apellido1 + '</td><td>' + data[index].apellido2 + '</td><td>' + data[index].telefono + '</td><td>' + data[index].direccion + '</td><td>' + data[index].email + '</td><td>' + data[index].dni + '</td><td><a href=javascript:borrar(' + data[index].idCliente + ')>Borrar</a></td><td><a href=javascript:actualizar(' + data[index].idCliente + ')>Update</a></td></tr>';
                                });
                                datos += '</table>';
                                $('#clientes').html(datos);
                            }
                        });
                    }
                });
            }
            function buscarNombre() {
             $.ajax({
                    dataType: 'json',
                    url: 'clientes/clientes_buscar_nombre.php',
                    type: 'POST',
                    data: 'nombreCliente=' + $('#buscar').val(),
                    success: function(data) {
                        datos = '<table><tr><th></th><th>Id</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Telefono</th><th>Direccion</th><th>Email</th><th>DNI</th><th colspan="2" align="center">Opciones</th></tr>';

                        $.each(data, function(index) {
                            datos += '<tr><td></td><td>' + data[index].idCliente + '</td><td>' + data[index].nombre + '</td><td>' + data[index].apellido1 + '</td><td>' + data[index].apellido2 + '</td><td>' + data[index].telefono + '</td><td>' + data[index].direccion + '</td><td>' + data[index].email + '</td><td>' + data[index].dni + '</td><td><a href=javascript:borrar(' + data[index].idCliente + ')>Borrar</a></td><td><a href=javascript:actualizar(' + data[index].idCliente + ')>Update</a></td></tr>';
                        });
                        datos += '</table>';
                        $('#clientes').html(datos);
                    }
                });
            }
            function actualizar(idCliente) {
                $.ajax({
                    dataType: 'json',
                    url: 'clientes/clientes_buscar.php',
                    type: 'POST',
                    data: 'idCliente=' + idCliente,
                    success: function(data) {
                        formulario = '<a href="" class="dropdown_button"><small class="icon plus"></small><span>Actualizar Cliente</span></a>';
                        formulario += '<div class="dropdown" style="display: block;">';
                        formulario += '<div class="arrow"></div><div class="content"><form action="clientes/clientes_update.php" method="post">';
                        formulario += '<p><label>Cliente ID:</label><input type="text" class="text w_22" name="idCliente" value="' + data.idCliente + '" readonly></input></p>';
                        formulario += '<p><label>Cliente Name:</label><input type="text" class="text w_22" name="nombre" value="' + data.nombre + '"></input></p>';
                        formulario += '<p><label>Cliente Surname1:</label><input type="text" class="text w_22" name="apellido1" value="' + data.apellido1 + '"></input></p>';
                        formulario += '<p><label>Cliente Surname2:</label><input type="text" class="text w_22" name="apellido2" value="' + data.apellido2 + '"></input></p>';
                        formulario += '<p><label>Cliente Telephon</label><input type="text" class="text w_22" name="telefono" value="' + data.telefono + '"></input></p>';
                        formulario += '<p><label>Cliente Adress:</label><input type="text" class="text w_22" name="direccion" value="' + data.direccion + '"></input></p>';
                        formulario += '<p><label>Cliente Email:</label><input type="text" class="text w_22" name="email" value="' + data.email + '"></input></p>';
                        formulario += '<p><label>Cliente DNI :</label><input type="text" class="text w_22" name="dni" value="' + data.dni + '"></input></p>';
                        formulario += '</form>';
                        formulario += '<a class="button green right" onclick="document.forms[0].submit();return false;"><small class="icon check"></small><span>Save</span></a>';
                        formulario += '<div class="clear"></div></div></div>';
                        $('#actualizar').html(formulario);
                    }
                });
            }
        </script>
        <script src="js/global.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/modal.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body>
        <div id="header">
            <div class="col w5 bottomlast">
                    <img src="images/logo.gif" class="logo" alt="Logo" width="50%" height="50%"/>
            </div>
            <div class="col w5 last right bottomlast">
                <p class="last">Logged in as <span class="strong">Admin,</span> <a href="">Logout</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div id="wrapper">
            <div id="minwidth">
                <div id="holder">
                    <div id="menu">
                        <div id="left"></div>
                        <div id="right"></div>
                        <ul>
                            <li>
                                <a href="index.html" ><span>Categorias</span></a>
                            </li>
                            <li>
                                <a href="clientes.html" class="selected"><span>Clientes</span></a>
                            </li>
                            <li>
                                <a href="articulos.html"><span>Articles</span></a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div id="submenu">
                        <div class="modules_left">
                            <div class="module buttons" id="actualizar">
                                <a href="" class="dropdown_button"><small class="icon plus"></small><span>Nuevo Cliente</span></a>
                                <div class="dropdown">
                                    <div class="arrow"></div>
                                    <div class="content">
                                        <form action="clientes/clientes_insert.php" method="post">
                                            <p>
                                                <label>Cliente Name:</label>
                                                <input type="text" class="text w_22" name="nombre" value="" />
                                            </p>
                                            <p>
                                                <label >Cliente Surname1:</label>
                                                <input type="text" class="text w_22" name="apellido1" value="" />
                                            </p>
                                            <p>
                                                <label >Cliente Surname2 :</label>
                                                <input type="text" class="text w_22" name="apellido2" value="" />
                                            </p>
                                            <p>
                                                <label >Cliente Telephon :</label>
                                                <input type="text" class="text w_22" name="telefono" value="" />
                                            </p>
                                            <p>
                                                <label >Cliente Adress :</label>
                                                <input type="text" class="text w_22" name="direccion"  value=""/>
                                            </p>
                                            <p>
                                                <label >Cliente Email :</label>
                                                <input type="text" class="text w_22" name="email" value=""/>
                                            </p>
                                            <p>
                                                <label >Cliente DNI :</label>
                                                <input type="text" class="text w_22" name="dni" value=""/>
                                            </p>
                                        </form>

                                        <a href="" class="button green right" onclick="document.forms[0].submit();
                return false;"><small class="icon check"></small><span>Save</span></a>
                                        <a class="button red mr right close" ><small class="icon cross"></small><span>Close</span></a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            Clientes
                        </div>
                        <div class="modules_right">
                            <div class="module search">
                                <form action="javascript:buscarNombre()">
                                    <p><input type="text" id="buscar" value="Search..."/></p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="desc">
                        <div class="body">
                            <div id="table" class="help">
                                <h1>Clientes : </h1>
                                <div class="col w10 last">
                                    <div class="content" id="clientes">
                                        <!----- Tabla Clientes--->
                                    </div>							
                                </div>
                            </div>
                        </div>

                        <div class="clear"></div>
                        <div id="body_footer">
                            <div id="bottom_left"><div id="bottom_right"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <p class="last">Copyright 2013 - Densetech - Created by <a href="">Densetech Team</a></p>
        </div>		
    </body>
</html>
