<?php
include('../../db/db.php');
$link = connect();

$query = "SELECT id_grado_educacion, grado FROM cat_grado_estudios";
if (!$resultado = $link->query($query)) {
	echo $link->error . "<br>";
	exit;
}else{
	echo '<option>Seleccione una opción</option>';
	while ($grado_estudios = $resultado->fetch_assoc()) {
		echo '<option value="' . $grado_estudios['id_grado_educacion'] . '">' . $grado_estudios['grado'] . '</option>';
	}
}