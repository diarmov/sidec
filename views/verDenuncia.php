<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: ../sessions/logout.php');
}
?>
<!doctype html>
<html lang="es">

<head>
    <title>SIDEC - Denuncias</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="verDenuncia.php">SIDEC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div></div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bitacoraDenuncia.php">Bitacora de denuncia</a>
                </li>
                <li class="nav-item">
                    <a id="btn-busqueda" class="nav-link" data-toggle="modal" data-target=".bd-example-modal-xl">Búsqueda Avanzada</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="denunciasDesechadas.php">Denuncias improcedentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AllDenuncias.php">Todas las denuncias</a>
                </li>
            </ul>
            <div class="form-inline mt-2 mt-md-0">
                <span class="text-white mr-4"><small class="text-muted">Usuario: </small><?= $_SESSION['username'] ?></span>
                <a id="btn_salir" href="../sessions/logout.php" class="btn btn-danger my-2 my-sm-0" type="button">Salir</a>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <div id="busqueda-jquery" class="container">
        <div class="d-flex align-items-center justify-content-center mt-5 pt-3">
            <div class="search input-group mb-2 col-xl-6">
                <input type="text" class="form-control" id="busqueda" placeholder="Ingresa un folio">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-search"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="mensajes" class="container" style="display: none;">
        <div class="d-flex align-items-center justify-content-center">
            <div class="alert alert-danger" role="alert">
                Los parámetros de búsqueda no arrojan resultados
            </div>
        </div>
    </div>
    <div id="buzones" class="m-3">
        <div class="row mt-3 mb-3">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 pb-5" style="overflow-y: scroll; -webkit-overflow-scrolling: touch; max-height: 45rem; min-height: 45rem;">
                <div class="card shadow mt-3 rounded">
                    <div class="card-body m-0 p-0">
                        <h1 class="p-0 m-0 bg-danger text-white text-center font-weight-light pt-3 pb-3 pl-1 rounded">Asuntos sin clasificar</h5>
                            <div class="list-group" id="denuncias_sin_clasificar">
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 pb-5" style="overflow-y: scroll; -webkit-overflow-scrolling: touch; max-height: 45rem; min-height: 45rem;">
                <div class="card shadow mt-3 rounded">
                    <div class="card-body m-0 p-0">
                        <h1 class="p-0 m-0 bg-success text-white text-center font-weight-light pt-3 pb-3 pl-1 rounded">Asuntos clasificados</h5>
                            <div class="list-group" id="denuncias_clasificadas">
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 pb-5" style="overflow-y: scroll; -webkit-overflow-scrolling: touch; max-height: 45rem; min-height: 45rem;">
                <div class="card shadow mt-3 rounded">
                    <div class="card-body m-0 p-0">
                        <h1 class="p-0 m-0 bg-warning text-white text-center font-weight-light pt-3 pb-3 pl-1 rounded">Asuntos rechazados</h5>
                            <div class="list-group" id="denuncias_rechazadas">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="busqueda-container" class="container" style="display: none;">
        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end pr-5 m-3 pt-5">
            <a id="downloadXLS" href="#" style="color:#074167;"><i class="far fa-file-excel fa-lg"></i> Exportar</a>
        </div>
        <div class="table-responsive-md mt-5" id="table">
        </div>
    </div>

    <!-- modal-busqueda -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Búsqueda avanzada</h5>
                </div>
                <div class="modal-body">
                    <div id="busqueda-form" class="p-3">
                        <div class="row">
                            <div class="col-xl-12">
                                <p>
                                    Búsqueda avanzada de denuncias clasificadas.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label for="combo-estatus" class="col-form-label">Estatus:</label>
                                    <select class="custom-select" name="" id="combo-estatus"></select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label for="combo-sistema" class="col-form-label">Sistema destino:</label>
                                    <select class="custom-select" name="" id="combo-sistema">
                                        <option value="0">--Selecciona--</option>
                                        <option value="1">SIRE</option>
                                        <option value="2">SAC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label for="combo-tipo-denuncia" class="col-form-label">Tipo de denuncia:</label>
                                    <select class="custom-select" name="" id="combo-tipo-denuncia"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fechaRecepcion" class="col-form-label">Fecha de captación:</label>
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Seleccionar..." id="rango_fechas" name="datefilter" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row d-flex align-items-center justify-content-center mt-1">
                        <span id="gif" style="display:none;"><img src='../assets/img/ajax-loader.gif' alt='no img'></span>
                    </div>
                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="buscar" class="btn btn-success btn-lg">Buscar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="../assets/js/jquery.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/jquery.table2excel.js"></script>

    <script>
        $(function() {
            $.ajax({
                url: '../controllers/denuncia/getDenuncias.php',
                type: 'GET',
                success: function(response) {
                    $("#denuncias_sin_clasificar").html(response);
                },
                error: function(response) {
                    alert("Problemas al tratar de obtener las denuncias sin clasificar");
                }
            });

            $.ajax({
                url: '../controllers/denuncia/getDenunciasClasificadas.php',
                type: 'GET',
                success: function(response) {
                    $("#denuncias_clasificadas").html(response);
                },
                error: function(response) {
                    alert("Problemas al tratar de obtener las denuncias clasificadas");
                }
            });

            $.ajax({
                url: '../controllers/denuncia/getDenunciasRechazadas.php',
                type: 'GET',
                success: function(response) {
                    $("#denuncias_rechazadas").html(response);
                },
                error: function(response) {
                    alert("Problemas al tratar de obtener las denuncias rechazadas");
                }
            });

            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar",
                    "fromLabel": "De",
                    "toLabel": "Hasta",
                    "customRangeLabel": "Personalizada",
                    "daysOfWeek": [
                        "Dom",
                        "Lun",
                        "Mar",
                        "Mie",
                        "Jue",
                        "Vie",
                        "Sáb"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ]
                },
                ranges: {
                    'Hoy': [moment(), moment()],
                    'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Ultimos 7 días': [moment().subtract(6, 'days'), moment()],
                    'Ultimos 30 días': [moment().subtract(29, 'days'), moment()],
                    'Este mes': [moment().startOf('month'), moment().endOf('month')],
                    'Ultimo mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/D') + ' - ' + picker.endDate.format('YYYY/MM/D'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });



            filter();
        });

        $('#btn-busqueda').on('click', function() {
            $.ajax({
                url: '../controllers/combos/comboCategoriaDenuncia.php',
                type: 'GET',
                success: function(response) {
                    $("#combo-tipo-denuncia").html(response);
                },
                error: function(response) {
                    alert("Problemas al tratar de obtener los tipos de denuncia");
                }
            });

            $.ajax({
                url: '../controllers/combos/comboEstatus.php',
                type: 'GET',
                success: function(response) {
                    $("#combo-estatus").html(response);
                },
                error: function(response) {
                    alert("Problemas al tratar de obtener los tipos de denuncia");
                }
            });
        });

        $("#downloadXLS").click(function() {
            $("#busqueda-table").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                exclude_links: false,
                exclude_inputs: false,
                filename: "Busqueda avanzada", //do not include extension
                fileext: ".xls" // file extension
            });
        });

        $('#buscar').on('click', function(e) {
            $("#buscar").prop('disabled', 'disabled');
            e.preventDefault();
            var fd = new FormData();

            fd.append('tipo_denuncia', $('#combo-tipo-denuncia option:selected').val());
            fd.append('sistema', $('#combo-sistema option:selected').val());
            fd.append('estatus', $('#combo-estatus option:selected').val());
            fd.append('fechaRecepcion', $("#rango_fechas").val());

            $.ajax({
                url: '../controllers/busqueda/busquedaController.php',
                type: 'POST',
                data: fd,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#gif').show();
                },
                success: function(response) {
                    $('.bd-example-modal-xl').modal('toggle');
                    $('#combo-sistema').prop('selectedIndex', 0);
                    $('#rango_fechas').val('');

                    if (response == 400) {
                        $('#buzones').show();
                        $('#busqueda-container').hide();
                        $('#busqueda-jquery').addClass('d-block');
                    } else if (response == 404) {
                        $('#buzones').show();
                        $('#busqueda-container').hide();
                        $('#busqueda-jquery').addClass('d-block');
                        $('#mensajes').show();
                    } else {
                        $('#mensajes').hide();
                        $('#busqueda-jquery').removeClass('d-block');
                        $('#busqueda-jquery').addClass('d-none');
                        $('#busqueda-container').show();
                        $('#buzones').hide();
                        $('#table').html(response);
                    }

                },
                complete: function() {
                    $('#gif').hide();
                    $("#buscar").prop('disabled', false);
                },
                error: function(response) {
                    $(".bd-example-modal-xl").modal('toggle');
                    $('#combo-sistema').prop('selectedIndex', 0);
                    $('#rango_fechas').val('');
                    $('#buzones').show();
                    $('#table').hide();
                    alert("Problemas al tratar de enviar el formulario");
                }
            });
        });

        function filter() {
            let busqueda = $('#busqueda');
            $(busqueda).keyup(function() {
                let titulo = $('.list-group .list-group-item .folio');
                $(titulo).each(function() {
                    let li = $(this);
                    $(busqueda).keyup(function() {
                        //cambiamos a minusculas
                        this.value = this.value.toLowerCase();
                        let clase = $('.search i');
                        if ($(busqueda).val() != '') {
                            $(clase).attr('class', 'fa fa-times');
                        } else {
                            $(clase).attr('class', 'fa fa-search');
                        }
                        if ($(clase).hasClass('fa fa-times')) {
                            $(clase).click(function() {
                                //borramos el contenido del input
                                $(busqueda).val('');
                                //mostramos todas las listas
                                $(li).parent().show();
                                //volvemos a añadir la clase para mostrar la lupa
                                $(clase).attr('class', 'fa fa-search');
                            });
                        }
                        //ocultamos toda la lista
                        $(li).parent().hide();
                        //valor del h3
                        let txt = $(this).val();
                        //si hay coincidencias en la búsqueda cambiando a minusculas
                        if ($(li).text().toLowerCase().indexOf(txt) > -1) {
                            //mostramos las listas que coincidan
                            $(li).parent().show();
                        }
                    });
                });
            });
        }
    </script>
</body>

</html>