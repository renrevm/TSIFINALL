<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>INICIO DE SESIÓN</h1>
	<form method="post" action="iniciosesion.php">
		<label for="correo">Correo electrónico:</label>
		<input class="form-control" name="email" required type="text" id="email" placeholder="Escribe el email:">
		<label for="codigo">Contraseña:</label>
		<input class="form-control" name="password" required type="text" id="password" placeholder="Escribe la contraseña:">

		
		<br><br><input class="btn btn-info" type="submit" value="Entrar">
	</form>
</div>
<?php include_once "pie.php" ?>