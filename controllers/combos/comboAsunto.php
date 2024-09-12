<?php
include('../../db/db.php');
$link = connect();

if (isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] > 1) {
    $id = trim($_POST['id']);
    $id = $link->real_escape_string($id);

    $query = "SELECT id_cat_tipo_denuncia, tipo_denuncia FROM cat_tipo_denuncia WHERE activo = 1 AND  id_cat_tipo_denuncia = " . $id;
} else {
    $query = "SELECT id_cat_tipo_denuncia, tipo_denuncia FROM cat_tipo_denuncia WHERE  id_cat_tipo_denuncia >= 16 AND activo = 1";
}

if (!$resultado = $link->query($query)) {
    echo $link->error . "<br>";
    exit;
} else {
    while ($tipo_denuncia = $resultado->fetch_assoc()) {
        if($tipo_denuncia['id_cat_tipo_denuncia'] == 1 || $tipo_denuncia['id_cat_tipo_denuncia'] == 16){
            echo '<optgroup label="'.$tipo_denuncia['tipo_denuncia'].'">';
        }else if($tipo_denuncia['id_cat_tipo_denuncia'] != 17){
            echo '<option value="' . $tipo_denuncia['id_cat_tipo_denuncia'] . '">' . $tipo_denuncia['tipo_denuncia'] . '</option>';
        }
        
    }
}
