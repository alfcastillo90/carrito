<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Carrito de compra</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<style>
			.navbar {
			  margin-bottom: 50px;
			  border-radius: 0;
			}
			 .jumbotron {
			  margin-bottom: 0;
			}
			footer {
			  background-color: #f2f2f2;
			  padding: 25px;
			}
		</style>
	</head>
	<body>
	<div class="jumbotron">
		<div class="container text-center">
			<h1>UNITEC</h1>
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
						echo '<div class="col-md-4" id="'.$id.'">';
						echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">'.$arreglo["nombre"] . '</div>';
						echo '<div class="panel-body text-center"><img id="imagen-producto" src="img/'.$arreglo["imagen"] . '" class="img-responsive" alt="Image" style="margin: 0 auto;">';
						echo '<p id="precio_venta"><b>Bs.: '.number_format($arreglo["precio_venta"],2,",",".") . '</b></p>';
						echo '<input id="cantidad_inventario" value="'.$arreglo["cantidad_inventario"].'" type="hidden"/>';
						echo '</div>';
						echo '<div class="panel-footer text-center"><button class="btn btn-success" onclick="abrirModal('.$arreglo["id"] .')">Detalles del producto</button></div>';
						echo '</div>
				    </div>';

				}
			?>
	  </div>
	</div>
	<br><br>
	<footer class="container-fluid text-center">
		<p>Carrito Copyleft</p>
		<form class="form-inline">Recibe ofertas:
			<input type="email" class="form-control" size="50" placeholder="Email Address">
			<button type="button" class="btn btn-danger">Suscribete</button>
		</form>
	</footer>
	<div id="producto-modal" class="modal fade" role="dialog">
	    <div class="modal-dialog modal-md">
	        <!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <h4 class="modal-title">Detalles del producto</h4>
	            </div>
	            <div class="modal-body">
	            <div class="row">
	            	<div class="col-md-6">
		            	<img alt="Image" class="img-responsive" id="imagen-modal">
					</div>
					<div class="col-md-6">
		            	<ul class="list-group">
						  <li class="list-group-item"><span id="nombre-producto"></span></li>
						  <li class="list-group-item"><span id="modal-precio-venta"></span></li>
						  <li class="list-group-item">Cantidad:<input id="modal-cantidad" min="1" max="" type="number"></li>
						</ul>
					</div>
				</div>
	            </div>
	             <div class="modal-footer">
	                <button type="button" class="btn btn-success pull-right">Agregar al carrito</button>
	                <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Cerrar</button>
	            </div>
	        </div>
	    </div>
	</div>
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script>
    	function abrirModal(id){
    		console.log(id);
    		$("#id-producto").val(id);
    		$("#producto-modal").modal();
    		$("#nombre-producto").text($("#"+id+" .panel-heading").text());
    		$("#modal-precio-venta").text($("#"+id+" #precio_venta").text());
    		$("#imagen-modal").attr("src",$("#"+id+" #imagen-producto").attr("src"));
    		$("#modal-cantidad").attr("max",$("#"+id+" #cantidad_inventario").val());
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
