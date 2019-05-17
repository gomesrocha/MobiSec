<?php ob_start();
session_start();

include("db.php");
include("functions.php");
include("permissoes.php");

if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];

// register the session and set the cookie
$_SESSION['lang'] = $lang;

setcookie("lang", $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'br';
}

switch ($lang) {
  case 'us':
  $lang_file = 'lang.us.php';
  break;

  case 'br':
  $lang_file = 'lang.br.php';
  break;

  case 'es':
  $lang_file = 'lang.es.php';
  break;

  default:
  $lang_file = 'lang.br.php';

}

include_once 'languages/'.$lang_file;
?>