<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo Cliente</h1>
	<form method="post" action="listarclientes.php">
		<label for="rutcliente">Rut cliente:</label>
		<input class="form-control" name="rutcliente" required type="number" id="rutcliente" placeholder="Rut del cliente">

		<label for="nombre">Nombre:</label>
		<textarea required id="nombre" name="nombre" cols="30" rows="5" class="form-control"></textarea>

		<label for="direccion">Direccion:</label>
		<textarea required id="direccion" name="direccion" cols="30" rows="5" class="form-control"></textarea>

		<label for="fono">Fono:</label>
		<input class="form-control" name="fono" required type="number" id="fono" placeholder="Numero del cliente">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>