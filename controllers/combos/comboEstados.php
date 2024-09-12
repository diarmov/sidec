<?php
include('../../db/db.php');
$link = connect();

$query = "SELECT id, nombre FROM cat_estados";
if (!$resultado = $link->query($query)) {
	echo $link->error."<br>";
	exit;
}else{
	echo '<option>Seleccione una opción</option>';
	while($estados = $resultado->fetch_assoc()){
		echo '<option value="' . $estados['id'] . '">' . $estados['nombre'] . '</option>';
	}
}