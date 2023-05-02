<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../dist/css/auditoria.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if(isset($_SESSION['username'])){
            print_r("Administrador");
            }else{
                echo 'Panel de control';
            }
        ?>
  </title>
</head>
<body>
<?php
function fileExist(){
    if(file_exists('../consultas/conexion.php')){
        include_once '../consultas/conexion.php';
    }else{
        include_once '../conexion.php';
    }
}

fileExist();
    function checkAdmin(){
        $sql = "SELECT * FROM ov_root";
        $query = connect()->prepare($sql);
        $query->execute();
        foreach ($query as $chkU) {
            if(isset($chkU)){
                true; 
            }
        }
        if(isset($chkU)){
            include_once './detalles.php';
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
checkAdmin();
?>
</body>
</html>