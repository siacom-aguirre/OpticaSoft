<!DOCTYPE html>
<html>
<?php
include './dist/css/horacss.php';
include './consultas/vaf_nucleo.php';
?>

<head>
    <link rel="stylesheet" href="./dist/css/main.css">
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
                
                vaf_nucleo::numForm($arrIn[0],$arrIn[2],$arrIn[4],$arrIn[5][0]);
                vaf_nucleo::passForm($arrIn[1],$arrIn[3],$arrIn[4],$arrIn[5][0]);
                vaf_nucleo::btnSubmit("btn");

                ?>
            </form>
            <div class="mt-3" id="respuesta">

            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>