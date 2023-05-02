<?php


modificarCliente(ucwords($_POST['nombre_usuario']), $_POST['apellido_usuario'], $_POST['usuario']);

function modificarCliente($nombre_usuario, $apellido_usuario, $username)
{
	include_once 'conexion.php';
	$sentencia1= "UPDATE ov_usuarios SET nombre_usuario='".$nombre_usuario."', apellido_usuario='".$apellido_usuario."' WHERE username='".$username."'";
	connect()->prepare($sentencia1)->execute();
}

$tipo_archivo = strtolower(pathinfo($_FILES["foto_perfil"]["name"],PATHINFO_EXTENSION));


if(!empty($_FILES["foto_perfil"]["name"])){
    $archivo = str_replace($_FILES["foto_perfil"]["name"], $_POST['usuario'], $_FILES["foto_perfil"]["name"]).'.'.$tipo_archivo;
    
    include_once 'conexion.php';
    $sentencia2= "UPDATE ov_usuarios SET foto_perfil='".$archivo."' WHERE username='".$_POST['usuario']."'";
    connect()->prepare($sentencia2)->execute();
}

$file = str_replace($_FILES["foto_perfil"]["name"], $_POST['usuario'], $_FILES["foto_perfil"]["name"]).'.'.$tipo_archivo;;
$validator = 1;
$file_type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$url_temp = $_FILES["foto_perfil"]["tmp_name"];
$url_insert = dirname(__FILE__) . "/docs/img/perfiles";

$url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

if (!file_exists($url_insert)) {
    mkdir($url_insert, 0777, true);
};

$file_size = $_FILES["foto_perfil"]["size"];
if ( $file_size > 10485760) {
  echo '<script type="text/javascript">
  alert("El archivo es muy pesado. Debe ser menor a 10 Mb.");
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
		alert("Error al cargar la foto.");
	</script>';
    }
}else{
    echo "Error: el archivo no se ha cargado.";
}

?>

<script type="text/javascript">
    alert('Usuario modificado correctamente.')
	window.location.href= '../index?lnk=perfil';
</script>