<?php
include_once "header.php";
?>

<div class="jumbotron">
	<div class="alert alert-success" role="alert">
		<?php if(logged_in()) {
			echo "Bem Vindo(a), " . get_name($_SESSION['email']);
		}else{
			echo "Registre-se ou acesse para testar sua apalicação.";
		}
		?>
	</div>
	<h1 class="text-center"> Projeto de Iniciação Cientifica, MobiSec, Universidade Tiradentes. </h1>
</div>

<?php
include_once "footer.php";
?>