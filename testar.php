<?php
include_once "header.php";
?>

<?php 
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
									<h3 class="panel-title"><?php echo $lang['TEST_HEADING']; ?></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>										
									</div>
								</div>
								<div class="panel-body no-padding">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1">
											<?php 
											if (isset($_POST['submit'])) {	
 
												include 'includes/envia.php';											
											} 
											?>
											<form class="form-horizontal" data-toggle="validator" role="form" method="post" action="testar.php" enctype="multipart/form-data" name="form1" id="form1">
												<?php display_message(); ?>
												<div class="form-group">
													<label for="projeto" class="col-lg-4 control-label"><?php echo $lang['TEST_TEXT1']; ?></label>
													<div class="col-lg-8">
														<select id="projeto" name="projeto" class="selectpicker show-tick form-control" data-live-search="true">
															<?php $result = ListProjeto($_SESSION['email']); ?>
															<?php if ($result != null){ ?>
																<?php while($aux_query = $result->fetch_assoc()) { 
																		if ($aux_query["titulo"] != "unplanned" ){
																		?>
																			<option value="<?php echo $aux_query["id"] ?>"><?php echo $aux_query["titulo"] ?></option>
																		<?php 
																		} 
																	  }  
																} 
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="fileToUpload"><?php echo $lang['TEST_TEXT2']; ?></label>  
														<div class="col-md-8">
														<input id="fileToUpload" name="fileToUpload" type="file" class="form-control input-md" required="">
														<span class="help-block"><?php echo $lang['TEST_TEXT3']; ?></span>  
													</div>
												</div>
												<!--<div class="form-group clearfix">
													<div class="col-md-4"></div>
													<label class="fancy-checkbox element-left">
														<input id="malware" type="checkbox" name="malware" value="1">
														<span><?php //echo $lang['TEST_TEXT4']; ?></span>
													</label>
												</div>-->
												<div class="form-group clearfix">
													<div class="col-md-4"></div>
													<label class="fancy-checkbox element-left">
														<input id="unplanned" type="checkbox" name="unplanned" value="1">
														<span><?php echo $lang['TEST_TEXT5']; ?></span>
													</label>
												</div>
												<div class="row">
													<div class="col-xs-12 col-md-4"><input type="submit" name="submit" value="<?php echo $lang['TEST_BTN_ENVIA']; ?>" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
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