<?php
include_once "includes/init.php";
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="Iso-5589-1">
	<title>MobiSec</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="js/bootstrap-select.js"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">MobiSec</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Inicio</a></li>
						
						<?php if(!logged_in()) : ?>
							<li><a href="login.php">Login</a></li>
						<?php else : ?>
							<li><a href="admin.php">Admin</a></li>
							<li><a href="cadastrar.php">Cadastrar</a></li>
							<li><a href="testar.php">Testar</a></li>
							<li><a href="relatorio.php">Relatório</a></li>
							<li><a href="logout.php">Logout</a></li>
						<?php endif; ?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>