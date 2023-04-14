<!DOCTYPE html>
<html>
<?php
include_once './conexion.php';
include './vaf_nucleo.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');
$hora = date('H');

if($hora >= 06 && $hora <= 19){
    $horacss = 'href="../dist/css/claro.css"';
} else {
    $horacss = 'href="../dist/css/dark.css"';
}

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
        $errorLogin = 'El usuario y la contraseña no coinciden.';
    }
}
?>

<head>
    <link rel="stylesheet" href="../dist/css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" <?php print_r($horacss); ?>>
    <title>Optica Veo | Inicio de sesión</title>
</head>

<body>
    <div class="inicio_sesion">
        <div><img src="../consultas/docs/img/veo_logo.png"></div>
        <div style="width: 300px;" class="container my-5">
            <form action="" method="POST">
                <?php
                if (isset($errorLogin)) {
                    echo "
                <div class='errorLogin'>
                    <div>{$errorLogin}</div>
                    <a  class='recuperarpass' href='#'><div class='divrecpass'>Recuperar contraseña</div></a>
                </div>";
                };
                numForm($arrIn[0],$arrIn[2],$arrIn[4],$arrIn[5][0]);
                passForm($arrIn[1],$arrIn[3],$arrIn[4],$arrIn[5][0]);
                btnSubmit("btn");
                ?>
            </form>
        </div>
    </div>
    <?php include('../footer.php'); ?>
</body>

</html>