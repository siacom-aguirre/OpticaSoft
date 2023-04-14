<?php

function getCatalogo(){
////////// DB:
    
    include('consultas_cn.key');
    try{
        $connect = new PDO("mysql:host=".$nombreServer.";dbname=".$nombreDB, $nombreUsuario, $passUsuario,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }catch (PDOException $e){exit("Error: " . $e->getMessage());}

    $conexion= new mysqli($nombreServer, $nombreUsuario, $passUsuario, $nombreDB);
	if(mysqli_connect_errno()){printf("Fallo la conexion");}
    
////////// SQL:
    $sentencia = "SELECT * FROM ov_productos";
    $resultado = $conexion->query($sentencia) or die("Error al consultar producto" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();
    //foreach($fila as $p){

    if(!isset($fila)){
        echo '<center><div class="sinArt">No existe ningún catalogo cargado.</div></center>';
        echo '<center><div class="primerArt"><a href="?lnk=nuevo_producto"><i class="bx bxs-file-plus"></i> Cargar articulo nuevo.</a></div></center>';
    }else{
        echo '<div class="Catalogo">';
        trProductos();
        include './consultas/lista_productos.php';
        
        $sql = "SELECT * FROM ov_productos";
        $query = $connect->prepare($sql);
        $query->execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $prod) { 
                if($prod->estado_producto == 'Habilitado'){
                    $ch = 'checked';
                    $class = "class='act'";
                }else{
                    $ch = '';
                    $class = "class='des'";
                }
                $prod->estado_producto == 'Habilitado' ? $pestado_producto = 'Habilitado' : $pestado_producto = 'Deshabilitado';
                $prod->foto_producto != '' 
                ? $foto = './consultas/docs/img_productos/'.$prod->foto_producto 
                : $foto = './consultas/docs/img/sin_imagen.png';

                echo "<tr id='tdId".$prod->id_producto."' {$class}>
                    <td class='fotoProducto'><a href='?lnk=detalle&codigo={$prod->codigo_interno}'><img src='{$foto}'></a></td>
                    <td>{$prod->codigo_producto}</td>
                    <td>{$prod->nombre_producto}</td>
                    <td>{$prod->descripcion}</td>
                    <td>$ {$prod->precio_producto},00</td>";
                    if(isset($_SESSION['username'])){
                        echo "<td style='background-color: rgba(0,0,0,.2); width: 150px;'><a href='?lnk=modificar&codigo={$prod->codigo_interno}'><div class='modif'><strong>Modificar</strong></div></a></td>
                        <td style='background-color: rgba(0,0,0,.2); width: 100px;'><ol class='switches'><input type='checkbox' id='p_{$prod->id_producto}' {$ch}><label for='p_{$prod->id_producto}'><span title='Habilitar o deshabilitar producto.'></span></label></ol></td>
                        <td style='width:150px;'><div id='msg{$prod->id_producto}'>".$pestado_producto."</div></td>";
                    }
                    echo "</tr>";
        echo '</div>';
        echo '<script type="text/javascript">

        let miCheckbox'.$prod->id_producto.' = document.getElementById("p_'.$prod->id_producto.'");
        let msg'.$prod->id_producto.' = document.getElementById("msg'.$prod->id_producto.'");
        let tdid'.$prod->id_producto.' = document.getElementById("tdId'.$prod->id_producto.'");

        miCheckbox'.$prod->id_producto.'.addEventListener("click", ()=> {
            if(miCheckbox'.$prod->id_producto.'.checked) {
                tdid'.$prod->id_producto.'.classList.replace("des", "act");
                msg'.$prod->id_producto.'.innerText = "Habilitado";
                open("../consultas/estado_act.php?prod='.$prod->id_producto.'" , "ventana" , "width=5,height=5,scrollbars=NO");
            } else {
                tdid'.$prod->id_producto.'.classList.replace("act", "des");
                msg'.$prod->id_producto.'.innerText = "Deshabilitado";
                open("../consultas/estado_des.php?prod='.$prod->id_producto.'" , "ventana" , "width=5,height=5,scrollbars=NO");
            }
        });
        </script>';
    }}}
}
getCatalogo();
?>