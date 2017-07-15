<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "facturacion_diana_corregida";

$conexion = mysqli_connect($servername,$username,$password,$database);

if(!$conexion){
	echo "Error en la conexion, revise sus parametros";
	die();
}
?>