<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="codigo">Código de barras:</label>
		<input class="form-control" name="codigo" required type="text" min="0" id="codigo" placeholder="Escribe el código">

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>

		<label for="categoria">Categoría:</label>
		<select required id="categoria" name="categoria" cols="30" rows="5" class="form-control">
			<option value="1">Carnes</option>
			<option value="2">Accesorios</option>
			<option value="3">Bebidas</option>
			<option value="4">Picoteo</option>
		</select>

		<label for="precioVenta">Precio de venta:</label>
		<input class="form-control" name="precioVenta" required type="number" min="0" id="precioVenta" placeholder="Precio de venta">

		<label for="precioCompra">Precio de compra:</label>
		<input class="form-control" name="precioCompra" required type="number" id="precioCompra" min="0" placeholder="Precio de compra">

		<label for="existencia">Existencia:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" min="0" placeholder="Cantidad o existencia">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>