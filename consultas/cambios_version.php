<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambios en versiones de MEV.</title>
    <style>
        table{
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -10%);
        }
        .cambiosVersion{
            width: 70%;
            border-radius: 10px;
        }
        .cambiosVersion th{
            background-color: #303030;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .cambiosVersion>tbody>tr:nth-child(odd)>td{
        background-color: #fff;
        }
        .cambiosVersion>tbody>tr:nth-child(even)>td{
        background-color: rgba(0,0,0,.1);
        }
        .cambiosVersion>thead>tr>th {
            background-color: #eee;
        }
    </style>
</head>
<body>
<center>
    <table class='cambiosVersion' style="border:1px solid black">
        <tbody>
            <tr>
                <th style="width: 100px;">Versión</th>
                <th style="width: 100px;">Fecha</th>
                <th>Descripción</th>
            </tr>
            <?php
            include 'vaf_nucleo.php';
            versionSoft();
            ?>
        </tbody>
    </table>
</center>
</body>
</html>