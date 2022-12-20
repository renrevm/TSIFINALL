<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT compras.total, compras.fecha, compras.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_comprados.cantidad SEPARATOR '__') AS productos FROM compras INNER JOIN productos_comprados ON productos_comprados.id_compra = compras.id INNER JOIN productos ON productos.id = productos_comprados.id_producto GROUP BY compras.id ORDER BY compras.id;");
$compras = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Compras</h1>
		<div>
			<a class="btn btn-success" href="./comprar.php">Nueva Compra <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos comprados</th>
					<th>Total</th>
					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($compras as $compra){ ?>
				<tr>
					<td><?php echo $compra->id ?></td>
					<td><?php echo $compra->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $compra->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $compra->total ?></td>
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $compra->id?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarCompra.php?id=" . $compra->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>