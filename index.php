<link rel="shortcut icon" href="./consultas/docs/img/favicon.ico">
<?php
include_once './consultas/vaf_nucleo.php';
fileExist();
session_start(); 
if(isset($_SESSION['username'])){
    $usuario = $_SESSION['username'];
    $inactividad = 600;
    if(isset($_SESSION["timeout"])){
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: /consultas/logout.php");
        }
    }
    $_SESSION["timeout"] = time();
}
include './dist/css/horacss.php';
include 'header.php';
$pagina = isset($_GET['lnk']) ? strtolower($_GET['lnk']) : 'aplicacion';
require_once './' . $pagina . '.php';
?>