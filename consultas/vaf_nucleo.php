<?php
/*
* @ Codigo de SiacomTek.
*/ 
function fileExist(){
    if(file_exists('./consultas/conexion.php')){
        include_once './consultas/conexion.php';
    }else{
        include_once './conexion.php';
    }
}

fileExist();

// Variables:
$arrIn = [
    'username', 
    'passwd', 
    'DNI', 
    'Contraseña', 
    'form-control', 
    ['off', 'on', null, true, '']
]; 



// Constantes de Inputs:
const f = '<input';
const ff = '>';
const ttext = ' type="text"';
const tnum = ' type="number"';
const tpass = ' type="password"';
const thidden = ' type="hidden"';
const subm = ' type="submit"';
const name = ' name=';
const login = ' name="login"';
const phld = ' placeholder=';
const cls = ' class=';
const value = ' value=';
const aoff = 'off';
const aon = 'on';
const blank = '';
const idForm = ' id=';
const autoFocus = ' autofocus';
const required = ' required';

/////////////////// INPUTS:
function textForm($inpname, $phld='', $class='', $autoC=aoff, $extra=blank, $idForm=null, $autoF=false){

    ($autoC != aon && $autoC != null && $autoC != '')
        ? $autocomplete = " autocomplete=".aoff 
        : $autocomplete = " autocomplete=".aon;

    if($idForm == null){
        $idf = '';
    }else{
        $idf = idForm."{$idForm}";}

    if($autoF == false){
        $af = '';
    }else{
        $af = autoFocus;}

    $formText = f 
    . ttext 
    . name."{$inpname}" 
    . phld."{$phld}" 
    . cls."{$class}" 
    . $autocomplete 
    . $extra
    . $idf
    . $af
    . ff;

    echo $formText;
}

function numForm($inpname, $phld='', $class='', $autoC=aoff, $extra=blank, $idForm=null, $autoF=false){

    ($autoC != aon && $autoC != null && $autoC != '')
        ? $autocomplete = " autocomplete=".aoff 
        : $autocomplete = " autocomplete=".aon;

    if($idForm == null){
        $idf = '';
    }else{
        $idf = idForm."{$idForm}";}

    if($autoF == false){
        $af = '';
    }else{
        $af = autoFocus;}

    $formNum = f 
    . tnum 
    . name."{$inpname}" 
    . phld."{$phld}" 
    . cls."{$class}" 
    . $autocomplete 
    . $extra
    . $idf
    . $af
    . ff;

    echo $formNum;
}

function passForm($inpname, $phld='', $class='', $autoC=aoff){
    ($autoC != aon || $autoC != null || $autoC != '')
        ? $autocomplete = " autocomplete=".aoff 
        : $autocomplete = " autocomplete=".aon;
    $formPass = f 
    . tpass 
    . name."{$inpname}" 
    . phld."{$phld}" 
    . cls."{$class}" 
    . $autocomplete
    . ff;

    echo $formPass;
}
function hiddenForm($inpname, $value){
    $formHidden = f 
    . thidden 
    . name."{$inpname}" 
    . value."{$value}"
    . ff;

    echo $formHidden;
}

function btnSubmit($class){
    $formBtn = f 
    . subm
    . cls."{$class}"
    . login
    . ff;

    echo $formBtn;
}

/////////////////// SI NO EXISTE USUARIO, LO CREO:

function checkUsuario(){
    $sql = "SELECT * FROM ov_usuarios";
    $query = connect()->prepare($sql);
    $query->execute();
    foreach ($query as $chkU) {
        if(isset($chkU)){
            true; 
        }
    }
    if(isset($chkU)){
        include_once './productos.php';
    }else{
        include_once './consultas/primer_usuario.php';
        echo '<center>
        <div>
            <div><img src="./consultas/docs/img/imgregistro.png" alt=""></div>
            <div><h1>Nuevo usuario</h1></div>
            <div>
                <div style="width: 50%;" class="container my-5">
                <h6 style="color:#981a26">> Todos los campos son obligatorios.</h6>

                <form id="formulario" action="./consultas/insertuser.php" method="POST">
                <input type="text" name="nombre_usuario" placeholder="Nombre" class="form-control my-3" required autofocus>
                <input type="text" name="apellido_usuario" placeholder="Apellido" class="form-control my-3" required>
                <input maxlength="8" type="number" name="username" placeholder="DNI" class="form-control my-3" required>
                <input type="password" name="passwd" placeholder="Contraseña" class="form-control my-3" required>
                <input type="password" name="passwd2" placeholder="Repetir contraseña" class="form-control my-3" required>
                <input type="hidden" name="privilegio" value="Administrador">
                <button class="btn btn-primary2" type="reset">Resetear campos</button>
                <button class="btn btn-primary" type="submit">Enviar</button>
                </form>

            </div></div>
        </center>';
    }
}
function nuevoUsuario(){
    include_once './primer_usuario.php';
    echo '<center>
        <div>
            <div><img src="./docs/img/imgregistro.png" alt=""></div>
            <div><h1>Nuevo usuario</h1></div>
            <div>
                <div style="width: 50%;" class="container my-5">
                <h6 style="color:#981a26">> Todos los campos son obligatorios.</h6>

                <form id="formulario" action="./insertuser.php" method="POST">
                <input type="text" name="nombre_usuario" placeholder="Nombre" class="form-control my-3" required autofocus>
                <input type="text" name="apellido_usuario" placeholder="Apellido" class="form-control my-3" required>
                <input maxlength="8" type="number" name="username" placeholder="DNI" class="form-control my-3" required>
                <input type="password" name="passwd" placeholder="Contraseña" class="form-control my-3" required>
                <input type="password" name="passwd2" placeholder="Repetir contraseña" class="form-control my-3" required>
                <input type="hidden" name="privilegio" value="Administrador">
                <button class="btn btn-primary2" type="reset">Resetear campos</button>
                <button class="btn btn-primary" type="submit">Enviar</button>
                </form>

            </div></div>
        </center>';
}
function getUsuario(){
    $sql = "SELECT * FROM ov_usuarios";
    $query = connect()->prepare($sql);
    $query->execute();
    foreach($query as $userget){

    }
    getUsuario($userget);
}
function getNombreUsuario($userget){
    return $userget['nombre_usuario'];
}
/////////////////// ESTADOS:
function getEstado(){
    $sql = "SELECT * FROM ov_estados";
    $query = connect()->prepare($sql);
    $query->execute();
    foreach($query as $edo){
        $idEstado = $edo['id_estado'];
        $estado = $edo['estado'];
        $nombre = $edo['nombre'];
    }
}

function getEstadoLetra($le){
    $sql = "SELECT nombre FROM ov_estado WHERE estado={$le}";
    $query = connect()->prepare($sql);
    $query->execute();
    foreach($query as $result){
        return $result->nombre;
    }
}

/////////////////// LOCAL:
function getLocal(){
    $sql = "SELECT * FROM ov_local";
    $query = connect()->prepare($sql);
    $query->execute();
    foreach ($query as $rloc) {
        echo $rloc['nombre_local'];
    }
}

/////////////////// CATALOGO:
const catNull = '';

function trProductos(){
    echo '<tr>
    <th></th>
    <th>Código</th>
    <th>Producto</th>
    <th>Descripción</th>
    <th>Precio</th>';
    if(isset($_SESSION['username'])){
        echo '<th colspan="2">Opciones</th>
        <th>Estado</th>';
    }
    echo '</tr>';
}

function trClientes(){
    echo '<tr>
    <th></th>
    <th style="width:250px">Cliente</th>
    <th>Fecha</th>
    <th>Obra Social</th>
    <th>Laboratorio</th>
    <th>Telefono</th>
    <th>Doctor</th>';
    if(isset($_SESSION['username'])){
        echo '<th>Opciones</th>';
    }
    echo '</tr>';
}
/////////////////// Datos del usuario:
function getIdUsuario($user){
    $query = connect()->prepare('SELECT * FROM ov_usuarios WHERE dni_usuario = :user');
    $query->execute(['user' => $user]);
    foreach ($query as $currentUser) {
        $idUsuario = ucwords($currentUser['id_usuario']);
        return $idUsuario;
    }
}
function getNombre($user){
    $query = connect()->prepare('SELECT * FROM ov_usuarios WHERE dni_usuario = :user');
    $query->execute(['user' => $user]);
    foreach ($query as $currentUser) {
        $nombre = ucwords($currentUser['nombre_usuario']);
        return $nombre;
    }
}
function getApellido($user){
    $query = connect()->prepare('SELECT * FROM ov_usuarios WHERE dni_usuario = :user');
    $query->execute(['user' => $user]);
    foreach ($query as $currentUser) {
        $apellido = ucwords($currentUser['apellido_usuario']);
        return $apellido;
    }
}
function getDNI($user){
    $query = connect()->prepare('SELECT * FROM ov_usuarios WHERE dni_usuario = :user');
    $query->execute(['user' => $user]);
    foreach ($query as $currentUser) {
        $dni = $currentUser['dni_usuario'];
        return $dni;
    }
}
function getFotoPerfil($user){
    $query = connect()->prepare('SELECT * FROM ov_usuarios WHERE dni_usuario = :user');
    $query->execute(['user' => $user]);
    foreach ($query as $currentUser) {
        $foto_perfil = $currentUser['foto_perfil'];
        return $foto_perfil;
    }
}

function versionSoft(){
    $sql = "SELECT * FROM version_soft order by id_version desc";
    $query = connect()->prepare($sql);
    $query->execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
            foreach ($results as $rv) {
                    echo '<tr>
                            <td align="center">'.$rv->version.'</td>
                            <td align="center">'.$rv->fecha.'</td>
                            <td>'.$rv->descripcion.'</td>
                    </tr>';
            }
    }
}

?>