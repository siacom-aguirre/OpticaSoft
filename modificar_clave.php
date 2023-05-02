<?php
include_once './consultas/conexion.php';
if(!isset($_SESSION['username'])){
    header('location: ./consultas/relogin');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./dist/css/aplicacion.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
</head>
<body>
<?php include_once './header.php'; ?>
<?php
$usuario = $_SESSION['username'];
$sql = "SELECT * FROM ov_usuarios WHERE username='{$usuario}'";
$query = connect()->prepare($sql);
$query->execute();
foreach($query as $usuario){}
$usuario['foto_perfil'] != '' 
? $fotoPerfil = '<img id="uploadPreview1" src="./consultas/docs/img/perfiles/'.$usuario['foto_perfil'].'">' 
: $fotoPerfil = '<img id="uploadPreview1" src="./consultas/docs/img/user.png">';
?>
<center>
    <div class="fichax">
        <form action="./consultas/modificar_clave.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr><td>Usuario/DNI</td><td><input type="number" value="<?php echo $usuario['dni_usuario']; ?>" disabled></td></tr>
                <tr><td>Contraseña actual</td><td><input name="passold" type="password" placeholder="*****" autocomplete="off" required></td></tr>
                <tr><td>Nueva contraseña</td><td><input name="passwd1" type="password" autocomplete="off" required></td></tr>
                <tr><td>Repetir contraseña</td><td><input name="passwd2" type="password" autocomplete="off" required></td></tr>
                <tr><td><input type="text" name="usuario" value="<?php echo $usuario['username']; ?>" hidden></td></tr>
                <tr><td colspan="2" align="center"><input class="btnMod" type="submit" value="modificar clave"></td></tr>
            </table>
        </form>
    </div>
</center>
<?php include_once './footer.php'; ?>
</body>
</html>