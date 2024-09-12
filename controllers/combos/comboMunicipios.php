<?php
include('../../db/db.php');
$link = connect();

if (isset($_POST['id']) && !empty($_POST['id'])) {
	$id = trim($_POST['id']);
	$id = $link->real_escape_string($id);

	$query = "SELECT id, nombre FROM cat_municipios WHERE estado_id =" . $id;
	if (!$resultado = $link->query($query)) {
		echo $link->error . "<br>";
		exit;
	} else {
		while ($municipios = $resultado->fetch_assoc()) {
			echo '<option value="' . $municipios['id'] . '">' . $municipios['nombre'] . '</option>';
		}
	}
}