<?php
session_start();
require('php/sesiones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Carrito de compra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <style>
 .bg-1 {
     background-color: #1abc9c; /* Green */
     color: #ffffff;
 }
 .bg-2 {
     background-color: #474e5d; /* Dark Blue */
     color: #ffffff;
 }
 .bg-3 {
     background-color: #ffffff; /* White */
     color: #555555;
 }
 .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
}
.navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
}

.navbar-nav li a:hover {
    color: #1abc9c !important;
}
.bg-4 {
   background-color: #2f2f2f;
   color: #ffffff;
}
.referencias {
    padding: 2%;
    font-size: 20px;
}

 </style>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Carrito Unitec</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#div-1">Inicio</a></li>
      <li><a href="#div-2">Que contiene?</a></li>
      <li><a href="#div-3">Porque verlo?</a></li>
      </ul>
    </div>
    </div>
  </nav>
  <div class="container-fluid" id="div-1" style="background-color: #232f3e;color: #f6f6f6">
    <div class="row">
      <div class="col-md-12 text-center">
          <img class="img-responsive img-circle" alt="shopping" src="http://images.huffingtonpost.com/2016-05-27-1464347371-2400764-tshirtstoreecommerce.jpg" style="margin-left:33vw; width: 30%;"/>
          <h3>Carrito de compra</h1>
          <p>Registro de usuario, inicio de sesi&oacute;n, catalogo de productos, agregar producto al carrito y comprar</p>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-registro">Crear una cuenta</button>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-login">Iniciar sesi&oacute;n</button>
      </div>
    </div>
  </div>
  <div id="div-2" class="container-fluid bg-3 text-center">
    <h3>¿Que tiene este proyecto?</h3>
    <p>Formulario de inicio de sesion, registro de usuario, catalogo de productos, agregar producto al carrito, comprar productos</p>
    <a href="https://www.linkedin.com/in/alfcastillo/" class="btn btn-default btn-lg">
      <span class="glyphicon glyphicon-search"></span> Conoce m&aacute;s sobre el creador
    </a>
  </div>

  <div id="div-3" class="container-fluid bg-1 text-center">
    <h3>Porque deberia bajar el codigo de este proyecto?</h3>
    <p>Para comprender como se pueden realizar a una base de datos a traves de un formulario, tambien para comenzar a comprender el uso de las variables de sesi&oacute;n y el proceso de autentificaci&oacute;n  en un sistema hecho con php, mysql, bootstrap, html5 y jquery</p>
  </div>
  <div class="container-fluid bg-2 text-center">
    <h3>Referencias</h3>
    <div class="row">
    <div class="col-sm-6 col-md-4 referencias">
      <a href="https://www.w3schools.com" class="label label-success">
        w3Schools
      </a>
    </div>
    <div class="col-sm-6 col-md-4 referencias">
      <a href="https://www.getbootstrap.com" class="label label-success">
        Bootstrap
      </a>
    </div>
    <div class="col-sm-6 col-md-4 referencias">
      <a href="https://www.php.net" class="label label-success">
        Php
      </a>
    </div>
    <div class="col-sm-6 col-md-4 referencias">
      <a href="https://www.jquery.com" class="label label-success">
        Jquery
      </a>
    </div>
    <div class="col-sm-6 col-md-4 referencias">
      <a href=" https://developer.mozilla.org/" class="label label-success">
        Mozilla developer network
      </a>
    </div>
    <div class="col-sm-6 col-md-4 referencias">
      <a href=" https://stackoverflow.com/" class="label label-success">
        Stackoverflow
      </a>
    </div>
  </div>
  </div>
  <!-- Button to open the modal -->
  <!-- The Modal (contains the Sign Up form) -->
  <div id="modal-registro" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" onsubmit="registrodeUsuarios()">
          <div class="modal-header"></div>
          <div class="modal-body">
              <div class="form-group">
                <label><b>Nombre de usuario</b></label>
                <input class="form-control" type="text" placeholder="Ingrese su nombre de usuario" id="username" name="username" required>
              </div>
              <div class="form-group">
                <label><b>Nombres</b></label>
                <input class="form-control" type="text" placeholder="Ingrese sus nombres" id="nombres" name="nombres" required>
              </div>
              <div class="form-group">
                <label><b>Apellidos</b></label>
                <input class="form-control" type="text" placeholder="Ingrese sus apellidos" id="apellidos" name="apellidos" required>
              </div>
              <div class="form-group">
                <label><b>Email</b></label>
                <input class="form-control" type="text" placeholder="Ingrese su Email" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label><b>Contrase&ntilde;a</b></label>
                <input class="form-control" type="password" placeholder="Ingrese su clave" id="clave" name="clave" required>
              </div>
              <div class="form-group">
                <label><b>Repetir Contrase&ntilde;a</b></label>
                <input class="form-control" type="password" placeholder="Repita su clave" id="repetir-clave" name="repetir-clave" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Crear cuenta</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Button to open the modal -->
  <!-- The Modal (contains the Sign Up form) -->
  <div id="modal-login" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" onsubmit="iniciodeSesion()">
        <div class="modal-header"></div>
        <div class="modal-body">
            <div class="form-group">
              <label><b>Email</b></label>
              <input class="form-control" type="text" placeholder="Ingrese su email" name="email" required>
            </div>
            <div class="form-group">
              <label><b>Contrase&ntilde;a</b></label>
              <input class="form-control" type="password" placeholder="Ingrese su clave" name="clave" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Iniciar sesi&oacute;n</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <footer class="container-fluid bg-4 text-center">
    <p>Desarrollado por <a href="https://www.linkedin.com/in/alfcastillo/">Carlos Alfredo Castillo Rodr&iacutel;guez</a></p>
  </footer>
  <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript">
    function iniciodeSesion(){
      var email = $("#email").val();
      var clave = $("#clave").val();
      $.ajax({
        data:{"accion":"login","clave":clave,"email":email},
        method:"post",
        url:"php/usuarios.php",
        success:function(data){
          alert("registro exitoso");
        }
      });
    }
    function registrodeUsuarios(){
      var username = $("#username").val();
      var nombre = $("#nombres").val();
      var apellido = $("#apellidos").val();
      var email = $("#email").val();
      var clave = $("#clave").val();
      var repetir = $("#repetir-clave").val();
      if(clave!=repetir){
        alert("Las claves no coinciden");
        $("#clave").css("border","2px solid red");
        $("#repetir-clave").css("border","2px solid red");
        return false;
      }
      else{
        $.ajax({
          data:{
                "accion":"registro",
                "username":username,
                "nombre":nombre,
                "apellido":apellido,
                "clave":clave,
                "email":email,
                "username":username
          },
          method:"post",
          url:"php/usuarios.php",
          success:function(data){
            console.log(data);
          }
        });
      }
    }
  </script>
</body>
</html>
