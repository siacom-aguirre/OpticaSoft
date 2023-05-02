<table><tr>
<?php
$sql = "SELECT * FROM ov_usuarios";
$query = connect()->prepare($sql);
$query->execute();
$resultado = $query -> fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    foreach($resultado as $usuario){
        $nombreUser = $usuario->nombre_usuario;
        $nomUser = explode(' ', trim($nombreUser));
        $usuario->foto_perfil != '' ? $avatar = '<img src="../consultas/docs/img/perfiles/'.$usuario->foto_perfil.'">' : $avatar = '<img src="../consultas/docs/img/user.png">';

        echo '<td><a href="?lnk=log&usuario='.$usuario->username.'"><div class="usuario">
        <div class="imagen">'.$avatar.'</div>
        <div class="nombre">'.$nomUser[0].'</div>
    </div></a></td>';
    }
}
?>
</tr></table>