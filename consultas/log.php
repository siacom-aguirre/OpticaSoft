<table align="center"><tr>
<?php
$username = $_GET['usuario'];
$sql = "SELECT * FROM ov_usuarios WHERE username='{$username}'";
$query = connect()->prepare($sql);
$query->execute();
foreach($query as $usuario){
    $nombreUser = $usuario['nombre_usuario'];
    $nomUser = explode(' ', trim($nombreUser));
    $usuario['foto_perfil'] != '' ? $avatar = '<img src="../consultas/docs/img/perfiles/'.$usuario['foto_perfil'].'">' : $avatar = '<img src="../consultas/docs/img/user.png">';
    

    echo '<td>
    <div class="usuariox">
    <div class="imagen">'.$avatar.'</div>
    <div class="nombre">'.$nomUser[0].'</div>
    <div>
    <form action="" method="POST">
    <input type="text" name="username" value="'.$usuario['username'].'" hidden>
    <div>
    <input class="passwd" type="password" name="passwd" placeholder="contraseña">
    <img class="key" src="../consultas/docs/img/llave.png">
    </div>
    <input type="submit" name="login" hidden>
    </form>
</div>

</div>
</td>';
}

?>
</tr></table>
