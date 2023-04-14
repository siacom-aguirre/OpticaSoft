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

    <title>Alta de producto / Optica VEO</title>
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
					<h1>Cargar nuevo producto</h1>
				</span>
				<br>
				<form action="./consultas/cargar_producto.php" method="POST" enctype="multipart/form-data" style="border-collapse: separate; border-spacing: 10px 5px;">
                    <table>
                        <tr>
                            <td class="Label"><label for="codigo_producto">Código del producto * </label></td>
                            <td><input type="text" id="codigo_producto" name="codigo_producto" autocapitalize="on" autocomplete="off" autofocus required></td>
                            <td rowspan="7">
                                <div class="uploadImg">
                                    <label for="uploadImage1">
                                    <section class="detalle-imagen">
                                    <img id="uploadPreview1" class="img-responsive" src="./consultas/docs/img/subir_imagen.png" />
                                    <img title="Sólo archivos JPG, JPEG, PNG & GIF  son permitidos." src='./consultas/docs/img/flecha_subir.gif' class="flechaUpload">
                                    </section></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="Label" style="color:#9ed2c1;"><label for="nombre_producto">Nombre del producto * </label></td>
                            <td><input type="text" id="nombre_producto" name="nombre_producto" autocapitalize="on" autocomplete="off" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="descripcion">Descripción </label></td>
                            <td><textarea id="descripcion" name="descripcion"></textarea></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="precio_producto">Precio * </label></td>
                            <td><input type="number" id="precio_producto" name="precio_producto" autocomplete="off" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="file" name="foto_producto" onchange="previewImage(1);" class="inputfile" id="uploadImage1"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="estado_producto" value="Habilitado">
                                <input type="hidden" name="fecha_creacion" value="<?php echo $fecha_creacion; ?>">
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