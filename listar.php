<?php include_once "encabezado.php" ?>

<?php

$usuario = $_SESSION["usuario"];
if($usuario == TRUE && ($usuario->rol == "admin" || $usuario->rol == "seller" || $usuario->rol == "manager" )){
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
$sentencia = $base_de_datos->query("SELECT * FROM productos p, categorias c WHERE p.idcat = c.idc AND eliminado IS NULL;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Productos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered" id="tablaxd">
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Categoría</th>
					<th>Precio de compra</th>
					<th>Precio de venta</th>
					<th>Existencia</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->nombrecat ?></td>
					<td>CLP$ <?php echo $producto->precioCompra ?></td>
					<td>CLP$ <?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->existencia ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			<form>Busqueda: <input id="txtBusqueda" type="text" onkeyup="Buscar();" /></form>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>

    
<script type="text/javascript">// < ![CDATA[
function Buscar() {
            var tabla = document.getElementById('tablaxd');
            var busqueda = document.getElementById('txtBusqueda').value.toLowerCase();
            var cellsOfRow="";
            var found=false;
            var compareWith="";
            for (var i = 1; i < tabla.rows.length; i++) {
                cellsOfRow = tabla.rows[i].getElementsByTagName('td');
                found = false;
                for (var j = 0; j < cellsOfRow.length && !found; j++) { compareWith = cellsOfRow[j].innerHTML.toLowerCase(); if (busqueda.length == 0 || (compareWith.indexOf(busqueda) > -1))
                    {
                        found = true;
                    }
                }
                if(found)
                {
                    tabla.rows[i].style.display = '';
                } else {
                    tabla.rows[i].style.display = 'none';
                }
            }
        }
// ]]></script>
