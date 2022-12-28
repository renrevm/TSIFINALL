<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["rutcliente"]) || !isset($_POST["nombre"]) || !isset($_POST["direccion"]) || !isset($_POST["fono"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$rutcliente = $_POST["rutcliente"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$fono = $_POST["fono"];

$sentencia = $base_de_datos->prepare("INSERT INTO clientes(idcli, nombrecliente, direccion, fono) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$rutcliente, $nombre, $direccion, $fono]);

if($resultado === TRUE){
	header("Location: ./clientes.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>