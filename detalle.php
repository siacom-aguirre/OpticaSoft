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

    <title>Modificar producto / Optica VEO</title>
</head>
<body>
<?php
date_default_timezone_set('America/Argentina/Buenos_Aires'); 
$fecha_creacion = date("d-M-Y H:i:s");
$codigo = $_GET['codigo']; 

echo '<center>';
include_once './consultas/lista_productos.php';
$sql = "SELECT * FROM ov_productos WHERE codigo_interno='{$codigo}'";
$query = connect()->prepare($sql);
$query->execute();
foreach($query as $producto){
    if($producto['foto_producto'] != ''){
        $fotoP = './consultas/docs/img_productos/'.$producto['foto_producto'];
    }else{
        $fotoP = './consultas/docs/img/sin_imagen.png';
    }
    echo '<div id="contenido">
			<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
            <br>
            <h3>Detalle del artículo</h1>
				<form action="" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
                    <table>
                        <tr>
                            <td class="Label"><label for="codigo_producto">Código del producto: </label></td>
                            <td><div style="max-width: 200px; color:beige;">'.$producto['codigo_producto'].'</div></td>
                            <td rowspan="7">
                                    <section>
                                    <img class="img-responsive" src="'.$fotoP.'" />
                                    </section>
                            </td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="nombre_producto">Nombre del producto: </label></td>
                            <td><div style="max-width: 200px; color:beige;">'.$producto['nombre_producto'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label" align="top"><label for="descripcion">Descripción: </label></td>
                            <td><div style="max-width: 200px; color:beige;">'.$producto['descripcion'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label"><label for="precio_producto">Precio: </label></td>
                            <td><div style="max-width: 200px; color:beige;">$ '.$producto['precio_producto'].',00 </div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td align="right"></td>
                            <td align="center"></td>
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