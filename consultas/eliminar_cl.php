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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./dist/css/aplicacion.css">

    <title>Eliminar cliente / Optica VEO</title>
</head>
<body>
<?php
date_default_timezone_set('America/Argentina/Buenos_Aires'); 
$fecha_creacion = date("d-M-Y H:i:s");

$cliente = $_GET['cl'];
$nombre = ucwords(str_replace('_', ' ', $_GET['cn']));
?>
</body>
</html>
<center>
    <div class="advertenciaE">
        <br>
        <h3>¿Seguro que desea eliminar a <u><?php echo $nombre; ?></u> de la lista?</h3>
        <h5>Si elimina este cliente de la base de datos, su registro de usuario quedará asentado en la auditoría del Sistema.</h5>
        <br>
    </div>
    <div class="advConfirmacion">
        <table align="center" style="width: 300px;">
        <tr>
            <td align="center"><div class="btnR btnDel"><a href="consultas/delete_cl?cl=<?php echo $cliente;?>">ELIMINAR</a></div></td>
            <td align="center"><div class="btnA btnVol"><a href="../index?lnk=clientes">VOLVER</a></div></td>
        </tr>
        </table>
    </div>
</center>
<?php
include 'footer.php';
?>