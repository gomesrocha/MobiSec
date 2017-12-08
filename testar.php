<?php
include_once "header.php";
?>

<link href="css/style_progress.css" rel="stylesheet" type="text/css" />

<?php 
if(!logged_in()) {
	redirect("index.php");
}

if (isset($_POST['submit'])) {
    include 'includes/envia.php';
} 

?>

<div class="row">
	<div class="col-md-12">
		<?php display_message(); ?>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1">
		<h3 class="alert alert-success" role="alert">Upload da aplicação para verificação de conformidade com o plano de teste.</h3>
		<form class="form-horizontal" data-toggle="validator" role="form" method="post" action="testar.php" enctype="multipart/form-data" name="form1" id="form1">
			<hr class="colorgraph">
			<div class="form-group">
				<label for="projeto" class="col-lg-2 control-label">Selecionar Projeto</label>
				<div class="col-lg-10">
					<select id="projeto" name="projeto" class="selectpicker show-tick form-control" data-live-search="true">
						<?php $result = ListProjeto($_SESSION['email']); ?>
						<?php if ($result != null){ ?>
						<?php while($aux_query = $result->fetch_assoc()) { ?>
						<option value="<?php echo $aux_query["id"] ?>"><?php echo $aux_query["titulo"] ?></option>
						<?php } } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="fileToUpload">Selecione o aplicativo para enviar</label>  
					<div class="col-md-8">
					<input id="fileToUpload" name="fileToUpload" type="file" class="form-control input-md" required="">
					<span class="help-block">Sistema aceita apenas arquivos com extensão: APK e sem limite de tamanho.</span>  
				</div>
			</div>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-4"><input type="submit" name="submit" value="Envio de Aplicativo" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>
			
		</form>
	</div>
</div>

<?php
include_once "footer.php";
?>