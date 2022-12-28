<?php include_once "encabezado.php";

$usuario = $_SESSION["usuario"];
if($usuario == TRUE && ($usuario->rol == "admin" || $usuario->rol == "manager" )){
	echo "Bienvenido ".$usuario->email;
	echo "<br><a href='logout.php'>Cerrar sesión</a>";
} elseif ($usuario == FALSE) {
	header("Location: ./login.php");
}
?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT compras.total, compras.fecha, compras.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_comprados.cantidad SEPARATOR '__') AS productos FROM compras INNER JOIN productos_comprados ON productos_comprados.id_compra = compras.id INNER JOIN productos ON productos.id = productos_comprados.id_producto GROUP BY compras.id ORDER BY compras.id;");
$compras = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Factura</h1>
		<div>
			<a class="btn btn-success" href="./comprar.php">Nueva Compra <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered" id="tablaxd1">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos comprados</th>
					<th>Total</th>


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
					<td>CLP$ <?php echo $compra->total ?></td>
					
					
				</tr>
				<?php } ?>
			<form>Busqueda: <input id="txtBusqueda" type="text" onkeyup="Buscar();" /></form>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>

<script type="text/javascript">// < ![CDATA[
function Buscar() {
            var tabla = document.getElementById('tablaxd1');
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