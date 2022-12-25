<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["email"]) || !isset($_POST["password"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";

$email = $_POST["email"];
$password = $_POST["password"];
$sentencia = $base_de_datos->prepare("SELECT * FROM usuarios WHERE email = ?;");
$sentencia->execute([$email]);
$usuario = $sentencia->fetch(PDO::FETCH_OBJ);


if($usuario === FALSE){
	echo "¡El usuario o la contraseña son incorrectos!!!!!!";
	echo "<br><a href='login.php'>Volver a intentarlo</a>";
	
}
else{
	if($usuario == TRUE && $usuario->password == $password){
		session_start();
		$_SESSION["usuario"] = $usuario;
		$ingreso = "ok";
		header("Location: ./listar.php");
		

		
	}
	else{
		echo "¡El usuario o la contraseña son incorrectos!";
		echo "<br><a href='login.php'>Volver a intentarlo</a>";
		
	}
}
?>

<?php include_once "pie.php" ?>