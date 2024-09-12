<?php
include('../../db/db.php');
$link = connect();

$query = "SELECT id_sexo, sexo FROM cat_sexo";
if (!$resultado = $link->query($query)) {
    echo $link->error."<br>";
    exit;
}else{
    echo '<option>Seleccione una opción</option>';
    while($sexo = $resultado->fetch_assoc()){
        echo '<option value="' . $sexo['id_sexo'] . '">' . $sexo['sexo'] . '</option>';
    }
}