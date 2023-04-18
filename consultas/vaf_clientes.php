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
    $sentencia = "SELECT * FROM ov_clientes";
    $resultado = $conexion->query($sentencia) or die("Error al consultar producto" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();
    //foreach($fila as $p){

    if(!isset($fila)){
        echo '<center><div class="sinArt">No existe ningún cliente cargado.</div></center>';
        echo '<center><div class="primerArt"><a href="?lnk=nuevo_cliente"><i class="bx bx-add-to-queue"></i> Cargar nuevo cliente.</a></div></center>';
    }else{
        echo '<div class="Catalogo">';
        trClientes();
        include './consultas/lista_clientes.php';
        
        $sql = "SELECT * FROM ov_clientes";
        $query = $connect->prepare($sql);
        $query->execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $cliente) { 
                $cliente->foto_receta != '.' 
                ? $foto = './consultas/docs/img_recetas/'.$cliente->foto_receta 
                : $foto = './consultas/docs/img/sin_imagen.png';

                echo "<tr class='act'>
                    <td class='fotoProducto'><a href='?lnk=detalle_cl&codigo={$cliente->codigo_interno}'><img src='{$foto}'></a></td>
                    <td>{$cliente->nombre_cliente}</td>
                    <td>{$cliente->fecha_cliente}</td>
                    <td>{$cliente->obra_social}</td>
                    <td>{$cliente->laboratorio}</td>
                    <td>{$cliente->telefono}</td>
                    <td>{$cliente->doctor}</td>";
                    if(isset($_SESSION['username'])){
                        echo "<td style='background-color: rgba(0,0,0,.2); width: 150px;'><a href='?lnk=modificar_cl&codigo={$cliente->codigo_interno}'><div class='modif'><strong>Modificar</strong></div></a></td>";
                    }
                    echo "</tr>";
        echo '</div>';
    }}}
}
getCatalogo();
?>