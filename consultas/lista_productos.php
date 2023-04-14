<script src="./consultas/js/jquery.min.js"></script> <!-- Importante para la busqueda -->
<div class="center mt-5">
    <div class="card pt-3">
        <div class="container-fluid  p-4">
            <div class=" col-12 mt-2">
                <div class="table-responsive">
                    <div class="mb-3">
                        <input onkeyup="buscar_ahora($('#buscar_1').val());" type="text" class="form-control" id="buscar_1" name="buscar_1" placeholder="BUSCAR">
                    </div>
                    <div class="card col-12 mt-5">
                        <div class="card-body">
                            <div id="datos_buscador" class="container pl-5 pr-5" style="border: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function buscar_ahora(buscar) {
        var parametros = {
            "buscar": buscar
        };
        $.ajax({
            data: parametros,
            type: 'POST',
            url: './consultas/buscador.php',
            success: function(data) {
                document.getElementById("datos_buscador").innerHTML = data;
            }
        });
    }
</script>