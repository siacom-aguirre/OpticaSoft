<div class="footer">
    <table>
        <td>
        <th style="width: 33%;">
            <a href="#" class='contacto'>
                <?php echo "SiacomTeK ©".date('Y'); ?>
            </a>
        </th>
        <th style="width: 33%;">
            <table style="width: 100px;" id="tablaFooterMev">
            <td>
            <th style="width: 33%;">
                
            </th>
            <th style="width: 33%; color:#9ed2c1;">
                <?php echo " OpticaSoft</div> "; ?>
            </th>
            <th style="width: 33%;">
            <a href="#" class='contacto' id='infoBtn'>
                <i class='bx bx-info-circle'></i>
            </a>
            </th>
            </td>
            </table>
        </th>
        <th style="width: 33%;">
            <a href="#" class='contacto'>
            </a>
        </th>
        </td>
    </table>
</div>
<section class="logVersion" id="infoVersion">
    <center>
        <h1>OpticaSoft</h1>
        <h3><?php echo "Versión: 1.1"; ?></h3>
        <h5> <br><?php echo "OpticaSoft es desarrollado por SiacomTeK.";?><br> Sr. Emmanuel Aguirre.<br> <?php echo "Copyright: ".date('Y'); ?><br> <br>Contacto: <br>+54 (376) 488-6867. <br><br> <a href="./consultas/cambios_version">Cambios de versión.</a></h5>
    </center>
</section>

<script type="text/javascript">
    let infoVersion = document.getElementById('infoVersion');
    let infoBtn = document.getElementById('infoBtn');
    
    infoBtn.addEventListener("click", ()=>{
    infoVersion.classList.toggle("open");});
</script>