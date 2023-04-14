<?php
// PDO:
function connect(){
    include('consultas_cn.key');
    try{
        
        $connection = "mysql:host=" . $nombreServer . ";dbname=" . $nombreDB;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($connection, $nombreUsuario, $passUsuario, $options);

        return $pdo;

    }catch(PDOException $e){
        print_r('Error: ' . $e->getMessage());
    }   
}
// MySQLi:
include('consultas_cn.key');
$conexion = mysqli_connect($nombreServer, $nombreUsuario, $passUsuario, $nombreDB);

$conexion ? 'Conexion correcta.' : 'Fallo en la conexion.';

?>