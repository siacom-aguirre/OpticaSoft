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

    <title>Cliente / Optica VEO</title>
</head>
<body>
<?php
date_default_timezone_set('America/Argentina/Buenos_Aires'); 
$fecha_creacion = date("d-M-Y H:i:s");
$codigo = $_GET['codigo']; 

echo '<center>';
include_once './consultas/lista_clientes.php';
$sql = "SELECT * FROM ov_clientes WHERE codigo_interno='{$codigo}'";
$query = connect()->prepare($sql);
$query->execute();
foreach($query as $cliente){
    echo '<center>
    <div id="contenido">
			<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
				<span>
					<h1>Detalles del cliente</h1>
				</span>
				<br>
				<form action="" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
                    <table>
                        <tr>
                            <td class="Label"><label for="codigo_cliente">Documento del cliente: </label></td>
                            <td><div style="width: 300px; color:beige;">'.$cliente['dni_cliente'].'</div></td>
                        </tr>
                        <tr>
                            <td class="Label" style="color:#9ed2c1;"><label for="nombre_cliente">Nombre del cliente: </label></td>
                            <td><div style="width: 300px; color:beige;">'.$cliente['nombre_cliente'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label" style="color:#9ed2c1;"><label for="apellido_cliente">Apellido del cliente: </label></td>
                            <td><div style="width: 300px; color:beige;">'.$cliente['apellido_cliente'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="descripcion">Descripción: </label></td>
                            <td><div style="max-width: 300px; color:beige;">'.$cliente['descripcion'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="obra_social">Obra Social: </label></td>
                            <td><div style="width: 300px; color:beige;">'.$cliente['obra_social'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="fecha_creacion" value="'.$cliente['dni_cliente'].'">
                            </td>
                            <td></td>
                        </tr>
                    </table>
                <br>
            </form>    
        </div>
    </div>
</center>';
}
include 'footer.php';
?>
</body>
</html>