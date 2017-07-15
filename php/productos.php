<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <title>Tabla de productos</title>
    </head>
    <body>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    			<div class="table-responsive">
	                  <table class="table table-bordered table-condensed table-striped table-hover" id="leads-table">
	                    <thead>
	                      <tr>
	                        <th>ID</th>
	                        <th>Descripci&oacute;n</th>
	                        <th>Cantidad en inventario</th>
	                        <th>Fecha de registro</th>
	                        <th>Agregar al carrito</th>

	                      </tr>
	                    </thead>
	                    <tbody>
					    	<?php 
							include "conexion.php";
							$query = "SELECT * FROM articulos";

							$sql = mysqli_query($conexion,$query);

							while($arreglo = mysqli_fetch_array($sql)){
									$id = $arreglo["id"];
									echo "<tr>";
									echo "<td>".$arreglo["id"] . "</td>";
									echo "<td>".$arreglo["descripcion"] . "</td>";
									echo "<td id='cantidad_en_inventario'>".$arreglo["cantidad_en_inventario"] . "</td>";
									echo "<td>".$arreglo["fecha_registro"] . "</td>";
									echo "<td><button class='btn btn-success pull-left' onclick='abrirModal($id)'>Agregar</button></td>";
									echo "</tr>";
							}
							?>
						</tbody>
                	</table>
    			</div>
    		</div>
		</div>
		<div id="agregar-modal" class="modal fade" role="dialog">
		    <div class="modal-dialog modal-sm">
		        <!-- Modal content-->
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal">&times;</button>
		                <h4 class="modal-title">Agregar al carrito</h4>
		            </div>
		            <div class="modal-body text-center">
		                Indique cuantos productos quiere agregar
		                <input id="cantidad-al-carrito" name='cantidad-al-carrito' type='number'/>
		                <input id="id-producto" type="hidden" />
		                <button class="btn btn-primary" onclick="agregarCantidad($('#cantidad-al-carrito').val(),
        		$('#id-producto').val())">Agregar</button>
		            </div>
		        </div>
		    </div>
		</div>
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