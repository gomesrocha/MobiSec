<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$titulo				= $_POST['titulo'];
	$QtdActiv			= $_POST['QtdActiv'];
	$Email              = $_SESSION['email'];
    $analisepermi1      = $_POST["analisepermi1"];
    $analisepermi2      = $_POST["analisepermi2"];
    $analisepermi3      = $_POST["analisepermi3"];
    $analisepermi4      = $_POST["analisepermi4"];

    $errors = [];
	$existe = ValProjeto($Email, $titulo);

	if ($existe != null)
	{
		$errors[] = $titulo.' '.$lang['CADASTRAR_ERR_JA_CAD'].'.';
	}

	if (!empty($errors)) {
		foreach ($errors as $error) {
			validation_errors($error);
		}
	}else{
		$sql = "INSERT INTO projeto (titulo, qtdactiv, email,date_added, analise_siste_permi, analise_vulne_abugs,	analise_mawla_abugs,	analise_vulne_awarn)
		VALUES ('$titulo', '$QtdActiv', '$Email', now(), '$analisepermi1', '$analisepermi2', '$analisepermi3', '$analisepermi4')";

		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
			foreach ($_POST['perm_sel'] as $permi_sel) {
				$result = str_replace( "\r\n", "", $permi_sel );
				$sql_perm = "INSERT INTO projpermiss (permissao, id_fk_projeto)
				VALUES ('$result', '$last_id')";			
				if ($conn->query($sql_perm) === FALSE) {
					set_message("<p>Error: " . $sql_perm . "<br>" . $conn->error . "</p>");
				}
			}
			redirect("admin.php");
			$conn->close();
			exit;

		} else {
			set_message("<p>Error: " . $sql . "<br>" . $conn->error . "</p>");
			$conn->close();
		}
	}
}
?>