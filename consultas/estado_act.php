<?php

include_once 'conexion.php';

$sql = "UPDATE ov_productos SET estado_producto='Habilitado' WHERE id_producto =" . $_GET['prod'];
connect()->prepare($sql)->execute();
        
?>

<script type='text/javascript'>
    window.close();
</script>