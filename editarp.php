<?php



if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM usuarios WHERE id = ?;");
$sentencia->execute([$id]);
$personas = $sentencia->fetch(PDO::FETCH_OBJ);
if($personas === FALSE){
	echo "¡No existe tal persona en la base de datos!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar Trabajador <?php echo $personas->id; ?></h1>
		<form method="post" action="guardarDatosEditadosP.php">
			<input type="hidden" name="id" value="<?php echo $personas->id; ?>">
	
			<label for="email">Correo:</label>
			<input value="<?php echo $personas->email ?>" class="form-control" name="email" required type="text" id="email" placeholder="Escriba el email">

			<label for="contraseña">Password:</label>
			<input value="<?php echo $personas->password ?>" class="form-control" name="password" required type="password" id="password" placeholder="Escriba la contraseña">

			<label for="rol">Rol:</label>
			<select value="<?php echo $personas->rol ?>" class="form-control" name="rol" required type="text" id="rol" placeholder="Rol" >
                <option value="admin">Administrador</option>
                <option value="seller">Vendedor</option>
            </select>
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./gestion.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
