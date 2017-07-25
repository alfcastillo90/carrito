<?php
include "conexion.php";
$accion=$_POST["accion"];
$email = $_POST["email"];
$clave=$_POST["clave"];
if(isset($_POST["apellido"])){
  $nombre = $_POST["apellido"];
}
if(isset($_POST["nombre"])){
  $nombre = $_POST["nombre"];
}
switch ($accion) {
  case 'login':
    iniciodeSesion($clave,$conexion,$email);
    break;
  case 'registro':
    registrodeUsuarios($apellido,$clave,$conexion,$email,$nombre);
    break;
}
function registrodeUsuarios($apellido,$clave,$conexion,$email,$nombre){
  $query = "INSERT INTO usuarios(apellido,clave,email,nombre) VALUES($apellido,$clave,$conexion,$email,$nombre)";
  if(mysqli_query($conexion,$query)){
      return true;
  }
  else{
    return false;
  }
}
?>
