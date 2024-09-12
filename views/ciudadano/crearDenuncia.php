<?php
if (!isset($_GET['cat_den'])) {
    header('Location: categoriaDenuncia.php');
} else {
    if (empty($_GET['cat_den']) || $_GET['cat_den'] < 1) {
        $categoria_denuncia = 0;
    } else {
        $categoria_denuncia = $_GET['cat_den'];
    }
}
?>
<!doctype html>
<html lang="es">

<head>
    <title>SIDEC - Denuncia</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/style.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
    <style>
        input[type=text] {
            text-transform: uppercase;
        }

        textarea,
        select {
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-area ">
            <div class="header-top_area" style="background-color: #b14948;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a class="text-white" href="#"> <i class="fa fa-envelope" style="color: #d37e77;"></i> Secretaría de la Función Pública del
                                            Estado de Zacatecas</a></li>
                                    <li><a class="text-white" href="#"> <i class="fa fa-phone" style="color: #d37e77;"></i> (492) 9256540</a></li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area shadow">
                <!--<div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 mr-5">
                            <div class="logo">
                                <a href="../../index.php">
                                    <img src="../../assets/img/zacatecas_logo.png" aria-label="logo" alt="" style="max-width: 20em;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-8">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="../../index.php">Página Principal</a></li>
                                        <li><a href="categoriaDenuncia.php">Realiza una denuncia</a></li>
                                        <li><a href="seguimiento.html">Seguimiento a tu denuncia</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>-->
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="../../index.php">
                                    <img src="../../assets/img/zacatecas_logo_veda.png" aria-label="logo" alt="" style="max-width: 17em; padding-right: 10px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-9">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="../../index.php">Página Principal</a></li>
                                        <li><a href="categoriaDenuncia.php">Denuncia Por Actos de Corrupción</a></li>
                                        <li><a href="seguimiento.html">Seguimiento A Tu Trámite</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br>
    <div class="container mt-5 mb-5 ">
        <form action="" id="form1" name="form1" enctype="multipart/form-data">
            <div class="row pb-5 pt-1">
                <div class="col-xl-12">
                    <?php
                    if ($categoria_denuncia >= 17 || $categoria_denuncia == 0) {
                        echo '<h4 class="display-4">Datos de la manifestación ciudadana</h4>';
                    } else {
                        echo '<h4 class="display-4">Datos de la denuncia</h4>';
                    }
                    ?>

                    <hr size="3">
                    <p class="text-justify">
                        Para que la autoridad investigadora pueda establecer la línea de investigación, es importante que la
                        denuncia contenga los datos o indicios mínimos,
                        para con ello determinar la existencia de la falta administrativa y la presunta responsabilidad del servidor público; por tanto,
                        la autoridad puede abstenerse de iniciar el procedimiento de investigación o en su caso,
                        concluir y archivar la misma en el momento procesal oportuno.
                    </p>
                </div>
                <div class="col-xl-12 mt-5">
                    <div class="row">

                        <?php
                        if (isset($_GET['idBuzon'])) {
                            $nombre_buzon = $_GET['name'];
                            $id_buzon = $_GET['idBuzon'];
                            echo '<div class="col-xl-6">';
                            if ($categoria_denuncia >= 17 || $categoria_denuncia == 0) {
                                echo '<label for="tipo_asunto">Tipo de manifestación ciudadana:</label><br>';
                            } else {
                                echo '<label for="tipo_asunto">Tipo de Denuncia:</label><br>';
                            }
                            echo '<select class="custom-select" id="tipo_asunto" name="tipo_denuncia">
                                    </select>
                                </div>';
                            echo '
                                <div class="col-xl-6">
                                    <label for="id_buzon">Buzón:</label><br>
                                    <select class="custom-select" id="id_buzon" name="id_buzon" disabled>
                                        <option value=' . $id_buzon . '>' . $nombre_buzon . '</option>
                                    </select>
                                    <!--<input type="text" class="form-control"  value="' . $nombre_buzon . '" disabled>-->
                                </div>';
                        } else {
                            echo '<div class="col-xl-12">';
                            if ($categoria_denuncia >= 17 || $categoria_denuncia == 0) {
                                echo '<label for="tipo_asunto">Tipo de manifestación ciudadana:</label><br>';
                            } else {
                                echo '<label for="tipo_asunto">Tipo de Denuncia:</label><br>';
                            }
                            echo '<select class="custom-select" id="tipo_asunto" name="tipo_denuncia">
                                    </select>
                                </div>';
                        }
                        ?>

                    </div>
                </div>
                <?php
                if ($categoria_denuncia != 19) {
                    echo '
                    <div id="oculto_peticion" class="col-xl-12 my-4 py-4 border border-dark rounded shadow">
                        <h5>Datos del servidor público a denunciar:</h5>
                        <div class="col-xl-12 mt-4">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="row m-auto d-flex justify-content-between">
                                        <label for="nombre_funcionario">Nombre del servidor público </label>
                                        <span class="custom-tooltip text-danger" data-toggle="tooltip" data-placement="top" data-html="true" title="<p class=' . "parrafos-tooltip" . '>Si su queja o denuncia es en contra de un servidor público, 
                                favor de indicar el nombre, si no lo sabe, escriba en el 
                                recuadro la palabra DESCONOCIDO y en la descripción del asunto, 
                                trate de describir a la persona</p>">?</span>
                                    </div>
                                    <input id="nombre_funcionario" name="nombre_funcionario" class="form-control" type="text">
                                </div>
                                <div class="col-xl-4">
                                    <div class="row m-auto d-flex justify-content-between">
                                        <label for="nombre_funcionario">Primer apellido del servidor público </label>
                                        <span class="custom-tooltip text-danger" data-toggle="tooltip" data-placement="top" data-html="true" title="<p class=' . "parrafos-tooltip" . '>Si su queja o denuncia es en contra de un servidor público, 
                                favor de indicar el primer apellido, si no lo sabe, escriba en el 
                                recuadro la palabra DESCONOCIDO y en la descripción del asunto, 
                                trate de describir a la persona</p>">?</span>
                                    </div>
                                    <input id="pa_funcionario" name="pa_funcionario" class="form-control" type="text">
                                </div>
                                <div class="col-xl-4">
                                    <div class="row m-auto d-flex justify-content-between">
                                        <label for="nombre_funcionario">Segundo apellido del servidor público </label>
                                        <span class="custom-tooltip text-danger" data-toggle="tooltip" data-placement="top" data-html="true" title="<p class=' . "parrafos-tooltip" . '>Si su queja o denuncia es en contra de un servidor público, 
                                    favor de indicar el segundo apellido, si no lo sabe, escriba en el 
                                recuadro la palabra DESCONOCIDO y en la descripción del asunto, 
                                trate de describir a la persona</p>">?</span>
                                    </div>
                                    <input id="sa_funcionario" name="sa_funcionario" class="form-control" type="text">
                                </div>
                                <div class="col-xl-12 mt-3">
                                    <div class="row m-auto d-flex justify-content-between">
                                        <label for="puesto_funcionario">Puesto del servidor público </label>
                                        <span class="custom-tooltip text-danger" data-toggle="tooltip" data-placement="top" data-html="true" title="<p class=' . "parrafos-tooltip" . '>Si conoce el cargo o el puesto en el cual 
                                            se desempeña el servidor público
                                            especifíquelo, si no trate de describir la actividades que desempeña</p>">?</span>
                                    </div>

                                    <input id="puesto_funcionario" name="puesto_funcionario" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mt-3">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row m-auto d-flex justify-content-between">
                                        <label for="dependencia_funcionario">Dependencia en la que labora el servidor público </label>
                                    </div>
                                    <input id="dependencia_funcionario" name="dependencialibre" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                    </div>';
                    if ($categoria_denuncia >= 17 || $categoria_denuncia == 0) {
                        echo
                        '
                        <div id="oculto_peticion_2" class="col-xl-12 mt-4">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>¿Su manifestación ciudadana está relacionado con algún programa de
                                        desarrollo social?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rel_prog_des_soc" id="sin_relacion_des_soc" value="0" checked>
                                        <label class="form-check-label" for="sin_relacion_des_soc">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rel_prog_des_soc" id="con_relacion_des_soc" value="1">
                                        <label class="form-check-label" for="con_relacion_des_soc">SI</label>
                                    </div>
                                </div>

                                <div id="d_programa_social" class="col-xl-6" style="visibility:hidden;">
                                    <div class="row m-auto d-flex justify-content-between">
                                        <label>¿A cuál programa de desarrollo social?</label>
                                        <span class="custom-tooltip text-danger" data-toggle="tooltip" data-placement="top" data-html="true" title="<p>Si conoce el cargo o el puesto en el cual 
                                                    se desempeña el Destinatario
                                                    especifícalo si no trata de describir la actividades que desempeña</p>">?</span>
                                    </div>
                                    <input id="programa_desarrollo_social" name="programalibre" class="form-control" type="text">
                                </div>
                                <div class="col-xl-6">
                                    <label>¿Es usted miembro del comité de contraloría
                                        social?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="miembro_contraloria_social" id="no_miembro_com" value="0" checked>
                                        <label class="form-check-label" for="no_miembro_com">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="miembro_contraloria_social" id="si_miembro_com" value="1">
                                        <label class="form-check-label" for="si_miembro_com">SI</label>
                                    </div>
                                </div>
                                <div id="comite" class="col-xl-6" style="visibility:hidden;">
                                    <div class="row m-auto d-flex justify-content-between">
                                        <label>Nombre del comité</label>
                                        <span class="custom-tooltip text-danger" data-toggle="tooltip" data-placement="top" data-html="true" title="<p>Si conoce el cargo o el puesto en el cual 
                                                    se desempeña el Destinatario
                                                    especifícalo si no trata de describir la actividades que desempeña</p>">?</span>
                                    </div>
                                    <input id="nombre_comite" name="nombre_comite" class="form-control" type="text">
                                </div>
                            </div>
                        </div>';
                    }
                    echo
                    '<div class="col-xl-12 mt-3">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row m-auto d-flex justify-content-between">
                                    <label for="fecha_hechos">Fecha de los hechos </label>
                                </div>
                                <input id="fecha_hechos" name="fecha_hechos" class="form-control" type="date">
                            </div>
                            <div class="col-xl-6">
                                <div class="row m-auto d-flex justify-content-between">
                                    <label for="hora_hechos">Si conoce la hora, indiquela </label>
                                </div>
                                <input id="hora_hechos" name="hora_hechos" class="form-control" type="time">
                            </div>
                        </div>
                    </div>';
                }
                ?>

                <div class="col-xl-12 mt-3">
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="row m-auto d-flex justify-content-between">
                                <?php if ($categoria_denuncia == 19) {
                                    echo '<label id="label_peticion" for="narracion_hechos">Escriba su petición</label>';
                                } else if ($categoria_denuncia == 20) {
                                    echo '<label id="label_vehiculo" for="narracion_hechos">Narración de los hechos<br>Incluir placas del vehículo. </label>';
                                } else {
                                    echo '<label id="label_general" for="narracion_hechos">Narración de los hechos </label>';
                                }
                                ?>
                            </div>
                            <textarea id="narracion_hechos" name="narracion_hechos" class="form-control" type="text" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 mt-5 pt-2">
                    <h4>Datos específicos</h4>
                    <hr>
                </div>
                <div class="col-xl-12">
                    <p>¿Cuenta con algún tipo de pruebas?</p>
                </div>

                <div class="col-xl-12 mt-4">
                    <div class="row">
                        <div class="col-xl-6">
                            <label>Documentos Físicos:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="doctos_fisicos" id="doc_fisico_no" value="0" checked>
                                <label class="form-check-label" for="doc_fisico_no">NO</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="doctos_fisicos" id="doc_fisico_si" value="1">
                                <label class="form-check-label" for="doc_fisico_si">SI</label>
                            </div>
                        </div>
                        <div id="leyenda_doc_fisicos" class="col-xl-12" style="display: none;">
                            <span class="badge badge-pill badge-warning">Escaneé sus documentos físicos para revisarlos electrónicamente.</span>
                        </div>
                        <div class="col-xl-12 pt-3">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>Archivos Electrónicos:</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="doctos_electronicos" id="doc_electronicos_no" value="0" checked>
                                        <label class="form-check-label" for="doc_electronicos_no">NO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="doctos_electronicos" id="doc_electronicos_si" value="1">
                                        <label class="form-check-label" for="doc_electronicos_si">SI</label>
                                    </div>
                                </div>
                                <div id="docs" class="col-xl-6" style="visibility:hidden;">
                                    <input type="file" id="doctos" name="doctos" multiple="multiple">
                                    <span class="badge badge-secondary mt-2 p-1">Puedes seleccionar 1 o más archivos, deben de ser menores a 8 MB.</span>
                                </div>
                                <div id="to_right_des_doctos" class="col-xl-6" style="display:none;"></div>
                                <div id="des_doctos" class="col-xl-6 mt-2" style="display:none;">
                                    <label>Descripción de los archivos electrónicos:</label><br>
                                    <textarea id="descripcion_archivos" name="descripcion_archivos" class="form-control" type="text" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-12 mt-3">
                    <div class="row">
                        <div class="col-xl-6">
                            <label>Testigos:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="testigos" id="testigos_no" value="0" checked>
                                <label class="form-check-label" for="testigos_no">NO</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="testigos" id="testigos_si" value="1">
                                <label class="form-check-label" for="testigos_si">SI</label>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row m-auto d-flex justify-content-between">
                                <label for="otras_pruebas">Otro tipo de prueba:</label>
                            </div>
                            <textarea id="otras_pruebas" name="otro_tipo_prueba" class="form-control" type="text" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 mt-5 pt-2">
                    <h4>Datos personales</h4>
                    <hr>
                </div>
                <div class="col-xl-12">
                    <p class="text-justify">Los datos personales recabados serán protegidos, incorporados y tratados en el Sistema de Denuncia Ciudadana por Actos de corrupción;
                        bajo responsabilidad de la Secretaría de la Función Pública del Estado de Zacatecas,
                        si desea realizar una denuncia anónima puede hacerlo, sin embargo,
                        brindarnos sus datos garantiza un mejor servicio, pues podemos establecer comunicación con usted para informarle el resultado.
                        <br>
                        <strong></strong>
                    </p>
                </div>
                <div class="col-xl-12 mt-3">
                    <div class="row">
                        <div id="pregunta_datos_personales" class="col-xl-4 mt-4">
                            <label for="datos_personales">¿Desea proporcionar sus datos personales?</label><br>
                            <select class="custom-select" id="datos_personales" name="datos_personales" class="">
                                <option value="0" selected>Seleecione una opción</option>
                                <option value="1">SI</option>
                                <option value="2">NO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="domicilio_escondido" class="col-xl-12 mt-3" style="display: none;">
                    <div class="row">
                        <div class="col-xl-12">
                            <?php
                            if ($categoria_denuncia <= 15) {
                                echo '<label for="domicilio_notificaciones">E-mail o número de teléfono para contactarlo y enviar notificaciones relacionadas con su denuncia.</label>';
                            } else {
                                echo '<label for="domicilio_notificaciones">E-mail o número de teléfono para contactarlo y enviar notificaciones relacionadas con su denuncia (No obligatorio).</label>';
                            }
                            ?>
                            <input id="domicilio_notificaciones" name="domicilio_notificaciones" class="form-control" type="text" style="text-transform: none !important;">
                        </div>
                    </div>
                </div>
                <div id="f_datos_personales" class="col-xl-12 p-0" style="display: none;">
                    <!-- div datos personales -->

                    <div class="col-xl-12 mt-3">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="row m-auto d-flex row-column">
                                    <label>Nombre(s):</label>
                                </div>
                                <input id="nombre_denunciante" name="nombre_denunciante" class="form-control" type="text">
                            </div>
                            <div class="col-xl-4">
                                <div class="row m-auto d-flex row-column">
                                    <label>Primer Apellido:</label>
                                </div>
                                <input id="pa_denunciante" name="pa_denunciante" class="form-control" type="text">
                            </div>
                            <div class="col-xl-4">
                                <div class="row m-auto d-flex row-column">
                                    <label>Segundo Apellido:</label>
                                </div>
                                <input id="sa_denunciante" name="sa_denunciante" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-xl-12 mt-3">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row m-auto d-flex row-column">
                                    <label>CURP:</label>
                                </div>
                                <input id="curp_denunciante" name="curp_denunciante" class="form-control" type="text">
                            </div>
                            <div class="col-xl-6">
                                <div class="row m-auto d-flex row-column">
                                    <label>RFC:</label>
                                </div>
                                <input id="rfc_denunciante" name="rfc_denunciante" class="form-control" type="text">
                            </div>
                        </div>
                    </div>-->

                    <div class="col-xl-12 mt-3">
                        <div class="row">
                            <div class="col-xl-3">
                                <label for="">Estado:</label><br>
                                <select class="custom-select" id="estados" name="id_estado" class="">
                                </select>
                            </div>
                            <div class="col-xl-4">
                                <label for="">Municipio:</label><br>
                                <select class="custom-select" id="municipios" name="id_municipio" class="">
                                    <option>Seleccione una opción</option>
                                </select>
                            </div>
                            <div class="col-xl-5">
                                <label>Localidad:</label>
                                <input id="localidad" name="localidad" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 mt-3">
                        <div class="row">
                            <div class="col-xl-4">
                                <label>Colonia:</label>
                                <input id="colonia" name="colonia_denunciante" class="form-control" type="text">
                            </div>
                            <div class="col-xl-4">
                                <label>Calle:</label>
                                <input id="calle" name="calle_denunciante" class="form-control" type="text">
                            </div>
                            <div class="col-xl-1">
                                <label>Núm Ext:</label>
                                <input id="num_exterior" name="num_ext_denunciante" class="form-control" type="text">
                            </div>
                            <div class="col-xl-1">
                                <label>Núm Int:</label>
                                <input id="num_interior" name="num_int_denunciante" class="form-control" type="text">
                            </div>
                            <div class="col-xl-2">
                                <label>CP:</label>
                                <input id="codigo_postal" name="cp_denunciante" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 mt-3">
                        <div class="row">
                            <div class="col-xl-8">
                                <label>Email:</label>
                                <input id="email" name="email_denunciante" class="form-control" type="email">
                            </div>
                            <div class="col-xl-4">
                                <label>Telefono:</label>
                                <input id="telefono" name="telefono_denunciante" class="form-control" type="text">
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12 mt-3">
                        <div class="row">
                            <div class="col-xl-12">
                                <p class="text-center">
                                    La siguiente información será utilizada con fines estadísticos, te pedimos nos ayudes
                                    respondiendo el siguiente cuestionario:
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 mt-3">
                        <div class="row">
                            <div class="col-xl-6">
                                <label for="">Grados de estudios:</label><br>
                                <select class="custom-select" id="grado_estudios" name="grado_estudios_denunciante" class="">
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <label>Ocupación:</label>
                                <input id="ocupacion" name="ocupacion" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 mt-3">
                        <div class="row">
                            <div class="col-xl-6">
                                <label for="">Sexo</label><br>
                                <select class="custom-select" id="sexo" name="id_sexo" class="">
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <label>Edad:</label>
                                <input id="edad" name="edad" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <!--div datos personales -->
            </div>
            <div class="row text-center d-flex justify-content-end py-4 px-3">
                <span id="gif_loader" style="display:none;"><img src='../../assets/img/ajax-loader.gif' alt='no img'></span>
                <button id="btn_enviar" name="btn_enviar" type="button" class="btn btn-success px-5">Enviar
                    denuncia</button>
            </div>
        </form>
        <div id="alerta_danger" class="alert alert-danger mt-5 pt-5 alert-dismissible fade show" role="alert" style="display: none;">
        </div>
    </div>
    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="../../assets/img/zacatecas_escudo_veda.png" aria-label="logo" alt="" style="max-width: 12em;">
                                </a>
                            </div>
                            <p>
                                Sistema de denuncia ciudadana
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a rel="noreferrer" href="https://www.facebook.com/funcionpublica.zac/" target="_blank">
                                            <i class="fab fa-facebook-f" aria-label="facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="noreferrer" href="https://twitter.com/SFP_Zac" target="_blank">
                                            <i class="fab fa-twitter" aria-label="twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Relacionados
                            </h3>
                            <ul>
                                <li><a rel="noreferrer" href="http://funcionpublica.zacatecas.gob.mx/" target="_blank">Secretaría de la Función Pública</a></li>
                                <li><a rel="noreferrer" href="https://sidec.zacatecas.gob.mx/avisos/AVISO DE PRIVACIDAD INTEGRAL SIDEC.docx" target="_blank">Aviso de privacidad integral</a></li>
                                <li><a rel="noreferrer" href="https://sidec.zacatecas.gob.mx/avisos/AVISO DE PRIVACIDAD SIMPLIFICADO.SIDEC.docx" target="_blank">Aviso de privacidad simplificado</a></li>
                                <!--<li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>-->
                            </ul>

                        </div>
                    </div>
                    <!--<div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Titulo II
                            </h3>
                            <ul>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                            </ul>
                        </div>
                    </div>-->
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Dirección
                            </h3>
                            <!--<p>
                                Circuito Cerro del Gato #1900, Edificio D,
                                Ciudad Administrativa,
                                Zacatecas, Zacatecas.<br> <br>
                                +52 492 869 2161 <br>
                                test@test.com
                            </p>-->
                            <p>
                                Circuito Cerro del Gato #1900, Edificio D,
                                Ciudad Administrativa,
                                Zacatecas, Zacatecas.<br> <br>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end  -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.slicknav.min.js"></script>
    <script src="../../assets/js/navigation.min.js"></script>
    <script>
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll < 250) {
                $("#sticky-header").removeClass("sticky");
                $('#back-top').fadeIn(500);
            } else {
                $("#sticky-header").addClass("sticky");
                $('#back-top').fadeIn(500);
            }
        });
        $(function() {
            $('.alert').alert();
            $('[data-toggle="tooltip"]').tooltip();

            let idCatDen = <?= $categoria_denuncia ?>;
            if (idCatDen == '') idCatDen = 0;

            $.ajax({
                data: {
                    id: idCatDen
                },
                url: '../../controllers/combos/comboAsunto.php',
                type: 'POST',
                success: function(response) {
                    $("#tipo_asunto").html(response);
                },
                error: function(response) {
                    alert("Problemas al tratar de enviar el formulario");
                }
            });

            $.ajax({
                url: '../../controllers/combos/comboEstados.php',
                type: 'GET',
                success: function(response) {
                    $("#estados").html(response);
                },
                error: function(response) {
                    alert("Problemas al tratar de enviar el formulario");
                }
            });

            $('#estados').on("change", function() {
                let id = $('#estados').find(":selected").val();
                $.ajax({
                    type: 'POST',
                    data: {
                        id: id
                    },
                    url: '../../controllers/combos/comboMunicipios.php',
                    success: function(response) {
                        $("#municipios").html(response);
                    },
                    error: function(response) {
                        alert("Problemas al recibir la respuesta");
                    }
                });
            });

            $.ajax({
                url: '../../controllers/combos/comboGradosEducacion.php',
                type: 'GET',
                success: function(response) {
                    $("#grado_estudios").html(response);
                },
                error: function(response) {
                    alert("Problemas al tratar de enviar el formulario");
                }
            });

            $.ajax({
                url: '../../controllers/combos/comboSexo.php',
                type: 'GET',
                success: function(response) {
                    $("#sexo").html(response);
                },
                error: function(response) {
                    alert("Problemas al tratar de enviar el formulario");
                }
            });

            if (idCatDen == 19) {
                $('#f_datos_personales').css('display', 'block');
                $('#pregunta_datos_personales').hide();
            }


        });

        $('#tipo_asunto').on('change', function() {
            if ($('#tipo_asunto').val() == 19) {
                $('#oculto_peticion').css('display', 'none');
                $('#oculto_peticion_2').css('display', 'none');
                $('#f_datos_personales').css('display', 'block');
                $('#pregunta_datos_personales').hide();
                $("#label_general").html("Escriba su petición");
            } else if ($('#tipo_asunto').val() == 20) {
                $("#label_general").html("Narración de los hechos (Incluya la matrícula del vehículo)");
            } else {
                $('#oculto_peticion').css('display', 'block');
                $('#oculto_peticion_2').css('display', 'block');
                $('#f_datos_personales').css('display', 'none');
                $('#pregunta_datos_personales').show();
            }
        });

        $("input[name='doctos_fisicos']").on("change", function(e) {
            $('#leyenda_doc_fisicos').css('display', ($(this).val() === '1') ? 'block' : 'none');
        });

        $("input[name='doctos_electronicos']").on("change", function(e) {
            $('#docs').css('visibility', ($(this).val() === '1') ? 'initial' : 'hidden');
        });

        $("input[name='doctos_electronicos']").on("change", function(e) {
            $('#des_doctos').css('display', ($(this).val() === '1') ? 'block' : 'none');
        });


        $("input[name='doctos_electronicos']").on("change", function(e) {
            $('#to_right_des_doctos').css('display', ($(this).val() === '1') ? 'block' : 'none');
        });

        $("#datos_personales").on("change", function(e) {
            $('#domicilio_escondido').css('display', ($(this).val() === '2') ? 'block' : 'none');
        });
        $("#datos_personales").on("change", function(e) {
            $('#f_datos_personales').css('display', ($(this).val() === '1') ? 'block' : 'none');
        });

        $("input[name='miembro_contraloria_social']").on("change", function(e) {
            $('#comite').css('visibility', ($(this).val() === '1') ? 'initial' : 'hidden');
        });

        $("input[name='rel_prog_des_soc']").on("change", function(e) {
            $('#d_programa_social').css('visibility', ($(this).val() === '1') ? 'initial' : 'hidden');
        });

        $("#btn_enviar").on("click", function(e) {
            $('#alerta_danger').hide();
            $("#btn_enviar").prop('disabled', 'disabled');
            //e.preventDefault();

            if ($("#tipo_asunto").val() == '') {
                $("#btn_enviar").prop('disabled', false);
                $("#tipo_asunto").css("border", "2px solid red");
                $('#alerta_danger').html('<p>El <strong>Tipo de Denuncia</strong> no puede estar vacío.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                $('#alerta_danger').show();
                return;
            } else {
                $("#tipo_asunto").css("border", "");
            }


            if ($("#narracion_hechos").val() == '') {
                $("#btn_enviar").prop('disabled', false);
                $("#narracion_hechos").css("border", "2px solid red");
                $('#alerta_danger').html('<p>El campo <strong>narración de los hechos</strong> no puede estar vacío.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                $('#alerta_danger').show();
                return;
            } else {
                $("#narracion_hechos").css("border", "");
            }

            if ($("#domicilio_notificaciones").val() == '' && $("#tipo_asunto").val() <= 15 && $('#datos_personales').val() == 2) {
                $("#btn_enviar").prop('disabled', false);
                $("#domicilio_notificaciones").css("border", "2px solid red");
                $('#alerta_danger').html('<p>El campo <strong>E-mail o número de contacto</strong> no puede estar vacío.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                $('#alerta_danger').show();
                return;
            } else {
                $("#domicilio_notificaciones").css("border", "");
            }

            if ($("#email").val() != '') {
                if (validateEmail($("#email").val()) != true) {
                    $("#btn_enviar").prop('disabled', false);
                    $("#email").css("border", "2px solid red");
                    $('#alerta_danger').html('<p>El EMAIL ingresado es incorrecto.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                    $('#alerta_danger').show();
                    return;
                }
            } else {
                $("#email").css("border", "");
            }

            /*if ($("#rfc_denunciante").val() != '') {
                if (validarRFC($("#rfc_denunciante").val()) != true) {
                    $("#btn_enviar").prop('disabled', false);
                    $('#alerta_danger').html('<p>El RFC ingresado es incorrecto.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                    $('#alerta_danger').show();
                    return;
                }
            }

            if ($("#curp_denunciante").val() != '') {
                if (validarCURP($("#curp_denunciante").val()) != true) {
                    $("#btn_enviar").prop('disabled', false);
                    $('#alerta_danger').html('<p>La CURP ingresada es incorrecta.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                    $('#alerta_danger').show();
                    return;
                }
            }*/
            const doctos = document.getElementById('doctos');
            let totalSize = 0;
            for (var i = 0; i < doctos.files.length; i++) {
                let fileSize = doctos.files[i].size / 1024 / 1024;
                totalSize += fileSize;
                if (fileSize > 8) {
                    $("#btn_enviar").prop('disabled', false);
                    $('#alerta_danger').html('<p>Los archivos deben ser menores a 8 mb.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                    $('#alerta_danger').show();
                    return;
                }

                if (totalSize > 80) {
                    $("#btn_enviar").prop('disabled', false);
                    $('#alerta_danger').html('<p>El total de archivos que quieres adjuntar a tu denuncia excede el límite permitido de 80 Mb.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                    $('#alerta_danger').show();
                    return;
                }
            }

            var formData = new FormData();
            let archivo;
            $("#form1").find(':input:not(:checkbox, :radio)').each(function() {
                var element = this;
                if (element.type == "file") {
                    archivo = element.files;
                    if (archivo.length >= 1) {
                        for (i = 0; i < archivo.length; i++) {
                            formData.append('archivo' + i, archivo[i]);
                        }
                    }
                }

                if (element.value != '' && element.value != 'Seleccione una opción') {
                    formData.append(element.name, element.value);
                }
            });

            $('#form1').find(':checkbox:checked, :radio:checked').each(function() {
                if (this.name == 'doctos_electronicos' && $(this).val() == 1 && archivo.length == 0) {
                    formData.append(this.name, 0);
                } else {
                    formData.append(this.name, $(this).val());
                }

            });

            $("#form1").find('textarea').each(function() {
                var element = this;
                if (element.value != '') {
                    formData.append(element.name, element.value);
                }
            });

            $.ajax({
                url: '../../controllers/denuncia/crearDenuncia.php',
                type: 'POST',
                data: formData,
                dataType: "json", //como viene la respuesta
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#gif_loader').show();
                },
                success: function(response) {
                    if (response.response == 1) {
                        $("#btn_enviar").prop('disabled', false);
                        $("#form1")[0].reset();
                        $("#municipios").html('<option>Seleccione una opción</option>');
                        window.location.href = "acuse.php?folio=" + response.folio + "&fecha=" + response.fechaRecepcion;
                    } else {
                        $("#btn_enviar").prop('disabled', false);
                        $('#alerta_danger').html('<p>Lo sentimos, no se ha podido guardar la denuncia, intenta nuevamente.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                        $('#alerta_danger').show();
                    }
                },
                complete: function() {
                    $('#gif_loader').hide();
                },
                error: function(response) {
                    $("#btn_enviar").prop('disabled', false);
                    alert("Problemas al tratar de enviar el formulario");
                }
            });
        });

        //Función para validar un RFC
        // Devuelve el RFC sin espacios ni guiones si es correcto
        // Devuelve false si es inválido
        // (debe estar en mayúsculas, guiones y espacios intermedios opcionales)
        function rfcValido(rfc, aceptarGenerico = true) {
            const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
            var validado = rfc.match(re);

            if (!validado) //Coincide con el formato general del regex?
                return false;

            //Separar el dígito verificador del resto del RFC
            const digitoVerificador = validado.pop(),
                rfcSinDigito = validado.slice(1).join(''),
                len = rfcSinDigito.length,

                //Obtener el digito esperado
                diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
                indice = len + 1;
            var suma,
                digitoEsperado;

            if (len == 12) suma = 0
            else suma = 481; //Ajuste para persona moral

            for (var i = 0; i < len; i++)
                suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
            digitoEsperado = 11 - suma % 11;
            if (digitoEsperado == 11) digitoEsperado = 0;
            else if (digitoEsperado == 10) digitoEsperado = "A";

            //El dígito verificador coincide con el esperado?
            // o es un RFC Genérico (ventas a público general)?
            if ((digitoVerificador != digitoEsperado) &&
                (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
                return false;
            else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
                return false;
            return rfcSinDigito + digitoVerificador;
        }


        //Handler para el evento cuando cambia el input
        // -Lleva la RFC a mayúsculas para validarlo
        // -Elimina los espacios que pueda tener antes o después
        function validarRFC(input) {
            var rfc = input.trim().toUpperCase();

            var rfcCorrecto = rfcValido(rfc); // ⬅️ Acá se comprueba

            if (rfcCorrecto) {
                return true;
            } else {
                return false;
            }
        }

        //Función para validar una CURP
        function curpValida(curp) {
            var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
                validado = curp.match(re);

            if (!validado) //Coincide con el formato general?
                return false;

            //Validar que coincida el dígito verificador
            function digitoVerificador(curp17) {
                //Fuente https://consultas.curp.gob.mx/CurpSP/
                var diccionario = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
                    lngSuma = 0.0,
                    lngDigito = 0.0;
                for (var i = 0; i < 17; i++)
                    lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
                lngDigito = 10 - lngSuma % 10;
                if (lngDigito == 10) return 0;
                return lngDigito;
            }

            if (validado[2] != digitoVerificador(validado[1]))
                return false;

            return true; //Validado
        }


        //Handler para el evento cuando cambia el input
        //Lleva la CURP a mayúsculas para validarlo
        function validarCURP(input) {
            var curp = input.trim().toUpperCase();

            if (curpValida(curp)) { // ⬅️ Acá se comprueba
                return true;
            } else {
                return false;
            }
        }

        function validateEmail(input) {
            var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (input.match(mailformat)) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>