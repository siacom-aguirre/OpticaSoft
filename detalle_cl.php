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
    if($cliente['foto_receta'] != '.'){
        $fotoP = './consultas/docs/img_recetas/'.$cliente['foto_receta'];
    }else{
        $fotoP = './consultas/docs/img/subir_receta.png';
    }
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
                            <td class="Label"><label>Sr/a: </label></td>
                            <td><div style="width: 200px; color:beige;">'.$cliente['nombre_cliente'].'</div></td>
                            <td rowspan="7">
                                    <section class="seccionPf">
                                    <img class="img-responsive" src="'.$fotoP.'" />
                                    <div class="vistaPf"><img src="'.$fotoP.'" /></div>
                                    </section>
                            </td>
                        </tr>
                        <tr>
                            <td class="Label"><label>Fecha: </label></td>
                            <td><div style="width: 200px; color:beige;">'.$cliente['fecha_cliente'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label" align="top"><label>Obra Social: </label></td>
                            <td><div style="width: 200px; color:beige;">'.$cliente['obra_social'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label" align="top"><label>Laboratorio: </label></td>
                            <td><div style="width: 200px; color:beige;">'.$cliente['laboratorio'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label" align="top"><label>Telefono: </label></td>
                            <td><div style="width: 200px; color:beige;">'.$cliente['telefono'].'</div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="Label" align="top"><label>Doctor: </label></td>
                            <td><div style="width: 200px; color:beige;">'.$cliente['doctor'].'</div></td>
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