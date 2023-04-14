<?php

$codigo_interno = md5($_POST['nombre_cliente']).'-'.$_POST['dni_cliente'];
	
Nuevocliente($_POST['dni_cliente'], ucfirst($_POST['nombre_cliente']), ucfirst($_POST['apellido_cliente']), ucfirst($_POST['descripcion']), $_POST['obra_social'], $_POST['fecha_creacion'], $codigo_interno);

function Nuevocliente($dni_cliente, $nombre_cliente, $apellido_cliente, $descripcion, $obra_social, $fecha_creacion, $codigo_interno)
{
	include 'conexion.php';
	$sentencia= "INSERT INTO ov_clientes (dni_cliente, nombre_cliente, apellido_cliente, descripcion, obra_social, fecha_creacion, codigo_interno) VALUES ('".$dni_cliente."', '".$nombre_cliente."', '".$apellido_cliente."', '".$descripcion."', '".$obra_social."', '".$fecha_creacion."', '".$codigo_interno."')";
	connect()->prepare($sentencia)->execute();
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

auditoria($_SESSION['username'], $nombre_user, 'Insert', $_POST['fecha_creacion'], $_POST['dni_cliente'], ucfirst($_POST['nombre_cliente']), ucfirst($_POST['apellido_cliente']), ucfirst($_POST['descripcion']), $_POST['obra_social']);

function auditoria($username, $nombre_usuario, $accion, $fecha_auditoria, $dni_cliente, $nombre_cliente, $apellido_cliente, $descripcion_cliente, $obra_social){
	$sentencia= "INSERT INTO ov_auditoria (username, nombre_usuario, accion, fecha_auditoria, dni_cliente, nombre_cliente, apellido_cliente, descripcion_cliente, obra_social) VALUES ('".$username."', '".$nombre_usuario."', '".$accion."', '".$fecha_auditoria."', '".$dni_cliente."', '".$nombre_cliente."', '".$apellido_cliente."', '".$descripcion_cliente."', '".$obra_social."') ";
	connect()->prepare($sentencia)->execute();
}

?>

<script type="text/javascript">
    alert('Cliente registrado correctamente.')
	window.location.href='../index?lnk=clientes';
</script>