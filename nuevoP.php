<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["correo"]) || !isset($_POST["password"]) || !isset($_POST["rol"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$email = $_POST["correo"];
$password = $_POST["password"];
$rol = $_POST["rol"];

$sentencia = $base_de_datos->prepare("INSERT INTO usuarios(email, password, rol) VALUES (?, ?, ?);");

$resultado = $sentencia->execute([$email, $password, $rol]);





if($resultado === TRUE){
	header("Location: ./gestion.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>