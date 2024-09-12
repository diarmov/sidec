<?php
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
include('../../db/db.php');
include('../../mail/mailer.php');
$link = connect();

$systemName = "SIDEC";
$today = date('dmY');
$lastID = null;
$random = rand(10, 99);

$query = "SELECT MAX(id_denuncia) AS id FROM denuncia LIMIT 1";

if (!$resultado = $link->query($query)) {
    //echo $link->error . "<br>";
    exit;
} else {
    $id = $resultado->fetch_assoc();
    $lastID = $id['id'];

    $lastID = (int) $lastID;
    $lastID += 1;

    $folio = $systemName . '-' . $lastID . '-' . $today . '-' . $random;
    $fecha_recepcion = date('Y-m-d');

    $columns = array();
    if ($_POST) {
        $keys = array("folio", "fechaRecepcion", "estatus");
        $values = array("'$folio'", "'$fecha_recepcion'", 1);
        $email = '';

        foreach ($_POST as $clave => $valor) {
            if ($clave != "doctos") { //input file no deseado
                $valor = $link->real_escape_string($valor);
                $keys[] = "{$clave}";
                $values[] = "'{$valor}'";
                if ($clave == 'email_denunciante' || $clave == 'domicilio_notificaciones') {
                    $email = $valor;
                }
            }
        }

        $queryInsert = "INSERT INTO denuncia (" . implode(",", $keys) . ") 
              VALUES (" . implode(",", $values) . ");";

        if (!$result = $link->query($queryInsert)) {
            //echo $link->error . "<br>";
            exit;
        } else {
            $fechaHoy = date('Y-m-d H:i:s');
            $estatus = 1;
            if ($_FILES) {
                $ruta = "../../files/";
                $rutaSAC = 'Archivos/Pruebas/';
                $contador = 0;
                $año = date('Y');
                foreach ($_FILES as $file) {
                    $rand = rand(10, 999);
                    if ($file['error'] == UPLOAD_ERR_OK) {
                        try {
                            $nombreTemporal = $file['tmp_name'];
                            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                            $nombreSac = '02-' . $lastID . '-' . $año . '-' . $contador . '.' . $extension;
                            $destino = $ruta . $nombreSac;
                            $destinoSAC = $rutaSAC . $nombreSac;

                            move_uploaded_file($nombreTemporal, $destino);

                            $insertDoc = $link->prepare("INSERT INTO documentos_denuncia (id_denuncia,ruta,rutaSAC,fechaRecepcion) VALUES (?,?,?,?)");
                            $insertDoc->bind_param("isss", $lastID, $destino, $destinoSAC, $fechaHoy);
                            $insertDoc->execute();
                        } catch (Exception $e) {
                            //echo $e;
                            $link->query('DELETE FROM denuncia where id_denuncia = ' . $lastID);
                            $link->query('ALTER TABLE denuncia AUTO_INCREMENT = ' . $lastID);
                            exit;
                        }
                    }
                    $contador++;
                }
            }

            $insertBitacora = $link->prepare("INSERT INTO bitacora (folio_denuncia,estatus_denuncia,fechaRegistro) VALUES (?,?,?)");
            $insertBitacora->bind_param("sis", $folio, $estatus, $fechaHoy);
            if (!$insertBitacora->execute()) {
                //echo $insertBitacora->error . "<br>";
                exit;
            } else {
                if ($email != '' && strpos($email, '@') !== false) {
                    sendMail($email, $estatus, $folio, $link);
                }

                sendMail('sidec@zacatecas.gob.mx', 3, $folio, $link);

                $response = array(
                    'response' => 1,
                    'folio' => $folio,
                    'fechaRecepcion' => $fecha_recepcion,
                );
                echo json_encode($response);
            }
        }
    } else {
        exit;
    }
}
