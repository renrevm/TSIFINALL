<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo Trabajador</h1>
	<form method="post" action="nuevoP.php">
		<label for="correo">Email:</label>
		<textarea required id="correo" name="correo" cols="30" rows="5" class="form-control"></textarea>

		<label for="password">Contraseña:</label>
		<textarea required id="password" name="password" cols="30" rows="5" class="form-control"></textarea>

		<label for="rol">Cargo:</label>
		<select required id="rol" name="rol" cols="30" rows="5" class="form-control">
			<option value="admin">Administrador</option>
			<option value="seller">Vendedor</option>
		</select>
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>