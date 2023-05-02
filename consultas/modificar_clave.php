<?php
include_once 'conexion.php';
$username = $_POST['usuario'];
$passold = md5($_POST['passold']);
$passwd1 = md5($_POST['passwd1']);
$passwd2 = md5($_POST['passwd2']);

$sql = "SELECT * FROM ov_usuarios WHERE username='".$username."'";
$query = connect()->prepare($sql);
$query->execute();
foreach($query as $usuario){}

if(md5($_POST['passold']) == $usuario['passwd']){
    if($passwd1 == $passwd2){
        $sentencia1= "UPDATE ov_usuarios SET passwd='".$passwd1."' WHERE username='".$username."'";
	connect()->prepare($sentencia1)->execute();
    }else{
        echo "<script type='text/javascript'>
        alert('Las claves nuevas no coinciden.')
        window.location.href= '../index?lnk=modificar_clave';
    </script>";
    }
}else{
    echo "<script type='text/javascript'>
        alert('La clave antigua no es correcta.')
        window.location.href= '../index?lnk=modificar_clave';
    </script>";
}


?>

<script type="text/javascript">
    alert('Clave modificada correctamente.')
	window.location.href= '../index?lnk=perfil';
</script>