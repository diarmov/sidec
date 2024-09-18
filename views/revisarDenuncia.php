<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: ../sessions/logout.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        input[type=text],
        textarea,
        select {
            text-transform: uppercase;
        }
    </style>
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
                    <a class="nav-link" href="bitacoraDenuncia.php">Bitacora de Denuncia</a>
                </li>
            </ul>
            <div id="" class="form-inline mt-2 mt-md-0">
                <span class="text-white mr-2"><?= $_SESSION['username'] ?></span>
                <a id="btn_salir" href="../sessions/logout.php" class="btn btn-outline-danger my-2 my-sm-0" type="button">Salir</a>
            </div>
        </div>
    </nav>
    <br>
    <div class="container shadow rounded my-5 py-3">
        <?php
        include('../db/db.php');
        $link = connect();
        $disabled = '';
        if (isset($_GET['ob']) && isset($_GET['id']) && !empty($_GET['ob']) && !empty($_GET['id']) && $_GET['ob'] == true) {
            $id = trim($_GET['id']);
            $id = $link->real_escape_string($id);

            $q_clasificacion = "SELECT clasificacion_denuncia.fecha_clasificacion,cat_estatus.estatus, clasificacion_denuncia.justificacion, usuarios.nombre as nombreUsuario, usuarios.puesto, cat_opciones_sistemas.nombre as sistema
                FROM clasificacion_denuncia
                INNER JOIN denuncia ON clasificacion_denuncia.id_denuncia = denuncia.id_denuncia
                INNER JOIN usuarios ON clasificacion_denuncia.id_usuario = usuarios.id_usuario
                INNER JOIN cat_opciones_sistemas ON clasificacion_denuncia.clasificacion = cat_opciones_sistemas.id
                INNER JOIN cat_estatus ON denuncia.estatus = cat_estatus.id
                WHERE clasificacion_denuncia.id_denuncia =" . $id . ' ORDER BY  id_clasificacion_denuncia DESC LIMIT 1';

            if (!$rs = $link->query($q_clasificacion)) {
                echo $link->error . "<br>";
                exit;
            } else {
                if ($rs->num_rows == 1) {
                    $disabled = 'disabled';
                    $clasificacion = $rs->fetch_assoc();
                    echo '
                    <div class="row pb-5 pt-1 rounded bg-warning">
                        <div class="col-xl-12">
                            <h4>Justificación de la clasificación</h4>
                            <hr>
                        </div>
                        <div class="col-xl-6 mt-3">
                            <div class="row m-auto d-flex justify-content-between">
                                <label>Justificación: </label>
                            </div>
                            <textarea id="narracion_hechos" name="narracion_hechos" class="form-control" type="text" rows="3" disabled>' . $clasificacion['justificacion'] . '</textarea>
                        </div>
                        <div class="col-xl-6 mt-3 pt-4">
                            <div class="d-flex flex-column">
                                <small class="text-muted">Fecha de clasificacion: <strong>' . $clasificacion['fecha_clasificacion'] . '</strong></small>
                                <small class="text-muted pt-1">Usuario que clasificó: <strong>' . $clasificacion['nombreUsuario'] . '</strong></small>
                                <small class="text-muted pt-1">Puesto que desempeña: <strong>' . $clasificacion['puesto'] . '</strong></small>
                                <small class="text-muted pt-1">Sistema destino: <strong>' . $clasificacion['sistema'] . '</strong></small>
                                <small class="text-muted pt-1">Estatus: <strong class="bg-success rounded text-white p-1">' . $clasificacion['estatus'] . '</strong></small>
                            </div>
                        </div>
                    </div>';
                }
            }
        }
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = trim($_GET['id']);
            $id = $link->real_escape_string($id);

            $query = "SELECT
            denuncia.folio,
            denuncia.tipo_denuncia as ID_tipo,
            cat_tipo_denuncia.tipo_denuncia,
            denuncia.fechaRecepcion,
            denuncia.nombre_funcionario,
            denuncia.pa_funcionario,
            denuncia.sa_funcionario,
            denuncia.puesto_funcionario,
            denuncia.rel_prog_des_soc,
            denuncia.programalibre,
            denuncia.miembro_contraloria_social,
            denuncia.dependencialibre,
            denuncia.narracion_hechos,
            denuncia.doctos_fisicos,
            denuncia.doctos_electronicos,
            denuncia.testigos,
            denuncia.otro_tipo_prueba,
            denuncia.domicilio_notificaciones,
            denuncia.datos_personales,
            denuncia.nombre_denunciante,
            denuncia.pa_denunciante,
            denuncia.sa_denunciante,
            curp_denunciante,
            rfc_denunciante,
            cat_estados.nombre as estado,
            cat_municipios.nombre as municipio,
            denuncia.localidad,
            denuncia.colonia_denunciante,
            denuncia.calle_denunciante,
            denuncia.num_ext_denunciante,
            denuncia.num_int_denunciante,
            denuncia.cp_denunciante,
            denuncia.telefono_denunciante,
            denuncia.email_denunciante,
            cat_grado_estudios.grado,
            denuncia.ocupacion,
            cat_sexo.sexo,
            denuncia.edad,
            denuncia.nombre_comite,
            denuncia.colonia_denunciante,
            denuncia.calle_denunciante,
            denuncia.num_ext_denunciante,
            denuncia.num_int_denunciante,
            denuncia.cp_denunciante,
            denuncia.descripcion_archivos,
            denuncia.fecha_hechos,
            denuncia.hora_hechos,
            denuncia.id_buzon,
            denuncia.justificacion_rechazo
            FROM
            denuncia
            LEFT JOIN cat_tipo_denuncia ON denuncia.tipo_denuncia = cat_tipo_denuncia.id_cat_tipo_denuncia
            LEFT JOIN cat_estados ON denuncia.id_estado = cat_estados.id
            LEFT JOIN cat_municipios ON denuncia.id_municipio = cat_municipios.id
            LEFT JOIN cat_grado_estudios ON denuncia.grado_estudios_denunciante = cat_grado_estudios.id_grado_educacion
            LEFT JOIN cat_sexo ON denuncia.id_sexo = cat_sexo.id_sexo 
            WHERE id_denuncia = " . $id;

            if (!$resultado = $link->query($query)) {
                echo $link->error . "<br>";
                exit;
            } else {
                $folioDenuncia = null;
                if ($resultado->num_rows == 1) {
                    while ($denuncia = $resultado->fetch_assoc()) {
                        if ($denuncia['justificacion_rechazo'] != '') {
                            echo '
                            <div class="row pb-5 rounded bg-danger text-white shadow">
                                <div class="col-xl-12">
                                    <h4>Justificación del rechazo</h4>
                                    <hr>
                                </div>
                                <div class="col-xl-12 mt-3">
                                    <div class="row m-auto d-flex justify-content-between">
                                        <label for="justificacion_rechazo">Justificación: </label>
                                    </div>
                                    <textarea id="justificacion_rechazo" name="justificacion_rechazo" class="form-control" type="text" rows="3" disabled>' . utf8_encode($denuncia['justificacion_rechazo']) . '</textarea>
                                </div>
                            </div>';
                        }
                        $folioDenuncia = $denuncia['folio'];
                        echo
                        '<div class="row mt-5 pb-5 pt-1">
                            <div class="col-xl-12">';
                        if ($denuncia['ID_tipo'] >= 17 || $denuncia['ID_tipo'] == 0) {
                            echo '<h4>Datos de la manifestación ciudadana</h4>';
                        } else {
                            echo '<h4>Datos de la denuncia</h4>';
                        }
                        echo '<hr>
                            </div>';
                        if (isset($denuncia['id_buzon']) && !empty($denuncia['id_buzon'])) {
                            $getNombre = mysqli_query($link, "SELECT nombre FROM posicionbuzones2 WHERE id = " . $denuncia['id_buzon']);

                            $rowNombre = mysqli_fetch_array($getNombre);

                            echo '
                                <div class="col-xl-12 mt-3">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label>Buzón:</label>
                                        </div>
                                        <input id="buzon" name="buzon" class="form-control" type="text" placeholder="' . $rowNombre['nombre'] . '" disabled>
                                    </div>
                                </div>
                                </div>';
                        }
                        echo '<div class="col-xl-12 mt-2">
                                <div class="row">
                                    <div class="col-xl-4">';
                        if ($denuncia['ID_tipo'] >= 17 || $denuncia['ID_tipo'] == 0) {
                            echo '<label for="tipo_asunto">Tipo de manifestación ciudadana:</label><br>';
                        } else {
                            echo '<label for="tipo_asunto">Tipo de denuncia:</label><br>';
                        }

                        echo '<select class="custom-select" id="tipo_asunto" name="tipo_asunto" class="" disabled>
                                            <option>' . $denuncia['tipo_denuncia'] . '</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label>Folio:</label>
                                        </div>
                                        <input id="folio" name="folio" class="form-control" type="text" placeholder="' . $denuncia['folio'] . '" disabled>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label>Fecha de Recepción:</label>
                                        </div>
                                        <input id="fechaRecepcion" name="fechaRecepcion" class="form-control" type="text" placeholder="' . $denuncia['fechaRecepcion'] . '" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-2">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label>Nombre del funcionario </label>
                                        </div>
                                        <input id="nombre_funcionario" name="nombre_funcionario" class="form-control" type="text" placeholder="' . $denuncia['nombre_funcionario'] . '" disabled>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label>Primer apellido del funcionario </label>
                                        </div>
                                        <input id="pa_funcionario" name="pa_funcionario" class="form-control" type="text" placeholder="' . $denuncia['pa_funcionario'] . '" disabled>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label>Segundo apellido del funcionario </label>
                                        </div>
                                        <input id="sa_funcionario" name="sa_funcionario" class="form-control" type="text" placeholder="' . $denuncia['sa_funcionario'] . '" disabled>
                                    </div>
                                    <div class="col-xl-12 mt-2">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label>Puesto del funcionario </label>
                                        </div>

                                        <input id="puesto_funcionario" name="puesto_funcionario" class="form-control" type="text" placeholder="' . $denuncia['puesto_funcionario'] . '" disabled>
                                    </div>
                                </div>
                            </div>';

                        if ($denuncia['ID_tipo'] >= 17) {
                            echo
                            '<div class="col-xl-12 mt-4">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>¿Su asunto está relacionado con algún programa de
                                                desarrollo social?</label><br>';
                            if ($denuncia['rel_prog_des_soc'] == 1) {
                                echo
                                '<div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="programa_social" id="sin_relacion_des_soc" value="0" disabled>
                                                    <label class="form-check-label" for="sin_relacion_des_soc">NO</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="programa_social" id="con_relacion_des_soc" value="1" checked disabled>
                                                    <label class="form-check-label" for="con_relacion_des_soc">SI</label>
                                                </div>
                                                ';
                            } else {
                                echo
                                '<div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="programa_social" id="sin_relacion_des_soc" value="0" checked disabled>
                                                    <label class="form-check-label" for="sin_relacion_des_soc">NO</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="programa_social" id="con_relacion_des_soc" value="1" disabled>
                                                    <label class="form-check-label" for="con_relacion_des_soc">SI</label>
                                                </div>
                                                ';
                            }
                            echo '</div>';
                            if ($denuncia['rel_prog_des_soc'] == 1) {
                                echo
                                '<div id="d_programa_social" class="col-xl-6">
                                                <div class="row m-auto d-flex justify-content-between">
                                                    <label>¿A cuál programa de desarrollo social?</label>
                                                </div>
                                                <input id="programa_desarrollo_social" name="programalibre" class="form-control" type="text" placeholder="' . $denuncia['programalibre'] . '" disabled>
                                            </div>';
                            }

                            echo '<div class="col-xl-6">
                                            <label>¿Es usted miembro del comité de contraloría
                                                social?</label><br>';
                            if ($denuncia['miembro_contraloria_social'] == 1) {
                                echo
                                '<div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="miembro_comite" id="no_miembro_com" value="0" disabled>
                                                    <label class="form-check-label" for="no_miembro_com">NO</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="miembro_comite" id="si_miembro_com" value="1" checked disabled>
                                                    <label class="form-check-label" for="si_miembro_com">SI</label>
                                                </div>';
                            } else {
                                echo
                                '<div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="miembro_comite" id="no_miembro_com" value="0" checked disabled>
                                                    <label class="form-check-label" for="no_miembro_com">NO</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="miembro_comite" id="si_miembro_com" value="1" disabled>
                                                    <label class="form-check-label" for="si_miembro_com">SI</label>
                                                </div>';
                            }
                            echo '</div>';
                            if ($denuncia['miembro_contraloria_social'] == 1) {
                                echo '<div id="comite" class="col-xl-6">
                                            <div class="row m-auto d-flex justify-content-between">
                                                <label>Nombre del comité</label>
                                                </div>
                                            <input id="nombre_comite" name="nombre_comite" class="form-control" type="text" placeholder="' . $denuncia['nombre_comite'] . '" disabled>
                                        </div>';
                            }
                            echo '</div>
                                </div>
                                ';
                        }

                        echo '
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label>Dependencia </label>
                                        </div>
                                        <input id="dependencia_funcionario" name="dependencia_funcionario" class="form-control" type="text" placeholder="' . $denuncia['dependencialibre'] . '" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-2">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label for="fecha_hechos">Fecha de los hechos </label>
                                        </div>
                                        <input id="fecha_hechos" name="fecha_hechos" class="form-control" placeholder="' . $denuncia['fecha_hechos'] . '" disabled>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label for="hora_hechos">Hora aproximada en la que ocurrieron los hechos </label>
                                        </div>
                                        <input id="hora_hechos" name="hora_hechos" class="form-control" placeholder="' . $denuncia['hora_hechos'] . '" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-3">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label>Narración de los hechos </label>
                                        </div>
                                        <textarea id="narracion_hechos" name="narracion_hechos" class="form-control" type="text" rows="5" disabled>' . $denuncia['narracion_hechos'] . '</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-5 pt-2">
                                <h4>Datos específicos</h4>
                                <hr>
                            </div>
                            <div class="col-xl-12">
                                <p>¿Cuentas con algún tipo de pruebas?</p>
                            </div>

                            <div class="col-xl-12 mt-4">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label>Documentos Físicos:</label> ';
                        if ($denuncia['doctos_fisicos'] == 1) {
                            echo
                            '<br><div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="doc_fisicos" id="doc_fisico_no" value="0" disabled>
                                                <label class="form-check-label" for="doc_fisico_no">NO</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="doc_fisicos" id="doc_fisico_si" value="1" checked disabled>
                                                <label class="form-check-label" for="doc_fisico_si">SI</label>
                                            </div>';
                        } else {
                            echo
                            '<br><div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="doc_fisicos" id="doc_fisico_no" value="0" checked disabled>
                                                <label class="form-check-label" for="doc_fisico_no">NO</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="doc_fisicos" id="doc_fisico_si" value="1" disabled>
                                                <label class="form-check-label" for="doc_fisico_si">SI</label>
                                            </div>';
                        }


                        echo '</div>
                                        <div class="col-xl-12 pt-3">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label>Archivos Electrónicos:</label> ';
                        if ($denuncia['doctos_electronicos'] == 1) {
                            echo
                            '<br><div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="doc_electronicos" id="doc_electronicos_no" value="0" disabled>
                                                            <label class="form-check-label" for="doc_electronicos_no">NO</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="doc_electronicos" id="doc_electronicos_si" value="1" checked disabled>
                                                            <label class="form-check-label" for="doc_electronicos_si">SI</label>
                                                        </div>';
                        } else {
                            echo
                            '<br><div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="doc_electronicos" id="doc_electronicos_no" value="0" checked disabled>
                                                            <label class="form-check-label" for="doc_electronicos_no">NO</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="doc_electronicos" id="doc_electronicos_si" value="1" disabled>
                                                            <label class="form-check-label" for="doc_electronicos_si">SI</label>
                                                        </div>
                                                        ';
                        }

                        echo '
                                                </div>
                                                <div class="col-xl-12  mt-2">';
                        if ($denuncia['doctos_electronicos'] == 1) {
                            $queryDoc = "SELECT documentos_denuncia.ruta FROM denuncia INNER JOIN documentos_denuncia ON documentos_denuncia.id_denuncia = denuncia.id_denuncia WHERE denuncia.id_denuncia = " . $id;
                            if ($resultadoDoc = $link->query($queryDoc)) {
                                if ($resultadoDoc->num_rows >= 1) {
                                    while ($docs = $resultadoDoc->fetch_assoc()) {
                                        echo '<a href="' . substr($docs['ruta'], 3) . '" class="badge badge-success p-2 mr-3" target="_blank">' . substr($docs['ruta'], 12) . '</a>';
                                    }
                                    echo '
                                                                <div id="des_doctos" class="col-xl-6 mt-2 p-0">
                                                                    <label>Descripción de los archivos electrónicos:</label><br>
                                                                    <textarea id="descripcion_archivos" name="descripcion_archivos" class="form-control" type="text" rows="3" disabled>' . $denuncia['descripcion_archivos'] . '</textarea>
                                                                </div>';
                                } else {
                                    echo '<span class="badge badge-danger p-1">A pesar de seleccionar la opción de SI, no se adjunto ningún documento.</span>';
                                }
                            }
                        }
                        echo '</div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-xl-12 mt-3">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label>Testigos:</label> ';
                        if ($denuncia['testigos'] == 1) {
                            echo
                            '<br><div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="testigos" id="testigos_no" value="0" disabled>
                                                <label class="form-check-label" for="testigos_no">NO</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="testigos" id="testigos_si" value="1" checked disabled>
                                                <label class="form-check-label" for="testigos_si">SI</label>
                                            </div>';
                        } else {
                            echo
                            '<br><div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="testigos" id="testigos_no" value="0" checked disabled>
                                                <label class="form-check-label" for="testigos_no">NO</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="testigos" id="testigos_si" value="1" disabled>
                                                <label class="form-check-label" for="testigos_si">SI</label>
                                            </div>';
                        }

                        echo '</div>
                                    <div class="col-xl-12 mt-3">
                                        <div class="row m-auto d-flex justify-content-between">
                                            <label for="otras_pruebas">Otro tipo de prueba:</label>
                                        </div>
                                        <textarea id="otras_pruebas" name="otras_pruebas" class="form-control" type="text" rows="3" disabled>' . $denuncia['otro_tipo_prueba'] . '</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 mt-5 pt-2">
                                <h4>Datos personales</h4>
                                <hr>
                            </div>
                            
                            <div class="col-xl-12 mt-3">
                                <div class="row">
                                    <div class="col-xl-6 mt-3">
                                        <label for="">¿Deseas proporcionar tus datos personales?</label><br>
                                        <select class="custom-select" id="datos_personales" name="datos_personales" class="" disabled>';
                        if ($denuncia['datos_personales'] == 1 || ($denuncia['datos_personales'] == 0 && $denuncia['ID_tipo'] == 19)) {
                            echo '<option>SI</option>';
                        } else {
                            echo '<option>NO</option>';
                        }

                        echo '</select>
                                    </div>
                                </div>
                            </div>';
                        if ($denuncia['datos_personales'] == 1 || ($denuncia['datos_personales'] == 0 && $denuncia['ID_tipo'] == 19)) {
                            echo '
                                <div id="f_datos_personales" class="col-xl-12 p-0">
                                    <div class="col-xl-12 mt-3">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <div class="row m-auto d-flex row-column">
                                                    <label>Nombre(s):</label>
                                                </div>
                                                <input id="nombre_denunciante" name="nombre_denunciante" placeholder="' . $denuncia['nombre_denunciante'] . '" class="form-control" type="text" disabled>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="row m-auto d-flex row-column">
                                                    <label>Primer Apellido:</label>
                                                </div>
                                                <input id="pa_denunciante" name="pa_denunciante" placeholder="' . $denuncia['pa_denunciante'] . '" class="form-control" type="text" disabled>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="row m-auto d-flex row-column">
                                                    <label>Segundo Apellido:</label>
                                                </div>
                                                <input id="sa_denunciante" name="sa_denunciante" placeholder="' . $denuncia['sa_denunciante'] . '" class="form-control" type="text" disabled>
                                            </div>
                                        </div>
                                    </div>';

                            /*<!--<div class="col-xl-12 mt-3">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="row m-auto d-flex row-column">
                                                    <label>CURP:</label>
                                                </div>
                                                <input id="curp_denunciante" name="curp_denunciante" placeholder="'.$denuncia['curp_denunciante'].'" class="form-control" type="text" disabled>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="row m-auto d-flex row-column">
                                                    <label>RFC:</label>
                                                </div>
                                                <input id="rfc_denunciante" name="rfc_denunciante" placeholder="'.$denuncia['rfc_denunciante'].'" class="form-control" type="text" disabled>
                                            </div>
                                        </div>
                                    </div>-->*/

                            echo '<div class="col-xl-12 mt-4">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label for="">Estado:</label><br>
                                                <select class="custom-select" id="estados" name="estados" class="" disabled>
                                                    <option>' . $denuncia['estado'] . '</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="">Municipio:</label><br>
                                                <select class="custom-select" id="municipios" name="municipios" class="" disabled>
                                                <option>' . $denuncia['municipio'] . '</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Localidad:</label>
                                                <input id="localidad" name="localidad" class="form-control" type="text" placeholder="' . $denuncia['localidad'] . '" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 mt-3">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label>Colonia:</label>
                                                <input id="colonia" name="colonia_denunciante" class="form-control" type="text" placeholder="' . $denuncia['colonia_denunciante'] . '" disabled>
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Calle:</label>
                                                <input id="calle" name="calle_denunciante" class="form-control" type="text" placeholder="' . $denuncia['calle_denunciante'] . '" disabled>
                                            </div>
                                            <div class="col-xl-1">
                                                <label>Núm Ext:</label>
                                                <input id="num_exterior" name="num_ext_denunciante" class="form-control" type="text" placeholder="' . $denuncia['num_ext_denunciante'] . '" disabled>
                                            </div>
                                            <div class="col-xl-1">
                                                <label>Núm Int:</label>
                                                <input id="num_interior" name="num_int_denunciante" class="form-control" type="text" placeholder="' . $denuncia['num_int_denunciante'] . '" disabled>
                                            </div>
                                            <div class="col-xl-2">
                                                <label>CP:</label>
                                                <input id="codigo_postal" name="cp_denunciante" class="form-control" type="text" placeholder="' . $denuncia['cp_denunciante'] . '" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 mt-3">
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <label>Email:</label>
                                                <input id="email" name="email_denunciante" placeholder="' . $denuncia['email_denunciante'] . '" class="form-control" type="email" disabled>
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Telefono:</label>
                                                <input id="telefono" name="telefono_denunciante" placeholder="' . $denuncia['telefono_denunciante'] . '" class="form-control" type="text" disabled>
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
                                                <select class="custom-select" id="grado_estudios" name="grado_estudios" class="" disabled>
                                                    <option>' . $denuncia['grado'] . '</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <label>Ocupación:</label>
                                                <input id="ocupacion" name="ocupacion" class="form-control" type="text" placeholder="' . $denuncia['ocupacion'] . '" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 mt-3">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <label for="">Sexo</label><br>
                                                <select class="custom-select" id="sexo" name="sexo" class="" disabled>
                                                    <option>' . $denuncia['sexo'] . '</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <label>Edad:</label>
                                                <input id="edad" name="edad" class="form-control" type="text" placeholder="' . $denuncia['edad'] . '" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        } else {
                            echo '<div class="col-xl-12 mt-4">
                                <div class="row m-auto d-flex row-column">
                                    <label for="domicilio_notificaciones">E-mail o número de teléfono para contactarlo y enviar notificaciones relacionadas con su denuncia (No obligatorio).</label>
                                </div>
                                <input id="domicilio_notificaciones" name="domicilio_notificaciones" class="form-control" style="text-transform: none !important; " type="text" placeholder="' . $denuncia['domicilio_notificaciones'] . '" disabled>
                            </div>';
                        }
                        echo '</div>';
                    }
                } else {
                    $disabled = 'disabled';
                    echo "No existe la denuncia";
                }
            }
        } else {
            $disabled = 'disabled';
            echo "No existe dicha denuncia";
        }
        ?>
        <div class="row py-2">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="verDenuncia.php" class="btn btn-secondary mr-2">Cancelar</a>
                <button id="clasificarDenuncia" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCalificar" <?= $disabled ?>>Clasificar denuncia</button>
            </div>
        </div>
        <div id="alerta" class="alert alert-success mt-2 alert-dismissible fade show" role="alert" style="display: none;">
        </div>
        <div id="alerta_danger" class="alert alert-danger mt-2 alert-dismissible fade show" role="alert" style="display: none;">
        </div>
    </div>

    <!-- modalCalificar -->
    <div class="modal fade" id="modalCalificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clasificación de la denuncia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-xl-12">
                                <p>Para enviar la denuncia al sistema que dará el seguimiento correcto,
                                    por favor selecciona una opción.
                                </p>
                            </div>
                            <div class="col xl-6 d-flex justify-content-around">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input cb" value="1">
                                    <label class="custom-control-label" for="customRadioInline1">SISED</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input cb" value="2">
                                    <label class="custom-control-label" for="customRadioInline2">SAC</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input cb" value="3">
                                    <label class="custom-control-label" for="customRadioInline3">Improcedente</label>
                                </div>
                            </div>
                            <!--<div class="col xl-6 d-flex justify-content-end">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input cb" id="check_sire" value="1">
                                    <label class="custom-control-label" for="check_sire">SIRE</label>
                                </div>
                            </div>
                            <div class="col xl-6 d-flex justify-content-start">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input cb" id="check_sac" value="2">
                                    <label class="custom-control-label" for="check_sac">SAC</label>
                                </div>
                            </div>-->
                        </div>
                        <div class="row m-auto d-flex justify-content-between">
                            <label>Justifica y fundamenta el motivo de la clasificación:</label>
                        </div>
                        <textarea id="justificacion" name="justificacion" class="form-control" type="text" rows="3"></textarea>
                    </div>
                    <div id="alerta_modal" class="alert alert-danger mt-5 pt-5 alert-dismissible fade show" role="alert" style="display: none;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmar">Clasificar denuncia</button>
                </div>
            </div>
        </div>
    </div>
    <!-- termina modalCalificar -->

    <!-- modalConfirmar -->
    <div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Clasificación de la denuncia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-xl-12">
                                <p>¿Estás seguro de la clasificación realizada?
                                    <br>
                                    <span class="text-danger font-weight-bold">Esta acción es irreversible</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="gif_loader" style="display:none;"><img src='../assets/img/ajax-loader.gif' alt='no img'></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="btnConfirmar" type="button" class="btn btn-primary">Si, estoy seguro</button>
                </div>
            </div>
        </div>
    </div>
    <!-- termina modalConfirmar -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $("#btnConfirmar").on("click", function(e) {
            $("#btnConfirmar").prop('disabled', 'disabled');
            e.preventDefault();

            if ($(".cb").is(':checked') == false || $('#justificacion').val().length == 0) {
                $("#modalConfirmar").modal('toggle');
                $('#alerta_modal').html('<p>Los campos <strong>sistema y justificación</strong> no pueden estar vacío.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                $('#alerta_modal').show();
                $("#btnConfirmar").prop('disabled', false);
                return;
            } else {
                $('#alerta_modal').hide();
            }

            let idDenuncia = <?= $id ?>;
            let folioDenuncia = <?= '"' . $folioDenuncia . '"' ?>;
            let idUsuario = <?= $_SESSION['id_usuario'] ?>;

            var fd = new FormData();
            fd.append('idDenuncia', idDenuncia);
            fd.append('folioDenuncia', folioDenuncia);
            fd.append('idUsuario', idUsuario);
            fd.append('tipoDenuncia', $(".cb:checked").val());
            fd.append('justificacion', $("#justificacion").val());

            $.ajax({
                url: '../controllers/denuncia/clasificarDenuncia.php',
                type: 'POST',
                data: fd,
                dataType: 'json', //como viene la respuesta
                processData: false, // tell jQuery not to process the data
                contentType: false,

                beforeSend: function() {
                    $('#gif_loader').show();
                },
                success: function(response) {
                    console.log(response);
                    $("#modalConfirmar").modal('toggle');
                    $("#modalCalificar").modal('toggle');
                    $("#btnConfirmar").prop('disabled', false);
                    if (response.response == 1) {
                        //window.location.href = "views/verDenuncia.php";
                        $('#alerta').html('<p>Denuncia clasificada exitosamente</p><br><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                        $('#alerta').show();
                        setTimeout("window.location.href = 'verDenuncia.php';", 4000);
                    } else {
                        console.log(response);
                        $("#clasificarDenuncia").prop('disabled', false);
                        $('#alerta_danger').html('<p>No se pudo clasificar la denuncia, intenta nuevamente <br>Error: <span class="font-weight-bold">' + response.data.message + '</span></p><br><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                        $('#alerta_danger').show();
                    }
                },
                complete: function() {
                    $('#gif_loader').hide();
                },
                error: function(response) {
                    $("#modalConfirmar").modal('toggle');
                    $("#btnConfirmar").prop('disabled', false);
                    console.log(response);
                    alert("error" + response);
                }
            });
        });
    </script>
</body>

</html>