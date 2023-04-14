<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');
if(!isset($_SESSION['username'])){
  $hNombre = '<a href="consultas/relogin"><i class="bx bxs-user"></i> Iniciar usuario</a>';
  $hCerrar = '';
  $hFyH = date('d/m/Y h:i a');
  $hCargaP = '';
  $hCargaU = '';
  $rowspan = 'rowspan="2"';
} else {

  $hNombre = '<i class="bx bxs-user"></i> '.getNombre($_SESSION['username']).' '.getApellido($_SESSION['username']);
  $hCerrar = '<i class="bx bx-log-out"></i> <a href="consultas/logout">Cerrar sesión</a>';
  $hFyH = date('d/m/Y - h:i a');
  $hCargaP = '<div class="nuevoProd"><a href="?lnk=nuevo_producto"><i class="bx bxs-file-plus"></i> Nuevo articulo</a></div>';
  $hCargaU = '<div class="nuevoCli"><a href="?lnk=nuevo_cliente"><i class="bx bxs-user-plus"></i> Nuevo cliente</a></div>';
  $rowspan = '';
}

?>
<div class="headerPrincipal">
  <center>
    <table class='header'><tr>
    <td rowspan="2" class="headerLogo"><a href="?lnk=aplicacion"><img style="height: 50px;" src="./consultas/docs/img/logo400.png" class="logoLocal"></a></td>
    <td <?php echo $rowspan; ?> class="headerNombre"><?php echo $hNombre; ?></td>
    <td rowspan="2" class="HeaderFyH"><?php echo $hFyH; ?></td>
    <td class="HeaderCarga"><?php echo $hCargaP; ?></td>
    <td class="HeaderCarga"><?php echo $hCargaU; ?></td>
    </tr>
    <tr>
      <td class="HeaderCerrarSesion"><?php echo $hCerrar; ?></td>
      <td align="center"><a href="?lnk=aplicacion"><div class="listCli"><i class='bx bx-list-ol' ></i> Lista de productos</div></a></td>
      <td align="center"><a href="?lnk=clientes"><div class="listCli"><i class='bx bxs-user-detail' ></i> Lista de clientes</div></a></td>
    </tr>
</table>
<div class="headerMuerto">
</div>
</center>  
</div>