<?php

$codigo_interno = $_POST['codigo_interno'];
	
modificarCliente($_POST['dni_cliente'], ucfirst($_POST['nombre_cliente']), ucfirst($_POST['apellido_cliente']), ucfirst($_POST['descripcion']), $_POST['obra_social'], $codigo_interno);

function modificarCliente($dni_cliente, $nombre_cliente, $apellido_cliente, $descripcion, $obra_social, $codigo_interno)
{
	include 'conexion.php';
	$sentencia= "UPDATE ov_clientes SET dni_cliente='".$dni_cliente."', nombre_cliente='".$nombre_cliente."', apellido_cliente='".$apellido_cliente."', descripcion='".$descripcion."', obra_social='".$obra_social."' WHERE codigo_interno='".$codigo_interno."'";
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
auditoria($_SESSION['username'], $nombre_user, 'MODIFICADO', $_POST['dni_cliente'], ucfirst($_POST['nombre_cliente']), ucfirst($_POST['apellido_cliente']), ucfirst($_POST['descripcion']), $_POST['obra_social']);

function auditoria($username, $nombre_usuario, $accion, $dni_cliente, $nombre_cliente, $apellido_cliente, $descripcion_cliente, $obra_social){
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$sentencia= "INSERT INTO ov_auditoria (username, nombre_usuario, accion, fecha_auditoria, dni_cliente, nombre_cliente, apellido_cliente, descripcion_cliente, obra_social) VALUES ('".$username."', '".$nombre_usuario."', '".$accion."', '".date('d/m/Y h:i a')."', '".$dni_cliente."', '".$nombre_cliente."', '".$apellido_cliente."', '".$descripcion_cliente."', '".$obra_social."') ";
	connect()->prepare($sentencia)->execute();
}

?>

<script type="text/javascript">
    alert('Cliente modificado correctamente.')
	window.location.href= '../index?lnk=clientes';
</script>