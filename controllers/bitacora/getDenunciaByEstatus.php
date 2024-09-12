<?php
include('../../db/db.php');
include('../api/cliente_aSAC.php');
$link = connect();

if (isset($_POST['folio']) && !empty($_POST['folio'])) {
    $folio = trim($_POST['folio']);
    $folio = $link->real_escape_string($folio);

    $query = "SELECT denuncia.justificacion_rechazo, denuncia.motivo_improcedente, denuncia.folio,cat_tipo_denuncia.tipo_denuncia,clasificacion_denuncia.justificacion,clasificacion_denuncia.fecha_clasificacion,denuncia.fechaRecepcion,denuncia.narracion_hechos,cat_estatus.estatus as estatus
        FROM denuncia
        INNER JOIN cat_estatus ON denuncia.estatus = cat_estatus.id
        INNER JOIN cat_tipo_denuncia ON denuncia.tipo_denuncia = cat_tipo_denuncia.id_cat_tipo_denuncia
        LEFT JOIN clasificacion_denuncia ON clasificacion_denuncia.id_denuncia = denuncia.id_denuncia
        WHERE folio = '$folio' ORDER BY id_clasificacion_denuncia DESC LIMIT 1";
    if (!$resultado = $link->query($query)) {
        echo $link->error . "<br>";
        exit;
    } else {
        if ($resultado->num_rows >= 1) {
            $denuncia = $resultado->fetch_assoc();
            echo
                '<div class="card mb-3" style="max-width: 100rem;">
                <div class="row no-gutters">
                    <div class="col-md-4">';
            getImagenCard($denuncia['estatus']);
            echo '</div>
                    <div class="col-md-8">
                        <div class="card-body">';
            getTextCard($denuncia['estatus'], $denuncia['folio'], $denuncia['motivo_improcedente'], $denuncia['justificacion_rechazo'], $denuncia['justificacion']);
            echo '<br>
                            <hr>
                            <h6 class="card-title">Detalle general</h6>
                            <ul>
                                <li>Folio: <small class="text-muted">' . $denuncia['folio'] . '</small></li>
                                <li>Acto de corrupción o manifestación ciudadana: <small class="text-muted">' . $denuncia['tipo_denuncia'] . '</small></li>';
            echo '<li>Fecha de envío: <small class="text-muted">' . $denuncia['fechaRecepcion'] . '</small></li>';
            if ($denuncia['estatus'] == 'Clasificado') {
                echo '<li>Fecha de clasificación: <small class="text-muted">' . $denuncia['fecha_clasificacion'] . '</small></li>';
            }
            if ($denuncia['narracion_hechos'] != '') {
                echo '<li>Narración de los hechos: <small class="text-muted">' . mb_strimwidth($denuncia['narracion_hechos'], 0, 40, "...") . '</small></li>';
            }
            echo '</ul>
                        </div>
                    </div>
                </div>
            </div>
            ';
        } else {
            echo '
            <div class="alert alert-danger col-6" role="alert">
                No existe la denuncia con folio: ' . $folio . '
            </div>';
        }
    }
} else {
    echo '
    <div class="alert alert-danger col-6" role="alert">
        Debes ingresar un folio válido.
    </div>';
}

function getImagenCard($estatus)
{
    switch ($estatus) {
        case 'Enviado':
            echo '<img src="../../assets/img/sent.jpg" class="card-img" alt="...">';
            break;
        case 'Clasificado':
            echo '<img src="../../assets/img/clasification.jpg" class="card-img" alt="...">';
            break;

        case 'Concluido Promovente':
        case 'Concluido Secretaria de la Funcion Publica':
            echo '<img src="../../assets/img/success.jpg" class="card-img" alt="...">';
            break;

        case 'Improcedente':
            echo '<img src="../../assets/img/failure.jpg" class="card-img" alt="...">';
            break;

            //entran todos los estatus que tengan que ver con el proceso de la denuncia
        default:
            echo '<img src="../../assets/img/process.jpg" class="card-img" alt="...">';
            break;
    }
}

function getTextCard($estatus, $folioSidec, $motivo_improcedente = '', $justificacion = '', $justificacionRechazoSidec = '')
{
    $clienteAsunto = new Cliente_aSAC();
    $token = $clienteAsunto->login('test@test.com', '12345678');
    $responseSAC = $clienteAsunto->getIdAsunto($folioSidec, $token);
    if (empty($responseSAC)) {
        $URL = '';
        $idAsunto = '';
        $a = '';
    } else {
        $idAsunto = $responseSAC[0]['idAsunto'];
        $idAsunto_encriptado = encrypt("aaabbb".$idAsunto."aaabbb", "p&(oa@)+=uaq*23711!@#12psd@#239");
        $URL = "http://contraloriasocial.zacatecas.gob.mx/detalles.php?idAsunto=".$idAsunto_encriptado;
        $a = '<a id="url" href="javascript:ventanaSecundaria(' . "'$URL'" . ')">Ver detalles</a>';
    }

    switch ($estatus) {
        case 'Enviado':
            echo '<h5 class="card-title">Denuncia enviada.</h5>
            <p class="card-text">Su denuncia ha sido recibida y se encuentra en espera de ser revisada por nuestro personal.</p>';
            break;
        case 'Clasificado':
            echo '<h5 class="card-title">Denuncia clasificada</h5>
                <p class="card-text">Su denuncia ha sido clasificada con éxito, ahora se dará un seguimiento al caso.</p>';
            break;
        case 'Rechazado':
            echo '<h5 class="card-title">Denuncia rechazada</h5>
                <p class="card-text">Su denuncia ha sido rechazada y se encuentra en espera de ser clasificada nuevamente.</p>';
            break;
        case 'En Proceso':
            echo '<h5 class="card-title">Denuncia en proceso</h5>
                <p class="card-text">Su denuncia se encuentra en proceso.</p>';
            break;
        case 'Pendiente por turnar a la dependencia':
            echo '<h5 class="card-title">Pendiente por turnar a la dependencia</h5>
                <p class="card-text">Su denuncia se encuentra Pendiente por turnar a la dependencia.</p>';
            break;
        case 'Turnado a dependencia sin respuesta':
            echo '<h5 class="card-title">Turnado a dependencia sin respuesta</h5>
                <p class="card-text">Su denuncia se encuentra Turnado a dependencia sin respuesta.</p>';
            break;
        case 'Respuesta de la dependencia':
            echo '<h5 class="card-title">Respuesta de la dependencia</h5>
                <p class="card-text">Su denuncia se encuentra en Respuesta de la dependencia.</p>';
            break;
        case 'Concluido Promovente':
            echo '<h5 class="card-title">Concluido Promovente</h5>
                <p class="card-text">Su denuncia ha sido concluida promovente.</p>' . $a;
            break;
        case 'Concluido Secretaria de la Funcion Publica':
            echo '<h5 class="card-title">Denuncia concluida</h5>
                <p class="card-text">Su denuncia ha sido concluida por la Secretaría de la Función Pública</p>' . $a;
            break;
        case 'Improcedente':
            echo '<h5 class="card-title">Denuncia improcedente</h5>
                <p class="card-text">Su denuncia ha sido improcedente. <br><br>El motivo: <br>'.$motivo_improcedente.'</p>' . $a;
            break;

        case 'Recibida':
            echo '<h5 class="card-title">Denuncia Recibida </h5>
                <p class="card-text">Su denuncia ha sido Recibida.</p>';
            break;
        case 'Aceptada':
            echo '<h5 class="card-title">Denuncia Aceptada </h5>
            <p class="card-text">Su denuncia ha sido Aceptada.</p>';
            break;
        case 'Rechazada':
            echo '<h5 class="card-title">Denuncia Rechazada</h5>
                <p class="card-text">Su denuncia ha sido Rechazada.</p>';
            break;
        case 'Iniciada Investigacion':
            echo '<h5 class="card-title">Denuncia Iniciada Investigacion</h5>
                <p class="card-text">Su denuncia ha sido Iniciada Investigacion.</p>';
            break;
        case 'Procede investigacion':
            echo '<h5 class="card-title">Denuncia Procede investigacion</h5>
                <p class="card-text">Su denuncia ha Procede investigacion.</p>';
            break;
        case 'No procede investigacion':
            echo '<h5 class="card-title">Denuncia No procede investigacion</h5>
                <p class="card-text">Su denuncia  No procede a investigacion.</p>';
            break;
        case 'Enviada a Dra':
            echo '<h5 class="card-title">Denuncia Enviada a Dra</h5>
                <p class="card-text">Su denuncia ha sido Enviada a Dra.</p>';
            break;
        case 'Emplazamiento':
            echo '<h5 class="card-title">Denuncia Emplazamiento</h5>
                <p class="card-text">Su denuncia ha sido Emplazamiento.</p>';
            break;
        case 'Audiencia':
            echo '<h5 class="card-title">Denuncia Audiencia</h5>
                <p class="card-text">Su denuncia ha sido Audiencia.</p>';
            break;
        case 'Resolucion':
            echo '<h5 class="card-title">Denuncia Resolucion</h5>
                <p class="card-text">Su denuncia ha sido Resolucion.</p>';
            break;
        case 'Desechada':
            echo '<h5 class="card-title">Denuncia Improcedente</h5>
                <p class="card-text">Su denuncia es improcedente ya que no cuenta con la información suficiente para dar un seguimiento.';
                if ($justificacion != '')
                {
                    echo '<br><br>Justificación: <br> '.$justificacion.'</p>';
                }

                if ($justificacionRechazoSidec != '')
                {
                    echo '<br><br><b style="color: black;">Justificación:</b> <br> '.$justificacionRechazoSidec.'</p>';
                }
                
            break;
    }
}

function encrypt($string, $key)
{
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    return base64_encode($result);
}