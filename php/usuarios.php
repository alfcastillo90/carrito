<?php
include "conexion.php";
$accion=$_POST["accion"];
$clave=  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["clave"]));
$maxCaracteresUsername = "20";
$maxCaracteresPassword = "60";
$username =  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["username"]));
if(isset($_POST["apellido"])){
  $apellido =  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["apellido"]));
}
if(isset($_POST["email"])){
  $email =  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["email"]));
}
if(isset($_POST["nombre"])){
  $nombre =  htmlspecialchars(mysqli_real_escape_string($conexion,$_POST["nombre"]));
}
switch ($accion) {
  case 'login':
    iniciodeSesion($clave,$conexion,$maxCaracteresPassword,$maxCaracteresUsername,$username);
    break;
  case 'registro':
    registrodeUsuarios($apellido,$clave,$conexion,$email,$maxCaracteresPassword,$maxCaracteresUsername,$nombre,$username);
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

function iniciodeSesion($clave,$conexion,$username){
  $query = "SELECT * FROM usuarios WHERE clave='$clave' AND username = '$username'";
  $sql = mysqli_query($conexion,$query);

  if(mysqli_num_rows($sql)>0){
    $resultado = mysqli_fetch_array($sql);
    session_start();
    $_SESSION["username"] = $resultado["username"];
    $_SESSION['estado'] = 'Autenticado';
    return json_encode(array("result"=>true,"message"=>"bienvenido"));
  }
  else{
    return json_encode(array("result"=>false,"message"=>"los datos son incorrectos"));
  }

}

function registrodeUsuarios($apellido,$clave,$conexion,$email,$maxCaracteresPassword,$maxCaracteresUsername,$nombre,$username){

  //Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
  if(strlen($username) > $maxCaracteresUsername) {
    echo json_encode(array("result"=>false,"message"=>"el nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres"));
  }

  if(strlen($clave) > $maxCaracteresPassword) {
  	echo json_encode(array("result"=>false,"message"=>"la clave no puede superar los '.$maxCaracteresPassword.' caracteres"));
  }
  $username = strtolower($username);
  $consultaUsuarios = mysqli_query($conexion,"SELECT * FROM usuarios WHERE username = '$username'") or die(mysql_error());
  if(mysqli_num_rows($consultaUsuarios)>0){
    echo json_encode(array("result"=>false,"message"=>"el nombre de usuario indicado ya existe"));
  }
  else{

    $aleatorio = aleatoriedad();
    $valor = "07";
    $salt = "$2y$".$valor."$".$aleatorio."$";
    $clave = crypt($clave, $salt);
    $query = "INSERT INTO usuarios(username,apellido,clave,email,nombre) VALUES('$username','$apellido','$clave','$email','$nombre')";
 
    if(mysqli_query($conexion,$query)){
      session_start();
      $_SESSION["username"] = $username;
      $_SESSION['estado'] = 'Autenticado';
      echo json_encode(array("result"=>true,"message"=>"registro exitoso"));
    }
    else{
      echo json_encode(array("result"=>false,"message"=>"error en el query de registro"));
    }
  }
}