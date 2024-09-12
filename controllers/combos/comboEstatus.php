<?php
include('../../db/db.php');
$link = connect();


$query = "SELECT id, estatus FROM cat_estatus WHERE activo = 1";
if (!$resultado = $link->query($query)) {
    echo $link->error . "<br>";
    exit;
} else {
    echo '<option value="0">--Selecciona--</option>';
    while ($tipo_denuncia = $resultado->fetch_assoc()) {
        echo '<option value="' . $tipo_denuncia['id'] . '">' . $tipo_denuncia['estatus'] . '</option>';
    }
}
