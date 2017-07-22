<!DOCTYPE html>
<html lang="en">
<head>
  <title>Carrito de compra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Carrito de compra</h1>      
    <p>UNITEC</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">inicio</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> su cuenta</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">    
  <div class="row">
 <?php 
include "conexion.php";
$query = "SELECT * FROM articulos";

$sql = mysqli_query($conexion,$query);

while($arreglo = mysqli_fetch_array($sql)){
		$id = $arreglo["id"];
		echo '<div class="col-md-4">';
		echo '<div class="panel panel-primary">';
		echo "<td>".$arreglo["id"] . "</td>";
		echo '<div class="panel-heading">'.$arreglo["descripcion"] . '</div>';
		echo '<div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">';
		echo '<p id="cantidad_en_inventario">'.$arreglo["cantidad_en_inventario"] . '</p>';
		echo '<p id="fecha_registro">Agregado el: '.$arreglo["fecha_registro"] . '</p>';
		echo '</div>';
		echo '<div class="panel-footer"><button class="btn btn-success" onclick="abrirModal($id)">Agregar</button></div>';
		echo '</div>
    </div>';

}
?>
    
        
      
  </div>
</div>

<br><br>

<footer class="container-fluid text-center">
  <p>Carrito Copyleft</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Iniciar sesion</button>
  </form>
</footer>
<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <script>

        	function abrirModal(id){
        		console.log(id);
        		$("#id-producto").val(id);
        		$("#agregar-modal").modal();

        	}
        	function agregarCantidad(cantidad,idProducto){
        	
        		var cantidades = [];
        		var infoProductos = {
        			"cantidad":cantidad,
        			"idProducto":idProducto
        		}
        		cantidades.push(cantidad);
        		console.log(cantidades);
        	}
        </script>
</body>
</html>
