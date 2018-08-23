<?php
include_once "includes/init.php";
?>

<!doctype html>
<html lang="en">

<head>
	<title>MobiSec - <?php echo $lang['PAGE_TITLE']; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<!--<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">-->
	<!--<link rel="stylesheet" href="dist/css/BsMultiSelect.css">-->

	<!--<link rel="stylesheet" href="arquivos/style.css">
	<link rel="stylesheet" href="arquivos/prism.css">
	<link rel="stylesheet" href="arquivos/chosen.css">-->

	<link rel="stylesheet" href="css/bootstrap-select.css">


</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="admin.php"><img src="img/LOGO.png" alt="MobiSec" height="25px" class="logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div class="navbar-btn navbar-btn-right">
					<a href="logout.php"><i class="lnr lnr-exit"></i> <span><?php echo $lang['MENU_LOGOUT']; ?></span></a>
					<a href="admin.php?lang=us"><img src="images/us.png" /></a>
					<a href="admin.php?lang=br" class="active"><img src="images/br.png" /></a>
					<a href="admin.php?lang=es"><img src="images/es.png" /></a>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="admin.php" class=""><i class="lnr lnr-home"></i> <span><?php echo $lang['MENU_ADMIN']; ?></span></a></li>
						<li><a href="cadastrar.php" class=""><i class="lnr lnr-code"></i> <span><?php echo $lang['MENU_REGISTER']; ?></span></a></li>
						<li><a href="testar.php" class=""><i class="lnr lnr-cog"></i> <span><?php echo $lang['MENU_TEST']; ?></span></a></li>
						<li><a href="relatorio.php" class=""><i class="lnr lnr-printer"></i> <span><?php echo $lang['MENU_REPORT']; ?></span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->