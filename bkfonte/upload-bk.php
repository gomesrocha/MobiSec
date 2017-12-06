<?php
include_once "header.php";

if(!logged_in()) {
	redirect("index.php");
}
?>

<?php
$diretorio = 'uploads';
var_dump($diretorio);
if (!file_exists($diretorio)) {
   mkdir($diretorio, 0777, true);
} 

$diretorio = 'uploads/' $_POST["projeto"];
if (!file_exists($diretorio)) {
   mkdir($diretorio, 0777, true);
} 

$target_dir = "uploads/" $_POST["projeto"]"/";
$target_file = $target_dir .  basename($_FILES["fileToUpload"]["name"]); //$_POST["CPF"]; 
$uploadOk = 1;
//$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$FileType = pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION); 
$FileType = strtolower($FileType);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //$_POST["CPF"].".".$FileType;   //;
$mensagem = "";

 // Check if file already exists
if (file_exists($target_file)) {
    $mensagem =  "Apk Já Existe na Base de Dados, Renomeio!";
   	$uploadOk = 0;
}
	
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 200000000) {
    $mensagem = $mensagem . "Desculpe o seu arquivo é muito grande! > 2mb";
    $uploadOk = 0;
}
*/
// Allow certain file formats
if($FileType != "apk") { //&& $FileType != "docx" && $FileType != "pdf" && $FileType != "jpg" 
  	 $mensagem = $mensagem . "Desculpe, apenas APK.";
  	 $uploadOk = 0;
}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    ?> 
<div class="alert alert-warning alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    <?php
    $mensagem = $mensagem . " Houve erro na transferencia do arquivo.";
    echo $mensagem;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        ?> 
    <div class="alert alert-success alert-dismissable fade in">
        <a href="/" class="close" data-dismiss="alert" aria-label="close">&times;</a>

        <?php
        echo "O arquivo ". basename( $_FILES["fileToUpload"]["name"]). " foi enviado com sucesso.";
    } else {
        ?>
<div class="alert alert-warning alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

        <?php
        echo $mensagem . " Houve erro na transferencia do arquivo.";
    }
}
?>
</div>

<?php
include_once "footer.php";
?>