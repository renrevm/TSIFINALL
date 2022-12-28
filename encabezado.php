<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>
	
	<link rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link rel="stylesheet" href="./css/2.css">
	<link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top " style="background-color: #020202;">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">TSI</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				<?php if(isset($_SESSION["usuario"])){
    					if($_SESSION["usuario"] == true && $_SESSION["usuario"]->rol == "manager"){
        ?>              
						<li><a href="./gestion.php">Gestión usuarios</a></li> 
						<li><a href="./listar.php">Productos</a></li>
						<li><a href="./vender.php">Vender</a></li>
						<li><a href="./ventas.php">Ventas</a></li>
						<li><a href="./listarclientes.php">Clientes</a></li>
						<li><a href="./comprar.php">Comprar</a></li>
						<li><a href="./compras.php">Compras</a></li>
						<li><a href="./listarproveedores.php">Proveedores</a></li>
						<li><a href="./logout.php">Cerrar Sesión</a></li>
		<?php    } } ?>
		<?php if(isset($_SESSION["usuario"])){
    					if($_SESSION["usuario"] == true && $_SESSION["usuario"]->rol == "admin"){
        ?>               <li><a href="./listar.php">Productos</a></li>
						<li><a href="./comprar.php">Comprar</a></li>
						<li><a href="./compras.php">Compras</a></li>
						<li><a href="./listarproveedores.php">Proveedores</a></li>
						<li><a href="./logout.php">Cerrar Sesión</a></li>
		<?php    } } ?>
		<?php if(isset($_SESSION["usuario"])){
    					if($_SESSION["usuario"] == true && $_SESSION["usuario"]->rol == "seller"){
        ?>               <li><a href="./listar.php">Productos</a></li>
						<li><a href="./vender.php">Vender</a></li>
						<li><a href="./ventas.php">Ventas</a></li>
						<li><a href="./listarclientes.php">Clientes</a></li>
						<li><a href="./logout.php">Cerrar Sesión</a></li>
		<?php    } } ?>
		

					
					
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">