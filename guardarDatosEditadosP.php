<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["email"]) || 
	!isset($_POST["password"]) || 
	!isset($_POST["rol"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...
include_once "base_de_datos.php";
$email = $_POST["email"];
$password = $_POST["password"];
$rol = $_POST["rol"];
$id = $_POST["id"];

$sentencia = $base_de_datos->prepare("UPDATE usuarios SET email = ?, password = ?, rol = ? WHERE id = ?;");
$resultado = $sentencia->execute([$email, $password, $rol, $id]);

if($resultado === TRUE){
	header("Location: ./gestion.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>