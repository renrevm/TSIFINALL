<?php

include_once "encabezado.php";
include_once "base_de_datos.php";
$proveedores = $base_de_datos->query("SELECT * FROM proveedores;")->fetchAll(PDO::FETCH_OBJ);

$usuario = $_SESSION["usuario"];
if($usuario == TRUE && ($usuario->rol == "admin" || $usuario->rol == "manager" )){
	echo "Bienvenido ".$usuario->email;
	echo "<br><a href='logout.php'>Cerrar sesión</a>";
} elseif ($usuario == FALSE) {
	header("Location: ./login.php");
}

if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<div class="col-xs-12">
	<h1>Comprar Productos</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Compra realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Compra cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Ok</strong> Producto quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> El producto que buscas no existe
			</div>
		<?php
		}/* else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>El producto está agotado
			</div>
		<?php
		}*/ else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la compra
			</div>
	<?php
		}
	}
	?>
	<br>
	<form method="post" action="agregarAlCarritoC.php">
		<label for="proveedor">Proveedor:</label>
			<select required id="proveedor" name="proveedor" cols="30" rows="5" class="form-control">
				<?php foreach ($proveedores as $proveedor) { ?>
					<option value="<?php echo $proveedor->rutprov ?>"><?php echo $proveedor->nombreprov ?></option>
				<?php } ?>
			</select>


		<label for="codigo">Código de barras:</label>
		<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
	</form>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Código</th>
				<th>Descripción</th>
				<th>Precio de Compra</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION["carrito"] as $indice => $producto) {
				$granTotal += $producto->total;
			?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td>CLP$ <?php echo $producto->precioCompra ?></td>
					<td>
						<form action="cambiar_cantidadC.php" method="post">
							<input name="indice" type="hidden" value="<?php echo $indice; ?>">
							<input min="1" name="cantidad" class="form-control" required type="number" step="0.1" value="<?php echo $producto->cantidad; ?>">
						</form>
					</td>
					<td>CLP$ <?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarritoCompra.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<h3>Total: <?php echo $granTotal; ?></h3>
	<form action="./terminarCompra.php" method="POST">
		<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
		<button type="submit" class="btn btn-success">Terminar Compra</button>
		<a href="./cancelarCompra.php" class="btn btn-danger">Cancelar Compra</a>
	</form>
</div>
<?php include_once "pie.php" ?>