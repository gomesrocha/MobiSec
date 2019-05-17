
<?php
include_once "includes/init.php";
include_once "includes/register.inc.php";

if(!logged_in()) {
    redirect("logout.php");
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
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
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
								<?php display_message(); ?>
								<form class="form-auth-small" role="form" method="post" name="registration_form">
									<h2><?php echo $lang['REGISTER_HEADING1']; ?><small><?php echo $lang['REGISTER_HEADING2']; ?></small></h2>
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6">
											<div class="form-group">
												<input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="<?php echo $lang['REGISTER_NOME']; ?>" tabindex="1" required>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6">
											<div class="form-group">
												<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="<?php echo $lang['REGISTER_SOBRENOME']; ?>" tabindex="2" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="<?php echo $lang['REGISTER_APELIDO']; ?>" tabindex="3" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" class="form-control input-lg" placeholder="<?php echo $lang['REGISTER_ENDEMAIL']; ?>" tabindex="4" required>
									</div>
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6">
											<div class="form-group">
												<input type="password" name="password" id="password" class="form-control input-lg" placeholder="<?php echo $lang['REGISTER_SENHA']; ?>" tabindex="5" required>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6">
											<div class="form-group">
												<input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="<?php echo $lang['REGISTER_CSENHA']; ?>" tabindex="6" required>
											</div>
										</div>
									</div>
									<!--<div class="row">
										<div class="col-xs-4 col-sm-3 col-md-3 checkbox">
											<label>
												<input type="checkbox" required> <?php echo $lang['REGISTER_LICENCA']; ?>
											</label>
										</div>
										<div class="col-xs-8 col-sm-9 col-md-9">
											<?php echo $lang['REGISTER_TEXT1']; ?> <strong class="label label-primary"><?php echo $lang['REGISTER_TEXT2']; ?></strong><?php echo $lang['REGISTER_TEXT3']; ?><a href="#" data-toggle="modal" data-target="#t_and_c_m"><?php echo $lang['REGISTER_TEXT4']; ?></a><?php echo $lang['REGISTER_TEXT5']; ?>
										</div>
									</div>-->
					
									<div class="row">
										<div class="col-xs-12 col-md-6"><input type="submit" name="submit" value="<?php echo $lang['REGISTER_BTN_REG']; ?>" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
										<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg"><?php echo $lang['REGISTER_BTN_LOGIN']; ?></a></div>
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
		<!-- Modal -->
		<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel"><?php echo $lang['REGISTER_TERM1']; ?></h4>
					</div>
					<div class="modal-body">
						<div class="cell-wrapper layout-widget-wrapper">
							<span id="hs_cos_wrapper_module_14473525897074839" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><h2><span style="color: #759aa9;">Política de Privacidade</span></h2>
							<br>
							<p style="text-align: justify;"><?php echo $lang['REGISTER_TERM2']; ?></p>
							<ul style="text-align: justify; color: #7ea8b9;">
							<li><strong><?php echo $lang['REGISTER_TERM3']; ?></strong></li>
							</ul>
							<p style="text-align: justify;"><?php echo $lang['REGISTER_TERM4']; ?><br><br><?php echo $lang['REGISTER_TERM5']; ?><br><br><?php echo $lang['REGISTER_TERM6']; ?><br><br><?php echo $lang['REGISTER_TERM7']; ?><br><br><?php echo $lang['REGISTER_TERM8']; ?><br><br><?php echo $lang['REGISTER_TERM9']; ?><br><br><?php echo $lang['REGISTER_TERM10']; ?><br><br><?php echo $lang['REGISTER_TERM11']; ?><br><br><?php echo $lang['REGISTER_TERM12']; ?></p>
							<p style="text-align: justify;">&nbsp;</p>
							<ul style="text-align: justify; color: #7ea8b9;">
							<li><strong><?php echo $lang['REGISTER_TERM13']; ?></strong></li>
							</ul>
							<p style="text-align: justify;"><?php echo $lang['REGISTER_TERM14']; ?></p>
							<p style="text-align: justify;">&nbsp;</p>
							<ul style="text-align: justify; color: #7ea8b9;">
							<li><strong><?php echo $lang['REGISTER_TERM15']; ?></strong></li>
							</ul>
							<p style="text-align: justify;"><?php echo $lang['REGISTER_TERM16']; ?><br><br><?php echo $lang['REGISTER_TERM17']; ?><br><br><?php echo $lang['REGISTER_TERM18']; ?><br><br><?php echo $lang['REGISTER_TERM19']; ?><br><br><?php echo $lang['REGISTER_TERM20']; ?></p>
							<p style="text-align: justify;">&nbsp;</p>
							<ul style="text-align: justify; color: #7ea8b9;">
							<li><strong><?php echo $lang['REGISTER_TERM21']; ?></strong></li>
							</ul>
							<p style="text-align: justify;"><?php echo $lang['REGISTER_TERM22']; ?></p></span>
	                    </div>				
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $lang['REGISTER_BTN_TERM']; ?></button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<script>
			var password = document.getElementById("password")
			, confirm_password = document.getElementById("confirm_password");
		
			function validatePassword(){
				if(password.value != confirm_password.value) {
					confirm_password.setCustomValidity("<?php echo $lang['REGISTER_ERRO1']; ?>");
				} else {
					confirm_password.setCustomValidity('');
				}
			}
		
			password.onchange = validatePassword;
			confirm_password.onkeyup = validatePassword;
		</script>
	</body>
</html>