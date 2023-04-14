<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./dist/css/aplicacion.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if(isset($_SESSION['username'])){
            if (getIdUsuario($_SESSION['username']) > 1) {
                print_r("Panel del Administrador");
            } else {
                print_r(getLocal() ." / Panel / ". getNombre($_SESSION['username']));
            }
        }else{
            print_r(getLocal() . " / Panel");
        }
        ?>
  </title>
</head>
<body>
<center>
<div class="todo">
  <div id="contenido1">
    <table class='detalleProd'>
    <tbody>
        <?php
        include 'consultas/vaf_clientes.php';
        ?>
        </tbody>
    </table>
  </div>
</div>
</center>
<?php
include 'footer.php';
?>
</body>
</html>