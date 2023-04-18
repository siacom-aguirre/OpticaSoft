
<?php
include_once 'conexion.php';
if (!isset($_POST['buscar'])){
    $_POST['buscar'] = '';
}
if (!isset($_REQUEST["mostrar_todo"])){
    $_REQUEST["mostrar_todo"] = '';
}

if(!empty($_POST)){
    function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
        return ($string !== '' && $frase !== '')
        ? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
        : $string;
    }

    $aKeyword = explode(" ", $_POST['buscar']);
    $filtro = "WHERE nombre_producto LIKE LOWER('%".$aKeyword[0]."%') OR descripcion LIKE LOWER('%".$aKeyword[0]."%')";
    $query ="SELECT * FROM ov_productos 
    WHERE codigo_producto LIKE LOWER('%".$aKeyword[0]."%') 
    OR nombre_producto LIKE LOWER('%".$aKeyword[0]."%')
    OR descripcion LIKE LOWER('%".$aKeyword[0]."%')
    OR precio_producto LIKE LOWER('%".$aKeyword[0]."%')
    ORDER BY codigo_producto ASC
    ";
  
    for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR nombre_producto LIKE '%" . $aKeyword[$i] . "%' OR descripcion LIKE '%" . $aKeyword[$i] . "%'";
        }
    }
    if(!isset($_SESSION)){
        session_start();
    }
    $result = $conexion->query($query);
    $numero = mysqli_num_rows($result);
    if (!isset($_POST['buscar'])){
        echo "Has buscado la palabra:<b> ". $_POST['buscar']."</b>";
    }
    if( mysqli_num_rows($result) > 0 AND $_POST['buscar'] != '') {
        $row_count=0;
        echo "<br><br><table class='table table-striped'>
        <thead>";
        echo '<tr>
    <th>Código</th>
    <th>Producto</th>
    <th>Descripción</th>
    <th>Precio</th>
    </tr>';
        echo "</thead>";
        while($row = $result->fetch_assoc()) {   
            $row_count++;

            $idProd = $row['codigo_producto'];
            echo "<div><tr class='resul'>
                <td>". resaltar_frase($row['codigo_producto'] ,$_POST['buscar']) . "</td>
                <td>". resaltar_frase($row['nombre_producto'] ,$_POST['buscar']) . "</td>
                <td>". resaltar_frase($row['descripcion'] ,$_POST['buscar']) . "</td>
                <td>$ ". resaltar_frase($row['precio_producto'] ,$_POST['buscar']) . ",00</td>
                <td><a href='?lnk=detalle&codigo=". $row['codigo_interno'] . "'>abrir</a></td></tr></div></div>";
        }
        echo "</table>";
    } else {
        if( $_REQUEST["mostrar_todo"] == 'ok') {
            $row_count=0;
            echo "<br><br><table class='table table-striped'>";
            While($row = $result->fetch_assoc()) {   
                $row_count++;   
                echo "<tr><td>".$row_count." </td><td>". resaltar_frase($row['nombre_producto'] ,$_POST['buscar']) . "</td><td>". resaltar_frase($row['descripcion'] ,$_POST['buscar']) . "</td></tr>";
            }
            echo "</table>";
        }
    }
}

?>