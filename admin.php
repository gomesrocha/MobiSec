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
							<div class="panel">
								<div class="panel-heading">								
									<h3 class="panel-title"><?php echo $lang['HOME_HEADING']; ?></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>										
									</div>								
								</div>
							    <div class="panel-body no-padding">
									<table class="table table-condensed" style="border-collapse:collapse;">
										<thead>	
											<tr>
												<th>&nbsp;</th>
												<th style="display: none;">ID</th>
												<th><?php echo $lang['HOME_TB_TITLE']; ?></th>
												<th><?php echo $lang['HOME_TB_ACTIVITYS']; ?></th>
												<th><?php echo $lang['HOME_TB_DATE']; ?></th>
											</tr>
										</thead>
										<?php $result = ListProjeto($_SESSION['email']); ?>
										<tbody>
											<?php 
											if ($result != null){
												while ($aux_query = $result->fetch_assoc()) 
												{
													echo '<tr data-toggle="collapse" data-target="#'.$aux_query["id"].'" class="accordion-toggle">';
													echo '  <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>';
													echo '  <td style="display: none;">'.$aux_query["id"].'</td>';
													echo '  <td><a href="dashboard.php?proj='.$aux_query["id"].'&projr=0 ">'.$aux_query["titulo"].'</a></td>';
													echo '  <td>'.$aux_query["qtdactiv"].'</td>';
													echo '  <td>'.$aux_query["date_added"].'</td>';
													echo '</tr>';
													$results = ListPermissoes($aux_query["id"]);
													if ($results != null){
													   echo '<tr>';	
													   echo '  <td colspan="12" class="hiddenRow"><div class="accordian-body collapse" id="'.$aux_query["id"].'"> ';	
													   echo '    <h4>'.$lang['HOME_TB_PERMISSION'].'</h4>';
													   echo '    <table class="table table-striped">';
													   echo '		<tbody>';
													   while ($auxs_query = $results->fetch_assoc()){
													   echo '			<tr>';
													   echo '				<td></td>';
													   echo '				<td style="display: none;">'.$auxs_query["id"].'</td>';
                                                       echo '				<td>'.$auxs_query["permissao"].'</td>';
                                                       echo '				<td>'.$permissaodanger[$auxs_query["permissao"]].'</td>';
                                                       echo '				<td>'.$permissaodescricao[$auxs_query["permissao"]].'</td>';
													   echo '			</tr>';}
													   echo '		</tbody>';
													   echo '	 </table>';
													   echo '	 </div>';
													   echo '  </td>';
													   echo '</tr>';
													}
												}
											}?>
										</tbody>
									</table>
							    </div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"></i>GPITIC - UNIT</span></div>
									</div>
								</div>								
							</div>         
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