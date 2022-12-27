<?php include_once "encabezado.php" ?>

<?php

$usuario = $_SESSION["usuario"];
if($usuario == TRUE && ($usuario->rol == "manager" )){
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
$sentencia = $base_de_datos->query("SELECT * FROM usuarios;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Usuarios</h1>
		<div>
			<a class="btn btn-success" href="./formularioP.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Correo</th>
					<th>Password</th>
					<th>Rol</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($personas as $personas){ ?>
				<tr>
					<?php
                    if ($personas->rol == "manager") {
                        continue;
                    }
                    ?>
                    <td><?php echo $personas->id ?></td>
					<td><?php echo $personas->email ?></td>
					<td type="password"><?php echo $personas->password ?></td>
					<td><?php echo $personas->rol ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarp.php?id=" . $personas->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarp.php?id=" . $personas->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>