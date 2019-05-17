<?php
function email_exists($email) 
{
	global $conn;

	$sql = "SELECT id FROM member WHERE email = '$email'";

	$result = $conn->query($sql);

	if($result->num_rows == 1 ) {
		return true;
	} else {
		return false;
	}
}

function get_name($email) {
	global $conn;

	$sql = "SELECT first_name FROM member WHERE email = '$email'";

	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	return $row["first_name"];
}

function set_message($message) 
{
	if(!empty($message)){
		$_SESSION['message'] = $message;
	}else {
		$message = "";
	}
}

function display_message()
{
	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];

		unset($_SESSION['message']);
	}
}

function redirect($location){
	return header("Location: {$location}");
}

function validation_errors($error_message) 
{
$error_message = <<<DELIMITER

<div class="alert alert-danger alert-dismissible" role="alert">
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	<strong>Warning!</strong> $error_message
 </div>
DELIMITER;

set_message($error_message);
}

function logged_in(){
	if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
		return true;
	} else {
		return false;
	}
}

function ListPermissoes($id){
	global $conn;

	$sql = "SELECT * FROM projpermiss WHERE id_fk_projeto = '$id'";
	$result = $conn->query($sql);

	if($result->num_rows >= 1 ) {
		return $result;
	}else{
		return null;
	}	
}

function ListProjeto($email){
	global $conn;

	$sql = "SELECT * FROM projeto WHERE email = '$email' ORDER BY date_added DESC LIMIT 50";
	$result = $conn->query($sql);

	if($result->num_rows >= 1 ) {
		return $result;
	}else{
		return null;
	}	
}

function LerProjeto($email,$projeto){
    global $conn;

    $sql = "SELECT * FROM projeto WHERE email = '$email' and id = '$projeto' ";
    $result = $conn->query($sql);

    if($result->num_rows >= 1 ) {
        return $result;
    }else{
        return null;
    }
}
function ListProjetoRel($email, $projeto){
	global $conn;

	$sql = "SELECT * FROM projeto_rel WHERE email = '$email' and id_fk_projeto = '$projeto' ORDER BY date_added DESC ";
	$result = $conn->query($sql);

	if($result->num_rows >= 1 ) {
		return $result;
	}else{
		return null;
	}	
}

function ListPermissoesRel($id){
	global $conn;

	$sql = "SELECT * FROM projpermiss_rel WHERE id_fk_projeto_rel = '$id'";
	$result = $conn->query($sql);

	if($result->num_rows >= 1 ) {
		return $result;
	}else{
		return null;
	}	

}

function ListProjetoImp($email, $id){
	global $conn;

	$sql = "SELECT * FROM projeto WHERE email = '$email' and id = '$id' ORDER BY date_added ";
	$result = $conn->query($sql);

	if($result->num_rows >= 1 ) {
		return $result;
	}else{
		return null;
	}	
}

function ListProjetoRelImp($email, $projeto, $id){
	global $conn;

	$sql = "SELECT * FROM projeto_rel WHERE email = '$email' and id_fk_projeto = '$projeto' and id = '$id' ORDER BY date_added";
	$result = $conn->query($sql);

	if($result->num_rows >= 1 ) {
		return $result;
	}else{
		return null;
	}	
}

function ArrayJoin($a,$b)
{
if ($a===$b)
  {
  return 0;
  }
  return ($a>$b)?1:-1;
}

function ValProjeto($email, $projeto){
	global $conn;

	$sql = "SELECT * FROM projeto WHERE email = '$email' and titulo = '$projeto' ORDER BY date_added ";
	$result = $conn->query($sql);

	if($result->num_rows >= 1 ) {
		return $result;
	}else{
		return null;
	}	
}

?>