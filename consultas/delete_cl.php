<?php

include './conexion.php';
$cliente = $_GET['cl'];

$sql1 = "SELECT * FROM ov_clientes WHERE codigo_interno='{$cliente}'";
$query1 = connect()->prepare($sql1);
$query1->execute();
foreach($query1 as $cl){}

$nombre_cliente = $cl['nombre_cliente'];
$fecha_cliente = $cl['fecha_cliente'];
$obra_social = $cl['obra_social'];
$laboratorio = $cl['laboratorio'];
$telefono = $cl['telefono'];
$doctor = $cl['doctor'];

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

auditoria($_SESSION['username'], ucfirst($nombre_user), 'ELIMINADO', $nombre_cliente, $fecha_cliente, $obra_social, $laboratorio, $telefono, $doctor);

function auditoria($username, $nombre_usuario, $accion, $nombre_cliente, $fecha_cliente, $obra_social, $laboratorio, $telefono, $doctor){
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$sentencia= "INSERT INTO ov_auditoria (username, nombre_usuario, accion, fecha_auditoria, nombre_cliente, fecha_cliente, obra_social, laboratorio, telefono, doctor) VALUES ('".$username."', '".$nombre_usuario."', '".$accion."', '".date('d/m/Y h:i a')."', '".$nombre_cliente."', '".$fecha_cliente."', '".$obra_social."', '".$laboratorio."', '".$telefono."', '".$doctor."') ";
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