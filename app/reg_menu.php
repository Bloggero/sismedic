<?php 
session_start();
$_SESSION['detalle'] = array();

require_once 'Config/conexion.php';
require_once 'Model/Producto.php';

$objProducto = new Producto();
$resultado_producto = $objProducto->get();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Carrito de Compras</title>

    <!-- Bootstrap

    <link href="libs/css/bootstrap.css" rel="stylesheet">
    <script src="libs/js/jquery.js"></script>
    <script src="libs/js/jquery-1.8.3.min.js"></script>
    <script src="libs/js/bootstrap.min.js"></script>
   	 -->
    <script type="text/javascript" src="libs/ajax.js"></script>
	
	 <!-- Alertity -->
    <link rel="stylesheet" href="libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="libs/js/alertify/lib/alertify.min.js"></script>
  </head>

  <body>
 	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-3 col-sm-3 col-md-3">
						<!-- etiqueta 
						<label class="col-md-12">Código</label> -->
						<!-- control -->
						<input id="txt_codigo" name="txt_codigo" type="text" class="col-md-12 form-control" placeholder="Ingrese código" autocomplete="on" />
					</div>

					<div class="col-3 col-sm-3 col-md-3">
						<!-- etiqueta 
						<label class="col-md-12">Producto</label> -->
						
						<!-- control -->
						<select name="cbo_producto" id="cbo_producto" class="col-md-12 form-control">
							<option value="0">Seleccione un producto</option>
							<?php foreach($resultado_producto as $producto):?>
								<option value="<?php echo $producto['id']?>"><?php echo $producto['descripcion']?></option>
							<?php endforeach;?>
						</select>
					</div>
							
					<div class="col-3 col-sm-3 col-md-3">
						<!-- etiqueta 
						<label class="col-md-12">Cantidad</label> -->
						<!-- control -->
						<input id="txt_cantidad" name="txt_cantidad" type="text" class="col-md-12 form-control" placeholder="Ingrese cantidad" autocomplete="off" />
					</div>
					<div class="col-3 col-sm-3 col-md-3">
						<!-- etiqueta -->

						
						<!-- control -->
						
							<button type="button" class="btn btn-success btn-agregar-producto" style="margin-top: 0px;">Agregar</button>
						
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="panel panel-info">
			 <div class="panel-heading">
		        <h3 class="panel-title">Productos</h3>
		      </div>
			<div class="panel-body detalle-producto">
				<?php if(count($_SESSION['detalle'])>0){?>
					<table class="table">
					    <thead>
					        <tr>
					            <th>Descripci&oacute;n</th>
					            <th>Cantidad</th>
					            <th>Precio</th>
					            <th>Subtotal</th>
					            <th></th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    	foreach($_SESSION['detalle'] as $k => $detalle){ 
					    	?>
					        <tr>
					        	<td><?php echo $detalle['producto'];?></td>
					            <td><?php echo $detalle['cantidad'];?></td>
					            <td><?php echo $detalle['precio'];?></td>
					            <td><?php echo $detalle['subtotal'];?></td>
					            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
					        </tr>
					        <?php }?>
					    </tbody>
					</table>
				<?php }else{?>
				<div class="panel-body"> No hay productos agregados</div>
				<?php }?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-right">
				<button type="button" class="btn btn-sm btn-default guardar-carrito">Guardar</button>
			</div>
		</div>
 	</div>
  </body>
</html>
