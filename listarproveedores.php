<?php include_once "encabezado.php" ?>

<?php

$usuario = $_SESSION["usuario"];
if($usuario == TRUE && (($usuario->rol == "manager" ) || ($usuario->rol == "admin" )) ){
	echo "Bienvenido ".$usuario->email;
	echo "<br><a href='logout.php'>Cerrar sesión</a>";
} elseif ($usuario == FALSE) {
	header("Location: ./login.php");
}
else{
	header("Location: ./login.php");
}


?>



<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM proveedores;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Usuarios</h1>
		<div>
			<a class="btn btn-success" href="./formularioProveedor.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>RUT</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Fono</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($personas as $personas){ ?>
				<tr>
					<td><?php echo $personas->rutprov ?></td>
					<td><?php echo $personas->nombreprov ?></td>
					<td><?php echo $personas->direccion ?></td>
					<td><?php echo $personas->fono ?></td>
					
					<td><a class="btn btn-danger" href="<?php echo "eliminarproveedor.php?rutprov=" . $personas->rutprov?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>