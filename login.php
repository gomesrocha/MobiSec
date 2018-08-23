<?php
include_once "includes/init.php";
include_once "includes/login.inc.php";

if(logged_in()) {
    redirect("admin.php");
}
?>

<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>MobiSec - <?php echo $lang['PAGE_TITLE']; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="images/LOGO.png" alt="MobiSec Logo"></div>
								<p class="lead"><?php echo $lang['LOGIN_HEADING']; ?></p>
							</div>
							<?php display_message(); ?>
							<form class="form-auth-small" id="loginform" method="post" role="form">
								<div class="form-group">
									<input type="text" class="form-control" id="email" name="email" value="" placeholder="E-mail">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" value="" placeholder="<?php echo $lang['LOGIN_SENHA']; ?>">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input id="remember" type="checkbox" name="remember" value="1">
										<span><?php echo $lang['LOGIN_REMEMBER']; ?></span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block"><?php echo $lang['LOGIN_BTN_ACESS']; ?></button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <?php echo $lang['LOGIN_NO_ACESS']; ?>
												<a href="register.php"><?php echo $lang['LOGIN_REGISTER']; ?></a></span>
								</div>
								<div class="bottom">
									<span class="helper-text"><a href="index.php"><?php echo $lang['MENU_HOME']; ?></a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading"><?php echo $lang['INDEX_HEADING_TITLE']; ?></h1>
							<p>&copy; 2017 - MobiSec</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>