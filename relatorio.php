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
									<h3 class="panel-title"><?php echo $lang['REPORT_HEADING']?></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>										
									</div>
								</div>
								<?php
									$unplanned = $_POST["unplanned"];
								?>
								<div class="panel-body no-padding">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1">
											<?php display_message(); ?>
											<form class="form-horizontal" data-toggle="validator" role="form" method="post" action="relatorio.php" enctype="multipart/form-data" name="form1" id="form1">
												<div class="form-group">
													<label for="projeto" class="col-lg-2 control-label"><?php echo $lang['REPORT_TEXT1']?></label>
													<div class="col-lg-7">
													<?php    
														if ($unplanned == 1){
														?>
														<select id="projeto" name="projeto" class="selectpicker show-tick form-control" data-live-search="true">
															<option><?php echo $lang['TEST_TEXT5']; ?></option>
														</select>
													<?php    
														}else{
														?>
														<select id="projeto" name="projeto" class="selectpicker show-tick form-control" data-live-search="true">
															<?php $result = ListProjeto($_SESSION['email']); ?>
															<?php if ($result != null){ ?>
																	<?php while($aux_query = $result->fetch_assoc()) { ?>							
																		<?php if (isset($_POST['submit']) || isset($_POST['Imprimir'])) {
																			$projeto =  $_POST['projeto'];
																				if ($projeto > 0 && $projeto == $aux_query["id"]){
																					if ($aux_query["titulo"] != "unplanned" ){
																					?>																		
																						<option value="<?php echo $aux_query["id"] ?>" selected ><?php echo $aux_query["titulo"] ?></option>
																					<?php 	
																					}
																				}else{
																					if ($aux_query["titulo"] != "unplanned" ){
																					?>	<option value="<?php echo $aux_query["id"] ?>"><?php echo $aux_query["titulo"] ?></option>
																					<?php 
																					}
																				}							  
																			}else{
																				if ($aux_query["titulo"] != "unplanned" ){
																				?>	  
																					<option value="<?php echo $aux_query["id"] ?>"><?php echo $aux_query["titulo"] ?></option>
																				
																		<?php 
																				}
																			} 
																		} 
																	} ?>
														</select>
													<?php    
														}														
													?> 
													</div>	
													<div class="col-lg-3">
														<div><input type="submit" name="submit" value="<?php echo $lang['REPORT_BTN_CARREGAR']?>" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
													</div>
												</div>
												<!--			<div class="form-group">
												</div>-->
												<div class="form-group">
													<label for="projeto" class="col-lg-2 control-label"><?php echo $lang['REPORT_TEXT2']?></label>
													<div class="col-lg-7">
														<select id="projeto_rel" name="projeto_rel" class="selectpicker show-tick form-control" data-live-search="true">
															<?php 
																$proj =  $_POST['projeto'];
																if ($unplanned == 1){
																	$sqlUmplanned = "SELECT id FROM projeto WHERE titulo '= unplanned' ";
																	$result = $conn->query($sql);
																	if ($result->num_rows > 0) {
																		while($row = $result->fetch_assoc()) {
																		    $proj = $row["id"];
																		}
																	} else {
																		$proj = 0;
																	}
																}
																if ($proj > 0 ){
																	$projeto_rel =  $_POST['projeto_rel'];
																	$resultrel = ListProjetoRel($_SESSION['email'], $proj); ?>
															<?php if ($resultrel != null){ ?>
																	<option value="0"><?php echo $lang['REPORT_TEXT3']?></option>
															<?php while($aux_queryrel = $resultrel->fetch_assoc()) { 
																	if ($projeto_rel > 0 && $projeto_rel == $aux_queryrel["id"]){?>
																		<option value="<?php echo $aux_queryrel["id"] ?>" selected ><?php echo $aux_queryrel["titulo"] ?></option>
															<?php	}else{
																	?>	<option value="<?php echo $aux_queryrel["id"] ?>"><?php echo $aux_queryrel["titulo"] ?></option>
															<?php 		}
																	} 
																}
																else{
																?><option value="0"><?php echo $lang['REPORT_TEXT4']?></option>
																<?php }
															}else{
																?> <option value="0"><?php echo $lang['REPORT_TEXT5']?></option> <?php
															}	?>
														</select>
													</div>
													<div class="col-lg-3">
														<div><input type="submit" name="Imprimir" value="<?php echo $lang['REPORT_BTN_IMPRIMIR']?>" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
													</div>				
												</div>
												<div class="form-group">
													<div class="col-md-2"></div>
													<?php    
														if ($unplanned == 1){
														?>
															<label class="fancy-checkbox element-left">
																<input id="unplanned" type="checkbox" name="unplanned" value="1" checked>
																<span><?php echo $lang['TEST_TEXT5']; ?></span>
															</label>
													<?php    
														}else{
														?>
															<label class="fancy-checkbox element-left">
																<input id="unplanned" type="checkbox" name="unplanned" value="1">
																<span><?php echo $lang['TEST_TEXT5']; ?></span>
															</label>
													<?php    
														}														
													?> 
												</div>
												<?php $campo = $lang['REPORT_BTN_IMPRIMIR'];							
													if (isset($_POST['Imprimir']) or ($_POST['Print']) or ($_POST['Impresión'])) {?>
													<?php 
														
														$project =  $_POST['projeto'];
														
														if ($unplanned == 1){
															$sqlUmplanned = "SELECT id FROM projeto WHERE titulo '= unplanned' ";
															$result = $conn->query($sql);
															if ($result->num_rows > 0) {
																while($row = $result->fetch_assoc()) {
																    $project = $row["id"];
																}
															} else {
																$project = 0;
															}
														}
														
														$project_rel =  $_POST['projeto_rel'];
														if ($project > 0 && $project_rel > 0){?>
													<hr class="colorgraph">			
														<div>
															<div class="col-lg-12">
																<div class="panel panel-default">
																	<div class="panel-heading"><h3><?php echo $lang['REPORT_TB_HEADING']?></h3></div>
																	<div class="panel-body">
																		<table class="table table-condensed">
																			<thead>	
																				<tr>
																					<th><?php echo $lang['REPORT_TB_COL1']?></th>
																					<th><?php echo $lang['REPORT_TB_COL2']?></th>
																					<th><?php echo $lang['REPORT_TB_COL3']?></th>
																					<th><?php echo $lang['REPORT_TB_COL4']?></th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																			<?php 
																			$resultp = ListProjetoImp($_SESSION['email'], $project);
																			if ($resultp != null){
																				while ($query = $resultp->fetch_assoc()) {													
																				?>	<td><?php echo $query["titulo"] ?></td>
																					<td><?php echo $query["qtdactiv"] ?></td>
																				<?php
																				}
																				$resultperm = ListPermissoes($project);
																				$arrayperm = array();
																				if ($resultperm != null){
																					while ($queryperm = $resultperm->fetch_assoc()) {
																						array_push($arrayperm,$queryperm["permissao"]);
																					}
																				}
																			}
																			$resultr = ListProjetoRelImp($_SESSION['email'], $project, $project_rel); 
																			if ($resultr != null){
																				while ($queryrel = $resultr->fetch_assoc()){
																				?>	<td><?php echo $queryrel["titulo"] ?></td>
																					<td><?php echo $queryrel["qtdactiv"] ?></td>
																				<?php
																				}
																				$resultpermrel = ListPermissoesRel($project_rel);
																				$arraypermrel = array();
																				if ($resultpermrel != null){
																					while ($querypermrel = $resultpermrel->fetch_assoc()) {
																						array_push($arraypermrel,$querypermrel["permissao"]);
																					}
																				}
																			}
																			$resultjoin=array_uintersect($arrayperm,$arraypermrel,"ArrayJoin");
																			$arraypermleft = array();
																			foreach ($arrayperm as $p) {
																				$t = 0; 
																				foreach ($resultjoin as $pj) {
																					if ($p == $pj){
																						$t = 1;
																					}
																				}
																				if ($t == 0){
																					array_push($arraypermleft,$p);
																				}
																			}
																			$arraypermright = array();
																			foreach ($arraypermrel as $pr) {
																				$tr = 0; 
																				foreach ($resultjoin as $prj) {
																					if ($pr == $prj){
																						$tr = 1;
																					}
																				}
																				if ($tr == 0){
																					array_push($arraypermright,$pr);
																				}
																			}
																			
																			?>
																				</tr>
																				<tr>
																					<td colspan="2">
																						<table class="table">
																							<thead>
																								<tr>
																									<th><?php echo $lang['REPORT_TB_COL5']?></th>
																								</tr>
																							</thead>
																						    <tbody>
																								<?php 
																									foreach ($resultjoin as $pfj) {
																										echo '<tr class="success">';
																										echo '<td>'.$pfj.'</td>';
																										echo '</tr>';
																									}
																								?>
																								<?php 
																									foreach ($arraypermleft as $pl) {
																										echo '<tr class="danger">';
																										echo '<td>'.$pl.'</td>';
																										echo '</tr>';
																									}
																								?>
																							</tbody>	
																						</table>
																					</td>
																					<td colspan="2">
																						<table class="table">
																							<thead>
																								<tr>
																									<th><?php echo $lang['REPORT_TB_COL5']?></th>
																								</tr>
																							</thead>
																						    <tbody>
																								<?php 
																									foreach ($resultjoin as $pfrj) {
																										echo '<tr class="success">';
																										echo '<td>'.$pfrj.'</td>';
																										echo '</tr>';
																									}
																								?>
																								<?php 
																									foreach ($arraypermright as $pr) {
																										echo '<tr class="danger">';
																										echo '<td>'.$pr.'</td>';
																										echo '</tr>';
																									}
																								?>
																							</tbody>	
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
									
																		<?php 

																		if (count($arrayperm) == count($resultjoin) && count($arraypermrel) == count($arrayperm ) && count($arraypermleft) == 0 &&  count($arraypermright) == 0){
																			echo '<div class="alert alert-success"><p>'.$lang['REPORT_ALERT1'].'</p></div>';
																		}else{
																			if (count($arrayperm) == count($resultjoin) && count($arraypermrel) <> count($arrayperm ) && count($arraypermleft) == 0 &&  count($arraypermright) == 0 ){
																				echo '<div class="alert alert-warning"><p>'.$lang['REPORT_ALERT2'].'</p></div>';
																			}else{
																				if(count($arrayperm) <> count($resultjoin) && count($arraypermleft) >= 0 &&  count($arraypermright) >= 0 ){
																					echo '<div class="alert alert-danger"><p class="danger">'.$lang['REPORT_ALERT3'].'</p></div>';
																				}
																			}									
																		}

																		$path = 'uploads/' .$project. '/' .$project_rel . '/';
																		$diretorio = dir($path);
																		echo "Download Malware Test: " ; 

																		$arquivo = $diretorio -> read();
																		echo "<a href='".$path.$arquivo."' target='_blank' >".$arquivo."</a><br/><br/>";
																		
																		$file = fopen("$path$arquivo","r");
																		//echo "$path.$arquivo";
																		while( !feof($file)){
																			$linha = fgets($file);
																			echo $linha ."<br>";
																		}
																		
																		fclose($arquivo);
																		
																		$diretorio -> close();									
																		?>
																	</div>        
																</div>         
															</div>       
														</div>																
													<?php 
														}						
													?>
													<?php 
												}
												?>						
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