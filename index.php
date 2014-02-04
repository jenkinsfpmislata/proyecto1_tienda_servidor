<?php
function logout() {
    unset($_SESSION['username']); //eliminamos la variable con los datos de usuario;
    session_write_close(); //nos asegurmos que se guarda y cierra la sesion
    header('Location:login.html');
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
                    url: 'categorias/categorias.php',
                    success: function(data) {
                        datos = '<table><tr><th></th><th>Id</th><th>Nombre</th><th align="center" colspan="2" >Opciones</th></tr>';

                        $.each(data, function(index) {
                            datos += '<tr><td></td><td>' + data[index].idCategoria + '</td><td>' + data[index].nombreCategoria + '</td><td><a href=javascript:borrar(' + data[index].idCategoria + ')>Borrar</a></td><td><a href=javascript:actualizar(' + data[index].idCategoria + ')>Update</a></td></tr>';
                        });
                        datos += '</table>';
                        $('#categorias').html(datos);
                    }
                });
            });
            function borrar(idCategoria) {
                $.ajax({
                    dataType: 'json',
                    url: 'categorias/categorias_delete.php',
                    type: 'POST',
                    data: 'idCategoria=' + idCategoria,
                    success: function() {
                        $.ajax({
                            dataType: 'json',
                            url: 'categorias/categorias.php',
                            success: function(data) {
                                datos = '<table><tr><th></th><th>Id</th><th>Nombre</th><th align="center" colspan="2" >Opciones</th></tr>';

                                $.each(data, function(index) {
                                    datos += '<tr><td></td><td>' + data[index].idCategoria + '</td><td>' + data[index].nombreCategoria + '</td><td><a href=javascript:borrar(' + data[index].idCategoria + ')>Borrar</a></td><td><a href=javascript:actualizar(' + data[index].idCategoria + ')>Update</a></td></tr>';
                                });
                                datos += '</table>';
                                $('#categorias').html(datos);
                            }
                        });
                    }
                });
            }
            function buscarNombre() {
             $.ajax({
                    dataType: 'json',
                    url: 'categorias/categorias_buscar_nombre.php',
                    type: 'POST',
                    data: 'nombreCategoria=' + $('#buscar').val(),
                    success: function(data) {
                        datos = '<table><tr><th></th><th>Id</th><th>Nombre</th><th align="center" colspan="2" >Opciones</th></tr>';

                        $.each(data, function(index) {
                            datos += '<tr><td></td><td>' + data[index].idCategoria + '</td><td>' + data[index].nombreCategoria + '</td><td><a href=javascript:borrar(' + data[index].idCategoria + ')>Borrar</a></td><td><a href=javascript:actualizar(' + data[index].idCategoria + ')>Update</a></td></tr>';
                        });
                        datos += '</table>';
                        $('#categorias').html(datos);
                    }
                });
            }
            
            
            function actualizar(idCategoria) {
                $.ajax({
                    dataType: 'json',
                    url: 'categorias/categorias_buscar.php',
                    type: 'POST',
                    data: 'idCategoria=' + idCategoria,
                    success: function(data) {
                        formulario = '<a href="" class="dropdown_button"><small class="icon plus"></small><span>Actualizar Categoria</span></a>';
                        formulario += '<div class="dropdown" style="display: block;">';
                        formulario += '<div class="arrow"></div><div class="content"><form action="categorias/categorias_update.php" method="post">';
                        formulario += '<p><label>Category ID:</label><input type="text" class="text w_22" name="idCategoria" value="' + data.idCategoria + '" readonly></input></p><p><label>Category Name:</label><input type="text" class="text w_22" name="nombreCategoria" value="' + data.nombreCategoria + '"></input></p>';
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
                <p class="last">Logged in as <span class="strong" id="username">Admin</span> <a href="<?=logout()?>">Logout</a></p>
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
                                <a href="index.html" class="selected"><span>Categorias</span></a>
                            </li>
                            <li>
                                <a href="clientes.html"><span>Clientes</span></a>
                            </li>
                            <li>
                                <a href="articulos.html"><span>Articulos</span></a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div id="submenu">
                        <div class="modules_left">
                            <div class="module buttons" id ="actualizar">
                                <a href="" class="dropdown_button"><small class="icon plus"></small><span>Nueva Categoria</span></a>
                                <div class="dropdown">
                                    <div class="arrow"></div>
                                    <div class="content">
                                        <form action="categorias/categorias_insert.php" method="post" id="pruebas">
                                            <p>
                                                <label for="name">Category Name:</label>
                                                <input type="text" class="text w_22" name="nombreCategoria" value="" />
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
                            Categorias
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
                                <h1>Categorias : </h1>
                                <div class="col w10 last">
                                    <div class="content" id="categorias">
                                        <!----- Tabla Categorias--->
                                    </div>							
                                </div>
                            </div>
                        </div>
                        <div id="footer">
                            <p class="last">Copyright 2013 - Densetech - Created by <a href="">Densetech Team</a></p>
                        </div>
                        </body>
                        </html>