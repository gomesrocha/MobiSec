<?php
$diretorio = 'uploads';
if (!file_exists($diretorio)) {
    mkdir($diretorio, 0777, true);
    chmod($diretorio, 0777);
}

$project = $_POST["projeto"];
$Filename = pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_FILENAME);
if (!empty($project)) {
    $projecttitle = LerProjeto($_SESSION['email'],$project);
    if ($projecttitle->num_rows > 0) {
        while ($row = $projecttitle->fetch_assoc()) {
            $Filename = $row["titulo"];
        }
    }
}

$diretorio = 'uploads/' . $Filename;
if (!file_exists($diretorio)) {
    mkdir($diretorio, 0777, true);
    chmod($diretorio, 0777);
}

//variavel que testa upload
$uploadOk = 1;

$target_dir = $diretorio . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$FileType = pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
$FileType = strtolower($FileType);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$mensagem = "";

// Verifica se o apk já existe
if (file_exists($target_file)) {
    $mensagem = $lang['TEST_ERRO1'];
    $uploadOk = 0;
}
// Verifica se esta no formato permitido
if ($FileType != "apk") {
    $mensagem = $mensagem . '<br>' . $lang['TEST_ERRO2'];
    $uploadOk = 0;
}

//Variaveis de teste da analise
$analyze1 = $_POST["analisepermi1"];
$analyze2 = $_POST["analisepermi2"];
$analyze3 = $_POST["analisepermi3"];
$analyze4 = $_POST["analisepermi4"];


// Verifica se $uploadOk está com valor 0 para um erro
if ($uploadOk == 0) {
?>
    <div class="alert alert-warning alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php
    echo 'Erro 3 - 1';
    $mensagem = $mensagem . '<br>' . $lang['TEST_ERRO3'];
    echo $mensagem . '</div>';
    // se tudo esta ok, deixa fazer o upload
} else { if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
?>
        <div class="alert alert-success alert-dismissable fade in">
        <a href="/" class="close" data-dismiss="alert" aria-label="close">&times;</a>

<?php
        echo $lang['TEST_SUCESS1'] . ' ' . basename($_FILES["fileToUpload"]["name"]) . ' ' . $lang['TEST_SUCESS2'] .' </div>';
        $nome = substr($target_file, 0, strrpos($target_file, "."));
        $comando = " ./androguard/androaxml.py -i " . " ./" . $target_file . " -o " . " ./" . $nome . ".xml";
        shell_exec($comando);
        $arquivo = "http://$_SERVER[HTTP_HOST]/" . $nome . ".xml";
        if (file_exists( $nome . ".xml")) {
            $dom = new DOMDocument();
            $dom->load($nome . ".xml");
            $xml = simplexml_import_dom($dom);

            $activity = $xml->xpath('/manifest/application/activity/@android:name');
            $Email = $_SESSION['email'];

            $count = 0;
            $nomearq = explode("/", $nome);
            foreach ($activity as $activitys) {
                $count = $count + 1;
            }
            $filesize = filesize($target_file); // bytes
            $size = round($filesize / 1024 / 1024, 4); // megabytes with 1 digit

            $sql = "INSERT INTO projeto_rel (titulo, qtdactiv, email,date_added, id_fk_projeto, date_fim, size, analise_siste_permi, analise_vulne_abugs, analise_mawla_abugs, analise_vulne_awarn, resultado)
	        		VALUES                  ('$nomearq[2]', '$count', '$Email', now(), '$project', null, '$size', '$analyze1', '$analyze2', '$analyze3', '$analyze4', '0' )";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                $dir = $target_dir . $last_id;
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                    chmod($dir, 0777);
                }
                $permission = $xml->xpath('/manifest/uses-permission/@android:name');
                foreach ($permission as $permissions) {
                    $permi = explode(".", $permissions->name);
                    $pos = count($permi) - 1;
                    $sql_perm = "INSERT INTO projpermiss_rel (permissao, id_fk_projeto_rel)
					             VALUES ('$permi[$pos]', '$last_id')";
                    if ($conn->query($sql_perm) === FALSE) {
                        set_message("<p>Error: " . $sql_perm . "<br>" . $conn->error . "</p>");
                    }
                }

                if ($conn->query($sqlUp) === FALSE) {
                    set_message("<p>Error: " . $sqlUp . "<br>" . $conn->error . "</p>");
                }

                if ($analyze1 == 1 ){

                }

                if ($analyze2 == 1 or $analyze3 == 1){
                    $cmdmalware = "python ./androbugs/androbugs.py -f " . " /var/www/html/mobisec/" . $target_file . " -e 2 " . " -o  " . " ./" . $dir . "/";
                    shell_exec($cmdmalware);
                }

                if ($analyze3 == 1 ){

                }

                if ($analyze4 == 1){
                    $cmdwarn = "python ./androwarn/androwarn.py -i " . " /var/www/html/mobisec/" . $target_file .  " -o  " . " ./" . $dir . "/ -v 3 -r txt" ;
                    shell_exec($cmdwarn);
                }

                $sqlUp = "UPDATE projeto_rel SET date_fim = now() WHERE id =  $last_id ";
            ?>
                <div class="alert alert-success alert-dismissable fade in">
                <a href="/" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                <?php
                echo $lang['TEST_SUCESS3'] . '</div>';

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
             echo $mensagem . '<br>' . $lang['TEST_ERRO4'] . '</div>';
        }
        } else {
?>
        <div class="alert alert-warning alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<?php
            echo $mensagem . '<br>' . $lang['TEST_ERRO3'] . '</div>';
        }
    }
?>
<!--</div>-->