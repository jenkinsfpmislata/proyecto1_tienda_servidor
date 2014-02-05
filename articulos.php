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
                    url: 'articulos/articulos.php',
                    success: function(data) {
                        datos = '<table><tr><th></th><th>Id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Categoria</th><th colspan="2" align="center">Opciones</th></tr>';

                        $.each(data, function(index) {
                            datos += '<tr><td></td><td>' + data[index].idArticulo + '</td><td>' + data[index].nombreArticulo + '</td><td>' + data[index].descripcionArticulo + '</td><td>' + data[index].precioArticulo + '</td><td>' + data[index].idCategorias + '</td><td><a href=javascript:borrar(' + data[index].idArticulo + ')>Borrar</a></td><td><a href=javascript:actualizar(' + data[index].idArticulo + ')>Update</a></td></tr>';
                        });
                        datos += '</table>';
                        $('#articulos').html(datos);
                    }
                });
            });
            function borrar(idArticulo) {
                $.ajax({
                    dataType: 'json',
                    url: 'articulos/articulos_delete.php',
                    type: 'POST',
                    data: 'idArticulo=' + idArticulo,
                    success: function() {
                        $.ajax({
                            dataType: 'json',
                            url: 'articulos/articulos.php',
                            success: function(data) {
                                datos = '<table><tr><th></th><th>Id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Categoria</th><th colspan="2" align="center">Opciones</th></tr>';

                                $.each(data, function(index) {
                                    datos += '<tr><td></td><td>' + data[index].idArticulo + '</td><td>' + data[index].nombreArticulo + '</td><td>' + data[index].descripcionArticulo + '</td><td>' + data[index].precioArticulo + '</td><td>' + data[index].idCategorias + '</td><td><a href=javascript:borrar(' + data[index].idArticulo + ')>Borrar</a></td><td><a href=javascript:actualizar(' + data[index].idArticulo + ')>Update</a></td></tr>';
                                });
                                datos += '</table>';
                                $('#articulos').html(datos);
                            }
                        });
                    }
                });
            }
            function buscarNombre() {
             $.ajax({
                    dataType: 'json',
                    url: 'articulos/articulos_buscar_nombre.php',
                    type: 'POST',
                    data: 'nombreArticulo=' + $('#buscar').val(),
                    success: function(data) {
                        datos = '<table><tr><th></th><th>Id</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Categoria</th><th colspan="2" align="center">Opciones</th></tr>';

                        $.each(data, function(index) {
                            datos += '<tr><td></td><td>' + data[index].idArticulo + '</td><td>' + data[index].nombreArticulo + '</td><td>' + data[index].descripcionArticulo + '</td><td>' + data[index].precioArticulo + '</td><td>' + data[index].idCategorias + '</td><td><a href=javascript:borrar(' + data[index].idArticulo + ')>Borrar</a></td><td><a href=javascript:actualizar(' + data[index].idArticulo + ')>Update</a></td></tr>';
                        });
                        datos += '</table>';
                        $('#articulos').html(datos);
                    }
                });
            }
            function actualizar(idArticulo) {
                $.ajax({
                    dataType: 'json',
                    url: 'articulos/articulos_buscar.php',
                    type: 'POST',
                    data: 'idArticulo=' + idArticulo,
                    success: function(data) {
                        formulario = '<a href="" class="dropdown_button"><small class="icon plus"></small><span>Actualizar Articulo</span></a>';
                        formulario += '<div class="dropdown" style="display: block;">';
                        formulario += '<div class="arrow"></div><div class="content"><form action="articulos/articulos_update.php" method="post">';
                        formulario += '<p><label>Articulo ID:</label><input type="text" class="text w_22" name="idArticulo" value="' + data.idArticulo + '" readonly></input></p>';
                        formulario += '<p><label>Articulo Name:</label><input type="text" class="text w_22" name="nombreArticulo" value="' + data.nombreArticulo + '"></input></p>';
                        formulario += '<p><label>Articulo Description:</label><input type="text" class="text w_22" name="descripcionArticulo" value="' + data.descripcionArticulo + '"></input></p>';
                        formulario += '<p><label>Articulo Price:</label><input type="text" class="text w_22" name="precioArticulo" value="' + data.precioArticulo+ '"></input></p>';
                        formulario += '<p><label>Articulo Category:</label><input type="text" class="text w_22" name="idCategorias" value="' + data.idCategorias + '"></input></p>';
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
                    <img src="images/logo.gif" class="logo" alt="Logo" width="50%"/>
            </div>
            <div class="col w5 last right bottomlast">
                <p class="last">Logged in as <span class="strong">Admin,</span> <a href="login.html">Logout</a></p>
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
                                <a href="index.php" ><span>Categorias</span></a>
                            </li>
                            <li>
                                <a href="clientes.php"><span>Clientes</span></a>
                            </li>
                            <li>
                                <a href="articulos.php" class="selected"><span>Articulos</span></a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div id="submenu">
                        <div class="modules_left">
                            <div class="module buttons" id="actualizar">
                                <a href="" class="dropdown_button"><small class="icon plus"></small><span>Nuevo Articulo</span></a>
                                <div class="dropdown">
                                    <div class="arrow"></div>
                                    <div class="content">
                                        <form action="articulos/articulos_insert.php" method="post">
                                            <p>
                                                <label for="name">Articulo Name:</label>
                                                <input type="text" class="text w_22" name="nombreArticulo" value="" />
                                            </p>
                                            <p>
                                                <label for="name">Articulo Description:</label>
                                                <input type="text" class="text w_22" name="descripcionArticulo" value="" />
                                            </p>
                                            <p>
                                                <label for="name">Articulo Price :</label>
                                                <input type="text" class="text w_22" name="precioArticulo" value="" />
                                            </p>
                                            <p>
                                                <label for="name">Articulo Category :</label>
                                                <input type="text" class="text w_22" name="idCategorias" value="" />
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
                            Articles
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
                                <h1>Articulos: </h1>
                                <div class="col w10 last">
                                    <div class="content" id="articulos">
                                        <!----- Tabla Articulos--->
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