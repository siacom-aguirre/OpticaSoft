<?php

include './conexion.php';
$cliente = $_GET['cliente'];

$sql1 = "SELECT * FROM ov_clientes WHERE codigo_interno='{$cliente}'";
$query1 = connect()->prepare($sql1);
$query1->execute();
foreach($query1 as $cl){}

$dni_cliente = $cl['dni_cliente'];
$nombre_cliente = $cl['nombre_cliente'];
$apellido_cliente = $cl['apellido_cliente'];
$descripcion = $cl['descripcion'];
$obra_social = $cl['obra_social'];

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

auditoria($_SESSION['username'], ucfirst($nombre_user), 'ELIMINADO', $dni_cliente, $nombre_cliente, $apellido_cliente, $descripcion, $obra_social);

function auditoria($username, $nombre_usuario, $accion, $dni_cliente, $nombre_cliente, $apellido_cliente, $descripcion, $obra_social){
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$sentencia= "INSERT INTO ov_auditoria (username, nombre_usuario, accion, fecha_auditoria, dni_cliente, nombre_cliente, apellido_cliente, descripcion_cliente, obra_social) VALUES ('".$username."', '".$nombre_usuario."', '".$accion."', '".date('d/m/Y h:i a')."', '".$dni_cliente."', '".$nombre_cliente."', '".$apellido_cliente."', '".$descripcion."', '".$obra_social."') ";
	connect()->prepare($sentencia)->execute();
}

$sql = "DELETE FROM ov_clientes WHERE codigo_interno='{$cliente}'";
$query = connect()->prepare($sql);
$query->execute();

?>

<script type="text/javascript">
    window.alert('Cliente eliminado correctamente.');
    window.location.href = "../index?lnk=clientes";
</script>