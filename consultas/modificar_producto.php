<?php

modificarProducto($_POST['codigo_producto'], ucfirst($_POST['nombre_producto']), ucfirst($_POST['descripcion']), $_POST['precio_producto'], $_POST['codigo_interno']);

function modificarProducto($codigo_producto, $nombre_producto, $descripcion, $precio_producto, $codigo_interno)
{
	include_once 'conexion.php';
	$sentencia1= "UPDATE ov_productos SET codigo_producto='".$codigo_producto."', nombre_producto='".$nombre_producto."', descripcion='".$descripcion."', precio_producto='".$precio_producto."' WHERE codigo_interno='".$codigo_interno."'";
	connect()->prepare($sentencia1)->execute();
}

$tipo_archivo = strtolower(pathinfo($_FILES["foto_producto"]["name"],PATHINFO_EXTENSION));


if(!empty($_FILES["foto_producto"]["name"])){
    $archivo = str_replace($_FILES["foto_producto"]["name"], $_POST['codigo_interno'], $_FILES["foto_producto"]["name"]).'.'.$tipo_archivo;
    
    include_once 'conexion.php';
    $sentencia2= "UPDATE ov_productos SET foto_producto='".$archivo."' WHERE codigo_interno='".$_POST['codigo_interno']."'";
    connect()->prepare($sentencia2)->execute();
}

$file = $archivo;
$validator = 1;
$file_type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$url_temp = $_FILES["foto_producto"]["tmp_name"];
$url_insert = dirname(__FILE__) . "/docs/img_productos";

$url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

if (!file_exists($url_insert)) {
    mkdir($url_insert, 0777, true);
};

$file_size = $_FILES["foto_producto"]["size"];
if ( $file_size > 10485760) {
  echo '<script type="text/javascript">
  alert("El archivo es muy pesado. Debe ser menor a 10Mb.");
</script>';
  $validator = 0;
}

if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif" ) {
  echo "Solo se permiten imágenes tipo JPG, JPEG, PNG & GIF.";
  $validator = 0;
}

if($validator == 1){
    if (move_uploaded_file($url_temp, $url_target)) {
        echo 'Archivo Subido.';
    } else {
        echo '<script type="text/javascript">
		alert("Error al cargar el arhivo.");
	</script>';
    }
}else{
    echo "Error: el archivo no se ha cargado.";
}

session_start();
function getNombre($user){
    $query = connect()->prepare('SELECT * FROM ov_usuarios WHERE dni_usuario = :user');
    $query->execute(['user' => $user]);
    foreach ($query as $currentUser) {
        $nombre = ucwords($currentUser['nombre_usuario']);
        return $nombre;
    }
}
function getApellido($user){
    $query = connect()->prepare('SELECT * FROM ov_usuarios WHERE dni_usuario = :user');
    $query->execute(['user' => $user]);
    foreach ($query as $currentUser) {
        $apellido = ucwords($currentUser['apellido_usuario']);
        return $apellido;
    }
}
$nombre_user = getNombre($_SESSION['username']).' '.getApellido($_SESSION['username']);

auditoria($_SESSION['username'], ucfirst($nombre_user), 'Modificar', $_POST['codigo_producto'], ucfirst($_POST['nombre_producto']), ucfirst($_POST['descripcion']), $_POST['precio_producto']);

function auditoria($username, $nombre_usuario, $accion, $codigo_producto, $nombre_producto, $descripcion_producto, $precio_producto){
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$sentencia3= "INSERT INTO ov_auditoria (username, nombre_usuario, accion, fecha_auditoria, codigo_producto, nombre_producto, descripcion_producto, precio_producto) VALUES ('".$username."', '".$nombre_usuario."', '".$accion."', '".date('d/m/Y h:i a')."', '".$codigo_producto."', '".$nombre_producto."', '".$descripcion_producto."', '$ ".$precio_producto.",00') ";
	connect()->prepare($sentencia3)->execute();
}



?>

<script type="text/javascript">
	window.location.href='../index.php';
</script>