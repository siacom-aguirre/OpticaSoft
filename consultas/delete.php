<?php

include './conexion.php';
$articulo = $_GET['articulo'];

$sql1 = "SELECT * FROM ov_productos WHERE codigo_interno='{$articulo}'";
$query1 = connect()->prepare($sql1);
$query1->execute();
foreach($query1 as $art){}

$codigo_producto = $art['codigo_producto'];
$nombre_producto = $art['nombre_producto'];
$descripcion = $art['descripcion'];
$precio_producto = $art['precio_producto'];
$foto_producto = $art['foto_producto'];

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

auditoria($_SESSION['username'], ucfirst($nombre_user), 'ELIMINADO', $codigo_producto, $nombre_producto, $descripcion, $precio_producto, $foto_producto);

function auditoria($username, $nombre_usuario, $accion, $codigo_producto, $nombre_producto, $descripcion, $precio_producto, $foto_producto){
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$sentencia= "INSERT INTO ov_auditoria (username, nombre_usuario, accion, fecha_auditoria, codigo_producto, nombre_producto, descripcion_producto, precio_producto, foto_producto) VALUES ('".$username."', '".$nombre_usuario."', '".$accion."', '".date('d/m/Y h:i a')."', '".$codigo_producto."', '".$nombre_producto."', '".$descripcion."', '$ ".$precio_producto.",00', '".$foto_producto."') ";
	connect()->prepare($sentencia)->execute();
}

$sql = "DELETE FROM ov_productos WHERE codigo_interno='{$articulo}'";
$query = connect()->prepare($sql);
$query->execute();

?>

<script type="text/javascript">
    window.alert('Articulo eliminado correctamente.');
    window.location.href = "../index?lnk=aplicacion";
</script>