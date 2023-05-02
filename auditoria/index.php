<?php
function fileExist(){
    if(file_exists('../consultas/conexion.php')){
        include_once '../consultas/conexion.php';
    }else{
        include_once '../conexion.php';
    }
}

fileExist();
session_start(); 
if(isset($_SESSION['username'])){
    $usuario = $_SESSION['username'];
    $inactividad = 600;
    if(isset($_SESSION["timeout"])){
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: ../consultas/logout.php");
        }
    }
    $_SESSION["timeout"] = time();
}
if(!isset($_SESSION['username'])){
    header('location: ./login');
}
include 'header.php';
$pagina = isset($_GET['lnk']) ? strtolower($_GET['lnk']) : 'auditoria';
require_once './' . $pagina . '.php';
?>