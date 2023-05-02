<!DOCTYPE html>
<html lang="es">
<html>
<?php
include_once './conexion.php';
include './vaf_nucleo.php';

?>
<?php
session_start();
if (isset($_POST['login'])) {
    $usuario = $_POST['username'];
    $passwd = md5($_POST['passwd']);

    $sql = "SELECT COUNT(*) as count FROM ov_usuarios WHERE username='$usuario' AND passwd='$passwd'";
    $query = mysqli_query($conexion, $sql);
    $array = mysqli_fetch_array($query);

    if($array['count']>0){
        $_SESSION['username'] = $usuario;
        header('location: ../index');
    }else{
        $errorLogin = 'Clave incorrecta.';
    }
}
?>

<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../dist/css/relogin.css">
    <script src="./js/fondo-min.js"></script>
    <script>
        function loadImage()
        {
            $("#image").load("fondos.php");
        }
        $(document).ready(function(){
            loadImage();
            // indicamos que llame a la funcion loadimage cada 5 segundos
            setInterval("loadImage()",86400);
        })
    </script>

    <title>Optica Veo | Inicio de sesión</title>
</head>

<body>
    <div class="body_usuarios">
        <div id="image"></div>
        <div class="usuarios">
            <?php
            if (isset($errorLogin)) {
                echo "
            <div class='errorLogin'>
                <div>{$errorLogin}</div>
            </div>";
            };

            $pagina = isset($_GET['lnk']) ? strtolower($_GET['lnk']) : 'usuarios';
            require_once './' . $pagina . '.php';
            ?>
        </div>
    </div>
    <a href='nuevo_usuario'><div class="footer"><i class='bx bxs-id-card'></i> registrarse</div></a>
</body>
</html>