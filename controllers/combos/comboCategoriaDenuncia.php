<?php
include('../../db/db.php');
$link = connect();


$query = "SELECT id_cat_tipo_denuncia, tipo_denuncia FROM cat_tipo_denuncia WHERE activo = 1";
if (!$resultado = $link->query($query)) {
    echo $link->error . "<br>";
    exit;
} else {
    echo '<option value="0">--Selecciona--</option>';
    while ($tipo_denuncia = $resultado->fetch_assoc()) {
        if ($tipo_denuncia['id_cat_tipo_denuncia'] == 1 || $tipo_denuncia['id_cat_tipo_denuncia'] == 16) {
            echo '<optgroup label="' . $tipo_denuncia['tipo_denuncia'] . '">';
        }else if($tipo_denuncia['id_cat_tipo_denuncia'] == 4){
            echo '<option value="' . $tipo_denuncia['id_cat_tipo_denuncia'] . '">' . mb_strimwidth($tipo_denuncia['tipo_denuncia'],0,49,"")  . '</option>';
        }else if($tipo_denuncia['id_cat_tipo_denuncia'] == 15){
            echo '<option value="' . $tipo_denuncia['id_cat_tipo_denuncia'] . '">VIOLACIONES A LAS DISPOSICIONES DE LA LEY FEDERAL DE AUSTERIDAD REPUBLICANA</option>';
        } else {
            echo '<option value="' . $tipo_denuncia['id_cat_tipo_denuncia'] . '">' . $tipo_denuncia['tipo_denuncia'] . '</option>';
        }
    }
}
