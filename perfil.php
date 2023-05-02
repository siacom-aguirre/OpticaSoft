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

    <script>
    function previewImage(nb) {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
    reader.onload = function (e) {             
        document.getElementById('uploadPreview'+nb).src = e.target.result;         
    };     
    }  
    </script>

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
    <div class="ficha">
        <form action="./consultas/modificar_perfil.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                <td class="img" colspan="2" align="center"><label for="uploadImage1"><div class="foto_perfil">
                    <?php echo $fotoPerfil; ?>
                    <i class="bx bxx bx-edit"></i>
                </div></label></td></tr>
                <tr><td>Usuario/DNI</td><td><input type="number" value="<?php echo $usuario['dni_usuario']; ?>" disabled></td></tr>
                <tr><td>Nombre</td><td><input type="text" name="nombre_usuario" value="<?php echo $usuario['nombre_usuario']; ?>"></td></tr>
                <tr><td>Apellido</td><td><input type="text" name="apellido_usuario" value="<?php echo $usuario['apellido_usuario']; ?>"></td></tr>
                <tr><td>Contraseña</td><td><a href="?lnk=modificar_clave&usuario=<?php echo $usuario['username']; ?>"><input class="passch" type="button" value="Cambiar contraseña"></a></td></tr>
                <tr><td>Privilegios</td><td><input type="text" value="<?php echo $usuario['privilegio']; ?>" disabled></td></tr>
                <tr><td>Fecha de registro</td><td><input type="text" value="<?php echo $usuario['fecha_registro']; ?>" disabled></td></tr>
                <tr><td><input type="number" name="usuario" value="<?php echo $usuario['username']; ?>" hidden><input type="file" name="foto_perfil" onchange="previewImage(1);" class="inputfile" id="uploadImage1"/></td></tr>
                <tr><td colspan="2" align="center"><input class="btnMod" type="submit" value="modificar"></td></tr>
            </table>
        </form>
    </div>
</center>
<?php include_once './footer.php'; ?>
</body>
</html>