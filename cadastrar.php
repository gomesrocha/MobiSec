<?php
include_once "header.php";
include_once "includes/cadastrar.inc.php";

$arquivo = fopen('includes/permissoes.txt','r');

if(!logged_in()) {
	redirect("index.php");
}
?>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><?php echo $lang['CADASTRAR_HEADING']; ?></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>										
									</div>
								</div>
								<div class="panel-body no-padding">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1">
											<?php display_message(); ?>
											<form role="form" method="post" name="cadastro_form">
												<div class="row">
													<div class="col-xs-12 col-sm-8 col-md-8">
														<div class="form-group">
															<input type="text" name="titulo" id="titulo" class="form-control input-lg" placeholder="<?php echo $lang['CADASTRAR_TITLE']; ?>" tabindex="1" required>
														</div>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4">
														<div class="form-group">
															<input type="number" name="QtdActiv" id="QtdActiv" class="form-control input-lg" placeholder="<?php echo $lang['CADASTRAR_ACTIVITYS']; ?>" tabindex="2" required>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12">
														<div class="form-group">
															<select name="perm_sel[]" class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> 
																<?php while(!feof($arquivo)) { ?>
																<?php $valor = fgets($arquivo); ?>
																<option value="<?php echo $valor ?>"><?php echo $valor ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
						
												<div class="row">
													<div class="col-xs-12 col-md-4"><input type="submit" name="submit" value="<?php echo $lang['CADASTRAR_BTN_REG']; ?>" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
												</div>
												<br>
											</form>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"></i>GPITIC - UNIT</span></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
<?php
include_once "footer.php";
?>