<?php
include_once "header.php";
include_once "includes/cadastrar.inc.php";

$arquivo = fopen('includes/permissoes.txt','r');
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
			<form role="form" method="post" name="cadastro_form">
				<h2>Cadastrar</h2>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8">
						<div class="form-group">
							<input type="text" name="titulo" id="titulo" class="form-control input-lg" placeholder="Titulo" tabindex="1" required>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="form-group">
							<input type="number" name="QtdActiv" id="QtdActiv" class="form-control input-lg" placeholder="Activitys" tabindex="2" required>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<select multiple name="perm_sel[]" class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true"> 
								<?php while(!feof($arquivo)) { ?>
								<?php $valor = fgets($arquivo); ?>
								<option value="<?php echo $valor ?>"><?php echo $valor ?></option>
								<?php } ?>
							</select>
							<!--<input type="text" name="titulo" id="titulo" class="form-control input-lg" placeholder="Titulo" tabindex="1" required>-->
						</div>
					</div>
				</div>

				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-md-4"><input type="submit" name="submit" value="Cadastrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				</div>
			</form>
		</div>
	</div>
<?php
include_once "footer.php";
?>