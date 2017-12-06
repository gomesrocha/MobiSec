<?php
include_once "header.php";
?>
<?php 
if(!logged_in()) {
	redirect("index.php");
}
?>
<!--<div class="jumbotron">-->
<div>
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><h3>Aplicações</h3></div>
            <div class="panel-body">
				<table class="table table-condensed" style="border-collapse:collapse;">
					<thead>	
						<tr>
							<th>&nbsp;</th>
							<th>ID</th>
							<th>Titulo</th>
							<th>Activitys</th>
							<th>Data Cadastro</th>
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
								echo '  <td>'.$aux_query["id"].'</td>';
								echo '  <td>'.$aux_query["titulo"].'</td>';
								echo '  <td>'.$aux_query["qtdactiv"].'</td>';
								echo '  <td>'.$aux_query["date_added"].'</td>';
								echo '</tr>';
								$results = ListPermissoes($aux_query["id"]);
								if ($results != null){
								   echo '<tr>';	
								   echo '  <td colspan="12" class="hiddenRow"><div class="accordian-body collapse" id="'.$aux_query["id"].'"> ';	
								   echo '    <h4>Permissões</h4>';
								   echo '    <table class="table table-striped">';
								   echo '		<thead>';
								   echo '			<tr>';
								   echo '				<td></td>';
								   echo '				<td>ID</td>';
								   echo '				<td>Perimssão</td>';
								   echo '			</tr>';
								   echo '		</thead>';
								   echo '		<tbody>';
								   while ($auxs_query = $results->fetch_assoc()){
								   echo '			<tr>';
								   echo '				<td></td>';
								   echo '				<td>'.$auxs_query["id"].'</td>';
								   echo '				<td>'.$auxs_query["permissao"].'</td>';
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
        </div>         
    </div>       
</div>

<?php
include_once "footer.php";
?>