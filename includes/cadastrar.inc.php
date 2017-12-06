<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$titulo				= $_POST['titulo'];
	$QtdActiv			= $_POST['QtdActiv'];
	$Email              = $_SESSION['email'];
	
	$errors = [];
	
	if (email_exists($titulo))
	{
		$errors[] = "$titulo j? cadastrado.";
	}

	if (!empty($errors)) {
		foreach ($errors as $error) {
			validation_errors($error);
		}
	}else{
		$sql = "INSERT INTO projeto (titulo, qtdactiv, email,date_added)
		VALUES ('$titulo', '$QtdActiv', '$Email', now())";

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
			exit;

		} else {
			set_message("<p>Error: " . $sql . "<br>" . $conn->error . "</p>");
		}

		$conn->close();
	}
}
?>