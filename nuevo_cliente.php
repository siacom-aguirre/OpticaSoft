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

    <script>
    function previewImage(nb) {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
    reader.onload = function (e) {             
        document.getElementById('uploadPreview'+nb).src = e.target.result;         
    };     
    }  
    </script>

    <title>Alta de cliente / Optica VEO</title>
</head>
<body>
<?php
date_default_timezone_set('America/Argentina/Buenos_Aires'); 
$fecha_creacion = date("d-M-Y H:i:s");
?>
<center>
    <div id="contenido">
			<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
				<span>
					<h1>Cargar nuevo cliente</h1>
				</span>
				<br>
				<form action="./consultas/cargar_cliente.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
                    <table>
                        <tr>
                            <td class="Label"><label for="codigo_cliente">Documento del cliente * </label></td>
                            <td><input style="width: 300px;" maxlength="8" type="number" name="dni_cliente" required autofocus></td>
                        </tr>
                        <tr>
                            <td class="Label" style="color:#9ed2c1;"><label for="nombre_cliente">Nombre del cliente * </label></td>
                            <td><input style="width: 300px;" type="text" id="nombre_cliente" name="nombre_cliente" autocapitalize="on" autocomplete="off" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label" style="color:#9ed2c1;"><label for="apellido_cliente">Apellido del cliente * </label></td>
                            <td><input style="width: 300px;" type="text" id="apellido_cliente" name="apellido_cliente" autocapitalize="on" autocomplete="off" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="descripcion">Descripción </label></td>
                            <td><textarea style="width: 300px;" id="descripcion" name="descripcion"></textarea></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="obra_social">Obra Social </label></td>
                            <td><input style="width: 300px;" type="text" id="obra_social" name="obra_social" autocomplete="off"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="fecha_creacion" value="<?php echo $fecha_creacion; ?>">
                            </td>
                            <td><button type="reset" class="btnR btn-success">Resetear</button><button type="submit" class="btnx btn-success">Guardar</button></td>
                        </tr>
                    </table>
                <br>
            </form>    
        </div>
    </div>
    <div class="oblig">(*) Campos obligatorios.</div>
</center>

<?php
include 'footer.php';
?>
</body>
</html>