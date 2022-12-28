<?php
if(!isset($_POST["total"])) exit;


session_start();



$total = $_POST["total"];
include_once "base_de_datos.php";

$proveedor = $_POST["proveedor"];
$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO compras(fecha, total, idusuario, idpro) VALUES (?, ?, ?, ?);");
$sentencia->execute([$ahora, $total, $_SESSION["usuario"]->id, $proveedor]);

$sentencia = $base_de_datos->prepare("SELECT id FROM compras ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idCompra = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO productos_comprados(id_producto, id_compra, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE productos SET existencia = existencia + ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id, $idCompra, $producto->cantidad]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./comprar.php?status=1");
?>