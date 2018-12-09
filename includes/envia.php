
<?php
$diretorio = 'uploads';
if (!file_exists($diretorio)) {
   mkdir($diretorio, 0777, true);
   chmod($diretorio, 0777);
} 

$unplanned1 = $_POST["unplanned"];

$project = $_POST["projeto"];
if ($unplanned1 == 1){
	$sqlUmplanned1 = "SELECT id FROM projeto WHERE titulo = 'unplanned' ";
	$result = $conn->query($sqlUmplanned1);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		    $project = $row["id"];
		}
	} else {
	    $sqlproj1 = "INSERT INTO projeto (titulo, qtdactiv, email,date_added)
		VALUES ('unplanned' , '0', '$Email', now())";
		if ($conn->query($sqlproj1) === TRUE) {
		    $project = $conn->insert_id;
		}
	}
}

$diretorio = 'uploads/' . $project ;
if (!file_exists($diretorio)) {
   mkdir($diretorio, 0777, true);
   chmod($diretorio, 0777);
} 

$target_dir = "uploads/" . $project ."/";
$target_file = $target_dir .  basename($_FILES["fileToUpload"]["name"]); //$_POST["CPF"]; 
$uploadOk = 1;

$FileType = pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION); 
$FileType = strtolower($FileType);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //$_POST["CPF"].".".$FileType;   //;

$mensagem = "";
// Verifica se o apk já existe
if (file_exists($target_file)) {
    $mensagem =  $lang['TEST_ERRO1'];
   	$uploadOk = 0;
}

// Verifica se esta no formato permitido
if($FileType != "apk") {
  	 $mensagem = $mensagem .'<br>'. $lang['TEST_ERRO2'];
  	 $uploadOk = 0;
}

// Verifica se $uploadOk está com valor 0 para um erro
if ($uploadOk == 0) {
    ?> 
<div class="alert alert-warning alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php
    $mensagem = $mensagem . '<br>' . $lang['TEST_ERRO3'];
    echo $mensagem;
// se tudo esta ok, deixa fazer o upload
} else {
	
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {	
        ?> 
    <div class="alert alert-success alert-dismissable fade in">
        <a href="/" class="close" data-dismiss="alert" aria-label="close">&times;</a>

        <?php
        echo $lang['TEST_SUCESS1'] .' '. basename( $_FILES["fileToUpload"]["name"]) .' '. $lang['TEST_SUCESS2'];
		$nome = substr($target_file,0,strrpos($target_file,"."));
		$comando = " ./androguard/androaxml.py -i " . " ./" .$target_file. " -o " . " ./".$nome. ".xml";
		echo 'androguard';
		shell_exec($comando);
		$arquivo = "http://$_SERVER[HTTP_HOST]/" . $nome . ".xml";
		if (file_exists($nome . ".xml")) {
			$dom = new DOMDocument();
 			$dom->load($arquivo);
			$xml = simplexml_import_dom($dom);

			//Cadastrando Resultado do Relátorio
			$activity = $xml->xpath('/manifest/application/activity/@android:name');
			$Email    = $_SESSION['email'];
			$projeto  =  $_POST['projeto'];
			//$malware = $_POST["malware"];
			$unplanned = $_POST["unplanned"];

			if ($unplanned == 1){
				$sqlUmplanned = "SELECT id FROM projeto WHERE titulo = 'unplanned' ";
				$result = $conn->query($sqlUmplanned);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					    $projeto = $row["id"];
					}
				} else {
				    $sqlproj = "INSERT INTO projeto (titulo, qtdactiv, email,date_added)
					VALUES ('unplanned' , '0', '$Email', now())";
					if ($conn->query($sqlproj) === TRUE) {
					    $projeto = $conn->insert_id;
					}
				}
			}

			$count    = 0;
			$nomearq  = explode("/", $nome); 
			foreach($activity as $activitys){
				$count = $count + 1;
			}

			$filesize = filesize($target_file); // bytes
			$size = round($filesize / 1024 / 1024, 4); // megabytes with 1 digit

			//echo ' Tamanho ';
			//echo $size;
			$sql = "INSERT INTO projeto_rel (titulo, qtdactiv, email,date_added, id_fk_projeto, date_fim, size)
			VALUES ('$nomearq[2]', '$count', '$Email', now(), '$projeto', null, '$size' )";
			if ($conn->query($sql) === TRUE) {
				$last_id = $conn->insert_id;
				//if ($malware == 1) {					 				
					$dir = 'uploads/' .$projeto. "/" .$last_id ;
					if (!file_exists($dir)) {
					   mkdir($dir, 0777, true);
					   chmod($dir, 0777);
					} 
					$cmdmalware = "python " . " ./androbugs/androbugs.py -f " . " ./" .$target_file. " -e 2 " . " -o  " . " ./uploads/" .$projeto. "/" .$last_id. "/";
					shell_exec($cmdmalware);
				//}
				$permission = $xml->xpath('/manifest/uses-permission/@android:name');
				foreach($permission as $permissions){
					$permi = explode(".",$permissions->name);
					$pos = count($permi) - 1;
					$sql_perm = "INSERT INTO projpermiss_rel (permissao, id_fk_projeto_rel)
					VALUES ('$permi[$pos]', '$last_id')";	
					if ($conn->query($sql_perm) === FALSE) {
						set_message("<p>Error: " . $sql_perm . "<br>" . $conn->error . "</p>");
					}				
					//echo  "Android Permission: ". $permi[$pos] ."<br/>";		
				}
				$sqlUp = "UPDATE projeto_rel SET date_fim = now() WHERE id =  $last_id ";
				if ($conn->query($sqlUp) === FALSE) {
					set_message("<p>Error: " . $sqlUp . "<br>" . $conn->error . "</p>");
				}			
				echo '<br>';
				echo  $lang['TEST_SUCESS3'];
			//Fim de Cadastro do Resultado
			}else{
        	?>
				<div class="alert alert-warning alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        	<?php
				set_message("<p>Error: " . $sql . "<br>" . $conn->error . "</p>");			
			}
		}else{
			?>
			<div class="alert alert-warning alert-dismissable fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php
			echo $mensagem . '<br>' . $lang['TEST_ERRO4'];						
		}
    } else {
        ?>
<div class="alert alert-warning alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

        <?php
        echo $mensagem . '<br>' . $lang['TEST_ERRO3'];
    }
}
?>
</div>
