<?php
include_once "header.php";
?>
<?php 
if(!logged_in()) {
	redirect("index.php");
}
?>

<?php
$diretorio = 'uploads/' . $_POST["projeto"] ;
if (!file_exists($diretorio)) {
   mkdir($diretorio, 0777, true);
} 
echo $diretorio;
?>

<?php
include_once "footer.php";
?>