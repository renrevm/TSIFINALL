<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["rutproveedor"]) || !isset($_POST["nombre"]) || !isset($_POST["direccion"]) || !isset($_POST["fono"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$rutprov = $_POST["rutproveedor"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$fono = $_POST["fono"];

$sentencia = $base_de_datos->prepare("INSERT INTO proveedores(rutprov, nombreprov, direccion, fono) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$rutprov, $nombre, $direccion, $fono]);

if($resultado === TRUE){
	header("Location: ./listarproveedores.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>