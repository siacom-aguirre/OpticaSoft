<?php

$nombre_usuario = ucfirst($_POST['nombre_usuario']);
$apellido_usuario = ucfirst($_POST['apellido_usuario']);
$username = $_POST['username'];
$passwd = $_POST['passwd'];
$passwd2 = $_POST['passwd2'];
$md5pass = md5($passwd);
$privilegio = $_POST['privilegio'];
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha_registro = date("d-m-Y");

function getUserName($username){
    include './conexion.php';
    $sql = "SELECT * FROM ov_usuarios WHERE username='{$username}'";
    $query = connect()->prepare($sql);
    $query->execute();
    foreach($query as $nus){
        return $nus['username'];
    }
}


if($username == getUserName($username)){
    echo '<script type="text/javascript">
	alert("El usuario con DNI ' . $username . ' ya existe.");
    window.location.href="../index.php";
</script>';
}else{
    if($passwd != $passwd2){
        echo '<script type="text/javascript">
        alert("Las contraseñas no coinciden.");
        window.location.href="../index.php";
    </script>';
    }else{
        $sentencia= "INSERT INTO ov_usuarios (username, nombre_usuario, apellido_usuario, dni_usuario, passwd, privilegio, fecha_registro) values ('{$username}', '{$nombre_usuario}', '{$apellido_usuario}', '{$username}', '{$md5pass}', '{$privilegio}', '{$fecha_registro}')";

        connect()->prepare($sentencia)->execute();

        echo '<script type="text/javascript">
        alert("Usuario registrado correctamente.");
        window.location.href="../index.php";
    </script>';
    }
}



?>