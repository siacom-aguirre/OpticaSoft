<?php

$codigo_interno = md5(str_shuffle(strtolower($_POST['nombre_cliente'])));

$tipo_archivo = strtolower(pathinfo($_FILES["foto_receta"]["name"],PATHINFO_EXTENSION));
$archivo = str_replace($_FILES["foto_receta"]["name"], $codigo_interno, $_FILES["foto_receta"]["name"]).'.'.$tipo_archivo;
	
Nuevocliente(ucwords($_POST['nombre_cliente']), $_POST['fecha_cliente'], strtoupper($_POST['obra_social']), strtoupper($_POST['laboratorio']), $_POST['telefono'], ucwords($_POST['doctor']), $archivo, $_POST['fecha_creacion'], $codigo_interno);

function Nuevocliente($nombre_cliente, $fecha_cliente, $obra_social, $laboratorio, $telefono, $doctor, $foto_receta, $fecha_creacion, $codigo_interno)
{
	include 'conexion.php';
	$sentencia= "INSERT INTO ov_clientes (nombre_cliente, fecha_cliente, obra_social, laboratorio, telefono, doctor, foto_receta, fecha_creacion, codigo_interno) VALUES ('".$nombre_cliente."', '".$fecha_cliente."', '".$obra_social."', '".$laboratorio."', '".$telefono."', '".$doctor."', '".$foto_receta."', '".$fecha_creacion."', '".$codigo_interno."')";
	connect()->prepare($sentencia)->execute();
}

$file = $archivo;
$validator = 1;
$file_type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$url_temp = $_FILES["foto_receta"]["tmp_name"];
$url_insert = dirname(__FILE__) . "/docs/img_recetas";

$url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

if (!file_exists($url_insert)) {
    mkdir($url_insert, 0777, true);
};

$file_size = $_FILES["foto_receta"]["size"];
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

auditoria($_SESSION['username'], $nombre_user, 'Insert', $_POST['fecha_creacion'], ucwords($_POST['nombre_cliente']), $_POST['fecha_cliente'], strtoupper($_POST['obra_social']), strtoupper($_POST['laboratorio']), $_POST['telefono'], ucwords($_POST['doctor']), $archivo);

function auditoria($username, $nombre_usuario, $accion, $fecha_auditoria, $nombre_cliente, $fecha_cliente, $obra_social, $laboratorio, $telefono, $doctor, $foto_receta){
	$sentencia= "INSERT INTO ov_auditoria (username, nombre_usuario, accion, fecha_auditoria, nombre_cliente, fecha_cliente, obra_social, laboratorio, telefono, doctor, foto_receta) VALUES ('".$username."', '".$nombre_usuario."', '".$accion."', '".$fecha_auditoria."', '".$nombre_cliente."', '".$fecha_cliente."', '".$obra_social."', '".$laboratorio."', '".$telefono."', '".$doctor."', '".$foto_receta."') ";
	connect()->prepare($sentencia)->execute();
}

?>

<script type="text/javascript">
    alert('Cliente registrado correctamente.')
	window.location.href='../index?lnk=clientes';
</script>