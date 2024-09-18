<?php
//error_reporting(0);
date_default_timezone_set('America/Mexico_City');
include('../../db/db.php');
include('../../db/db2.php');
//include('../../mail/mailer.php');
include('../api/cliente_aSAC.php');
include('../api/cliente_aSIRE.php');

$link = connect();
$conexion_sised = connect_sised();

if ($_POST) {

	$id_clasificacion = null;
	$id_denuncia = $link->real_escape_string($_POST['idDenuncia']);
	$folio_denuncia = $link->real_escape_string($_POST['folioDenuncia']);
	$id_usuario = $link->real_escape_string($_POST['idUsuario']);
	$sistema_destino = $link->real_escape_string($_POST['tipoDenuncia']);
	$justificacion = $link->real_escape_string($_POST['justificacion']);
	$fechaHoy = date('Y-m-d H:i:s');
	$fechaYear = date('Y');

	$insert_clasificacion = $link->prepare("INSERT INTO clasificacion_denuncia VALUES (?,?,?,?,?,?)");
	$insert_clasificacion->bind_param("iiiiss", $id_clasificacion, $id_denuncia, $sistema_destino, $id_usuario, $justificacion, $fechaHoy);

	if (!$insert_clasificacion->execute()) {
		//echo $insert_clasificacion->error . "<br>";
		exit;
	} else {
		$folioDenuncia = $link->real_escape_string($_POST['folioDenuncia']);
		if ($sistema_destino == 1) {
			try {
				$clienteSIRE = new Cliente_aSIRE();
				$tokenSIRE = $clienteSIRE->login('denuncias@externas.com', '4uD1*3xt3rN4s');
				/*var_export($tokenSIRE);
				exit;*/
				$responseSIRE = $clienteSIRE->post($tokenSIRE, $folioDenuncia, $link);
				/*var_export($responseSIRE);
				echo '<- Respuesta';
				exit;*/
				if ($responseSIRE['status'] == 200) {
					$idClasificacionInsertado = $insert_clasificacion->insert_id;
					$denuncia_clasificada = 2;

					$update_estatus = $link->prepare("UPDATE denuncia SET estatus=? WHERE id_denuncia=?");
					$update_estatus->bind_param("ii", $denuncia_clasificada, $id_denuncia);

					if (!$update_estatus->execute()) {
						echo $update_estatus->error . "<br>";
						exit;
					} else {

						/********************************************************************************************************************* */
						// INSERTAR REGISTRO DE la denuncia en el sistema de SISED
						$sql = "SELECT COUNT(*) as total FROM expedientes WHERE expediente like '%sidec%'";
						$result = $conexion_sised->query($sql);
						$res = $result->fetch_object();

						$total = (int) $res->total + 1;

						$nombre = 'UI/' . 'sidec' . $total . '/DEN/Remitida-' . 'SFP' . '/' . $fechaYear;

						$expediente = $nombre;
						$descripcion =  $justificacion;
						$fecha_recepcion = $fechaHoy;
						$auto_inicio = $fechaHoy;
						$asunto = $justificacion;
						$origen = 'Nueva';
						$fuente = 'UIF-RECEPCION';
						$ubicacion = 'UIF-RECEPCION';
						$tipo_investigacion_id = 1;
						$medio_captacion_id =  21;
						$turnar_id = 8;
						$dependencia_id = 21;
						$archivo = null;
						$sidec = 1;
						$folio_sidec = $id_denuncia;

						/*	$sql2 = "INSERT INTO expedientes(expediente, descripcion, fecha_recepcion, auto_inicio, asunto, origen, fuente, ubicacion, 
						                                 tipo_investigacion_id, medio_captacion_id, turnar_id, dependencia_id, archivo, sidec, folio_sidec) 
												 VALUES ('$expediente', '$descripcion', '$fecha_recepcion', '$auto_inicio', '$asunto', '$origen', '$fuente', '$ubicacion', $tipo_investigacion_id, $medio_captacion_id, $turnar_id, $dependencia_id, '$archivo', $sidec, '$folio_sidec')";


						$insertarExpediente =  $conexion_sised->prepare($sql2);

*/

						$sql2 = "INSERT INTO expedientes(expediente, descripcion, fecha_recepcion, auto_inicio, asunto, origen, fuente, ubicacion, 
                                    tipo_investigacion_id, medio_captacion_id, turnar_id, dependencia_id, archivo, sidec, folio_sidec) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

						$insertarExpediente = $conexion_sised->prepare($sql2);

						if ($insertarExpediente === false) {
							die('Error en la preparación de la consulta: ' . $conexion_sised->error);
						}

						$insertarExpediente->bind_param(
							"ssssssssiiiisis",
							$expediente,
							$descripcion,
							$fecha_recepcion,
							$auto_inicio,
							$asunto,
							$origen,
							$fuente,
							$ubicacion,
							$tipo_investigacion_id,
							$medio_captacion_id,
							$turnar_id,
							$dependencia_id,
							$archivo,
							$sidec,
							$folio_sidec
						);


						if (!$insertarExpediente->execute()) {

							exit;
						}




						$conexion_sised->close();

						/****************************************************************************************************************************** */
						$idBitacora = null;

						$estatus = 2;

						$insertBitacora = $link->prepare("INSERT INTO bitacora VALUES (?,?,?,?,?,?,?)");
						$insertBitacora->bind_param("isiiiis", $idBitacora, $folioDenuncia, $idClasificacionInsertado, $sistema_destino, $estatus, $id_usuario, $fechaHoy);
						if (!$insertBitacora->execute()) {
							//echo $insertBitacora->error . "<br>";
							exit;
						} else {
							$email = '';
							$q_mail = "SELECT email_denunciante, domicilio_notificaciones FROM denuncia WHERE id_denuncia = " . $id_denuncia;
							if (!$getEmail = $link->query($q_mail)) {
								//echo $link->error . "<br>";
								//exit;
							} else {
								$emailCiudadano = $getEmail->fetch_assoc();
								$email = $emailCiudadano['email_denunciante'];
								$email_anonimo = $emailCiudadano['domicilio_notificaciones'];
								// if ($email != '' && strpos($email, '@') !== false) {
								// 	sendMail($email, $estatus, $folioDenuncia, $link);
								// }
								// if (strpos($email_anonimo, '@') !== false && $email_anonimo != '') {
								// 	sendMail($email_anonimo, $estatus, $folioDenuncia, $link);
								// }
							}
							$data = array('response' => 1);
							echo json_encode($data);
						}
					}
				} else {
					//echo 'no se pudo mandar la denuncia a SIRE';
					$link->query('DELETE FROM clasificacion_denuncia where id_denuncia = ' . $insert_clasificacion->insert_id);
					$link->query('ALTER TABLE denuncia AUTO_INCREMENT = ' . $id_denuncia);
					$data = array('response' => 0, 'data' => $responseSIRE);
					echo json_encode($data);
					exit;
				}
			} catch (Exception $e) {
				echo $e;
				$link->query('DELETE FROM clasificacion_denuncia where id_denuncia = ' . $insert_clasificacion->insert_id);
				$link->query('ALTER TABLE denuncia AUTO_INCREMENT = ' . $id_denuncia);
			}
		}
		if ($sistema_destino == 2) {

			try {
				$clienteSAC = new Cliente_aSAC();
				$token = $clienteSAC->login('gerardo@gerardo.com', '123456');
				/*var_export($token);
				echo '<- Respuesta';
				exit;*/
				$responseSAC = $clienteSAC->post($token, $folioDenuncia, $link);
				/*var_export($responseSAC);
				echo '<- Respuesta';
				exit;*/
				if ($responseSAC['success'] == true) {
					$idClasificacionInsertado = $insert_clasificacion->insert_id;
					$denuncia_clasificada = 2;

					$update_estatus = $link->prepare("UPDATE denuncia SET estatus=? WHERE id_denuncia=?");
					$update_estatus->bind_param("ii", $denuncia_clasificada, $id_denuncia);

					if (!$update_estatus->execute()) {
						//echo $update_estatus->error . "<br>";
						exit;
					} else {
						$idBitacora = null;

						$estatus = 2;

						$insertBitacora = $link->prepare("INSERT INTO bitacora VALUES (?,?,?,?,?,?,?)");
						$insertBitacora->bind_param("isiiiis", $idBitacora, $folioDenuncia, $idClasificacionInsertado, $sistema_destino, $estatus, $id_usuario, $fechaHoy);
						if (!$insertBitacora->execute()) {
							//echo $insertBitacora->error . "<br>";
							exit;
						} else {
							$email = '';
							$q_mail = "SELECT email_denunciante,domicilio_notificaciones FROM denuncia WHERE id_denuncia = " . $id_denuncia;
							if (!$getEmail = $link->query($q_mail)) {
								//echo $link->error . "<br>";
								//exit;
							} else {
								$emailCiudadano = $getEmail->fetch_assoc();
								$email = $emailCiudadano['email_denunciante'];
								// $email_anonimo = $emailCiudadano['domicilio_notificaciones'];
								// if ($email != '' && strpos($email, '@') !== false) {
								// 	sendMail($email, $estatus, $folioDenuncia, $link);
								// }
								// if ($email_anonimo != '' && strpos($email_anonimo, '@') !== false) {
								// 	sendMail($email_anonimo, $estatus, $folioDenuncia, $link);
								// }
							}
							$data = array('response' => 1);
							echo json_encode($data);
						}
					}
				} else {
					//echo 'no se pudo mandar la denuncia a SAC';
					$link->query('DELETE FROM clasificacion_denuncia where id_denuncia = ' . $insert_clasificacion->insert_id);
					$link->query('ALTER TABLE denuncia AUTO_INCREMENT = ' . $id_denuncia);
					$data = array('response' => 0, 'data' => $responseSAC);
					echo json_encode($data);
					exit;
				}
			} catch (Exception $e) {
				//echo "estoy en el catch";
				//echo $e;
				$link->query('DELETE FROM clasificacion_denuncia where id_denuncia = ' . $insert_clasificacion->insert_id);
				$link->query('ALTER TABLE denuncia AUTO_INCREMENT = ' . $id_denuncia);
			}
		}
		if ($sistema_destino == 3) {
			try {
				$denuncia_clasificada = 21;
				$update_estatus = $link->prepare("UPDATE denuncia SET estatus=? WHERE id_denuncia=?");
				$update_estatus->bind_param("ii", $denuncia_clasificada, $id_denuncia);

				if (!$update_estatus->execute()) {
					//echo $update_estatus->error . "<br>";
					exit;
				} else {
					$idBitacora = null;
					$idClasificacionInsertado = $insert_clasificacion->insert_id;
					$estatus = 21;

					$insertBitacora = $link->prepare("INSERT INTO bitacora VALUES (?,?,?,?,?,?,?)");
					$insertBitacora->bind_param("isiiiis", $idBitacora, $folioDenuncia, $idClasificacionInsertado, $sistema_destino, $estatus, $id_usuario, $fechaHoy);
					if (!$insertBitacora->execute()) {
						//echo $insertBitacora->error . "<br>";
						exit;
					} else {
						$data = array('response' => 1);
						echo json_encode($data);
					}
				}
			} catch (Exception $e) {
				//echo $e;
				//$link->query('DELETE FROM clasificacion_denuncia where id_denuncia = ' . $insert_clasificacion->insert_id);
				$link->query('ALTER TABLE denuncia AUTO_INCREMENT = ' . $id_denuncia);
			}
		}
	}
} else {
	$data = array('response' => 0);
	echo json_encode($data);
}
