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
    <script type="text/javascript">
    window.onload=function(){/*from  w w  w.j a v a  2  s.  com*/
//dd/mm/yyyy
var date = new Date();
console.log(date);
var month = date.getMonth();
console.log(month);
var day = date.getDate();
console.log(day);
var year = date.getFullYear();
console.log(year);
console.log(month+"/"+day+"/"+year);
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
				<form action="./consultas/cargar_cliente.php" method="POST" enctype="multipart/form-data" style="border-collapse: separate; border-spacing: 10px 5px;">
                    <table>
                        <tr>
                            <td class="Label"><label for="cliente">Sr/a * </label></td>
                            <td><input style="width: 250px;" id="cliente" name="nombre_cliente" required autofocus></td>
                            <td rowspan="7">
                                <div class="uploadImg">
                                    <label for="uploadImage1">
                                    <section class="detalle-imagen">
                                    <img id="uploadPreview1" class="img-responsive" src="./consultas/docs/img/subir_receta.png" />
                                    <img title="Sólo archivos JPG, JPEG, PNG & GIF  son permitidos." src='./consultas/docs/img/flecha_subir.gif' class="flechaUpload">
                                    </section></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="Label" style="color:#9ed2c1;"><label for="fecha_cliente">Fecha * </label></td>
                            <td><input style="width: 250px;" type="date" id="fecha_cliente" name="fecha_cliente" autocapitalize="on" autocomplete="off" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="obra_social">Obra Social </label></td>
                            <td><input style="width: 250px;" type="text" id="obra_social" name="obra_social" autocomplete="off"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="laboratorio">Laboratorio </label></td>
                            <td><input type="text" style="width: 250px;" id="laboratorio" name="laboratorio"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="telefono">Telefono </label></td>
                            <td><input type="number" style="width: 250px;" id="telefono" name="telefono"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="doctor">Doctor </label></td>
                            <td><input type="text" style="width: 250px;" id="doctor" name="doctor"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="file" name="foto_receta" onchange="previewImage(1);" class="inputfile" id="uploadImage1"/></td>
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