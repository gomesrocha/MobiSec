<?php
include_once "header.php";
?>


<?php 
if(!logged_in()) {
	redirect("index.php");
}
?>

<div class="row">
	<div class="col-md-12">
		<?php display_message(); ?>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1">
		<h3 class="alert alert-success" role="alert">Alaviar se a aplicação está em conformidade com o palno de teste.</h3>
		<form class="form-horizontal" data-toggle="validator" role="form" method="post" action="relatorio.php" enctype="multipart/form-data" name="form1" id="form1">
			<hr class="colorgraph">
			<div class="form-group">
				<label for="projeto" class="col-lg-2 control-label">Selecionar Projeto</label>
				<div class="col-lg-7">
					<select id="projeto" name="projeto" class="selectpicker show-tick form-control" data-live-search="true">
						<?php $result = ListProjeto($_SESSION['email']); ?>
						<?php if ($result != null){ ?>
						<?php while($aux_query = $result->fetch_assoc()) { ?>							
						<?php if (isset($_POST['submit']) || isset($_POST['Imprimir'])) {
								$projeto =  $_POST['projeto'];
								if ($projeto > 0 && $projeto == $aux_query["id"]){
									?>
									<option value="<?php echo $aux_query["id"] ?>" selected ><?php echo $aux_query["titulo"] ?></option>
								<?php 	
								}else{
								?>	<option value="<?php echo $aux_query["id"] ?>"><?php echo $aux_query["titulo"] ?></option>
								<?php }							  
							  }else{
							?>	  
						<option value="<?php echo $aux_query["id"] ?>"><?php echo $aux_query["titulo"] ?></option>
						<?php } 
							} 
						} ?>
					</select>
				</div>	
				<div class="col-lg-3">
					<div><input type="submit" name="submit" value="Carragar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				</div>
			</div>
<!--			<div class="form-group">
			</div>-->
			<div class="form-group">
				<label for="projeto" class="col-lg-2 control-label">Selecionar Apk</label>
				<div class="col-lg-7">
					<select id="projeto_rel" name="projeto_rel" class="selectpicker show-tick form-control" data-live-search="true">
						<?php 
							$proj =  $_POST['projeto'];
							if ($proj > 0 ){
								$projeto_rel =  $_POST['projeto_rel'];
								$resultrel = ListProjetoRel($_SESSION['email'], $proj); ?>
						<?php if ($resultrel != null){ ?>
								<option value="0">Selecione Uma Apk</option>
						<?php while($aux_queryrel = $resultrel->fetch_assoc()) { 
								if ($projeto_rel > 0 && $projeto_rel == $aux_queryrel["id"]){?>
									<option value="<?php echo $aux_queryrel["id"] ?>" selected ><?php echo $aux_queryrel["titulo"] ?></option>
						<?php	}else{
								?>	<option value="<?php echo $aux_queryrel["id"] ?>"><?php echo $aux_queryrel["titulo"] ?></option>
						<?php 		}
								} 
							}
							else{
							?><option value="0">Nenhum Upload Realizado</option>
							<?php }
						}else{
							?> <option value="0">Clique em Carragar</option> <?php
						}	?>
					</select>
				</div>
				<div class="col-lg-3">
					<div><input type="submit" name="Imprimir" value="Imprimir" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				</div>				
			</div>
			<?php if (isset($_POST['Imprimir'])) {?>
				<?php 
					$project =  $_POST['projeto'];
					$project_rel =  $_POST['projeto_rel'];
					if ($project > 0 && $project_rel > 0){?>
				<hr class="colorgraph">			
					<div>
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Relatorio do Plano de Teste</h3></div>
								<div class="panel-body">
									<table class="table table-condensed">
										<thead>	
											<tr>
												<th>Projeto</th>
												<th>Activitys</th>
												<th>Apk</th>
												<th>Activitys</th>
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
																<th>Permissões</th>
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
																<th>Permissões</th>
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
										echo '<div class="alert alert-success"><p>Aplicação aprovada, em total conformidade com o plano de teste.</p></div>';
									}else{
										if (count($arrayperm) == count($resultjoin) && count($arraypermrel) <> count($arrayperm ) && count($arraypermleft) == 0 &&  count($arraypermright) == 0 ){
											echo '<div class="alert alert-warning"><p>Aplicação Aprovada, porém existem permições repetirdas na aplicação em relação ao plano de teste.</p></div>';
										}else{
											if(count($arrayperm) <> count($resultjoin) && count($arraypermleft) >= 0 &&  count($arraypermright) >= 0 ){
												echo '<div class="alert alert-danger"><p class="danger">Aplicação reprovada, em desconformidade com o plano de teste.</p></div>';
											}
										}									
									}
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
			<hr class="colorgraph">			
		</form>
	</div>
</div>

<?php
include_once "footer.php";
?>