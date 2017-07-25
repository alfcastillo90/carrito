<?php
include "conexion.php";
$accion=$_POST["accion"];
$clave=  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["clave"]);
$username =  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["username"]);
if(isset($_POST["apellido"])){
  $nombre =  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["apellido"]);
}
if(isset($_POST["email"])){
  $email =  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["email"]);
}
if(isset($_POST["nombre"])){
  $nombre =  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["nombre"]);
}
switch ($accion) {
  case 'login':
    iniciodeSesion($clave,$conexion,$username);
    break;
  case 'registro':
    registrodeUsuarios($apellido,$clave,$conexion,$email,$nombre,$username);
    break;
}

function aleatoriedad() {
		$caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
		$nueva_clave = "";
		for ($i = 5; $i < 35; $i++) {
			$nueva_clave .= $caracteres[rand(5,35)];
		};
		return $nueva_clave;
	}

function registrodeUsuarios($apellido,$clave,$conexion,$email,$nombre,$username){
  $maxCaracteresUsername = "20";
  $maxCaracteresPassword = "60";
  //Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
  if(strlen($username) > $maxCaracteresUsername) {
    return json_encode(array("result"=>false,"message"=>"el nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres");
  }

  if(strlen($clave) > $maxCaracteresPassword) {
  	return json_encode(array("result"=>false,"message"=>"la clave no puede superar los '.$maxCaracteresPassword.' caracteres");
  }
  $username = strtolower($username);
  $consultaUsuarios = mysqli_query($conexion,"SELECT * FROM usuarios WHERE username = '$username'") or die(mysql_error());
  if(mysqli_num_rows($consultaUsuarios)>0){
    return json_encode(array("result"=>false,"message"=>"el nombre de usuario indicado ya existe");
  }
  else{
    $aleatorio = aleatoriedad();
    $valor = "07";
    $salt = "$2y$".$valor."$".$aleatorio."$";
    $clave = crypt($clave, $salt);
    $query = "INSERT INTO usuarios(apellido,clave,email,nombre) VALUES($apellido,$clave,$conexion,$email,$nombre)";
    if(mysqli_query($conexion,$query)){
        return true;
    }
    else{
      return false;
    }
  }
}
?>
