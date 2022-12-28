<?php
if(!isset($_GET["idcli"])) exit();
$id = $_GET["idcli"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM clientes WHERE idcli = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: ./listarclientes.php");
	exit;
}
else echo "Algo salió mal";
?>