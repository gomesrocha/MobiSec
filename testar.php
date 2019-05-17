<?php
include_once "header.php";
?>

<?php 
if(!logged_in()) {
	redirect("logout.php");
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
											<form class="form-horizontal" data-toggle="validator" role="form" method="post" action="" enctype="multipart/form-data" name="form1" id="form1">
                                                <?php
                                                if (isset($_POST['envia'])) {
                                                    include 'includes/envia.php';
                                                }
                                                display_message();
                                                ?>
												<div class="form-group">
													<label for="projeto" class="col-lg-4 control-label"><?php echo $lang['TEST_TEXT1']; ?></label>
                                                    <div class="col-lg-5">
														<select id="projeto" name="projeto" class="selectpicker show-tick form-control" data-live-search="true">
                                                            <option value=""></option>
                                                            <?php $result = ListProjeto($_SESSION['email']); ?>
															<?php if ($result != null){ ?>
																<?php while($aux_query = $result->fetch_assoc()) { 
                                                                        $projetosel = $_POST['projeto'];
																        if ($aux_query["id"] != $projetosel ){
																		?>
																			<option value="<?php echo $aux_query["id"] ?>"><?php echo $aux_query["titulo"] ?></option>
																		<?php 
																		}else{
                                                                        ?>
                                                                            <option value="<?php echo $aux_query["id"] ?>" selected ><?php echo $aux_query["titulo"] ?></option>
                                                                        <?php
                                                                        }
																	  }
																} 
															?>
														</select>
													</div>
                                                    <div class="col-lg-3">
                                                        <input type="submit" name="carregar" value="<?php echo $lang['TEST_BTN_CARREGAR']; ?>" class="btn btn-primary btn-block btn-lg" tabindex="7">
                                                    </div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="fileToUpload"><?php echo $lang['TEST_TEXT2']; ?></label>  
														<div class="col-md-8">
														<input id="fileToUpload" name="fileToUpload" type="file" class="form-control input-md" >
														<span class="help-block"><?php echo $lang['TEST_TEXT3']; ?></span>  
													</div>
												</div>

                                                <?php
                                                if (isset($_POST['carregar'])) {
                                                    $project1 = $_POST['projeto'];
                                                    $result1 = LerProjeto($_SESSION['email'],$project1);

                                                    $aux_query1 = $result1->fetch_assoc();
                                                    $analise1 = $aux_query1["analise_siste_permi"];
                                                    $analise2 = $aux_query1["analise_vulne_abugs"];
                                                    $analise3 = $aux_query1["analise_mawla_abugs"];
                                                    $analise4 = $aux_query1["analise_vulne_awarn"];
                                                }
                                                ?>

                                                <div class="form-group clearfix">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <label class="fancy-checkbox element-left">
                                                            <input id="analisepermi1" type="checkbox" name="analisepermi1" value="1" <?php if ($analise1 == 1){echo 'checked';}?>>
                                                            <span><?php echo $lang['CADASTRAR_PERMI1']; ?></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group clearfix">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <label class="fancy-checkbox element-left">
                                                            <input id="analisepermi2" type="checkbox" name="analisepermi2" value="1" <?php if ($analise2 == 1){echo 'checked';}?>>
                                                            <span><?php echo $lang['CADASTRAR_PERMI2']; ?></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group clearfix">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <label class="fancy-checkbox element-left">
                                                            <input id="analisepermi3" type="checkbox" name="analisepermi3" value="1" <?php if ($analise3 == 1){echo 'checked';}?>>
                                                            <span><?php echo $lang['CADASTRAR_PERMI3']; ?></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group clearfix">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <label class="fancy-checkbox element-left">
                                                            <input id="analisepermi4" type="checkbox" name="analisepermi4" value="1" <?php if ($analise4 == 1){echo 'checked';}?>>
                                                            <span><?php echo $lang['CADASTRAR_PERMI4']; ?></span>
                                                        </label>
                                                    </div>
                                                </div>

												<div class="row">
													<div class="col-xs-12 col-md-4"><input type="submit" name="envia" value="<?php echo $lang['TEST_BTN_ENVIA']; ?>" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
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