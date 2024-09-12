<?php
include('../../db/db.php');
$link = connect();

$query = "SELECT id_denuncia,folio,cat_tipo_denuncia.tipo_denuncia as tipo,cat_estatus.estatus as estatus, dependencialibre,fechaRecepcion,dependencialibre,narracion_hechos 
            FROM denuncia
            INNER JOIN cat_tipo_denuncia ON denuncia.tipo_denuncia = cat_tipo_denuncia.id_cat_tipo_denuncia
            INNER JOIN cat_estatus ON denuncia.estatus = cat_estatus.id
            WHERE denuncia.estatus = 1
            ORDER BY denuncia.id_denuncia ASC";
if (!$resultado = $link->query($query)) {
    echo $link->error . "<br>";
    exit;
}
if($resultado->num_rows >= 1){
    while ($denuncias = $resultado->fetch_assoc()) {
        echo '
        <div class="col-xl-12 col-md-12 list-group-item list-group-item-action">
            <small class="text-muted pt-1 folio" style="display:none;">Folio: <strong>'.$denuncias['folio'].'</strong></small>
            <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">'.mb_strimwidth($denuncias['dependencialibre'],0,15,"...").' - '.mb_strimwidth($denuncias['tipo'],0,15,"...").'</h6>
                <div class="d-flex flex-column align-items-end">
                    <small class="text-muted pt-1">Fecha de recepción: '.$denuncias['fechaRecepcion'].'</small>
                    <small class="text-muted pt-1 folio">Folio: <strong>'.$denuncias['folio'].'</strong></small>
                    <small class="text-muted pt-1">Estatus: <strong class="badge rounded-pill bg-danger text-white p-1">'.$denuncias['estatus'].'</strong></small>
                </div>
            </div>
            <p class="mb-1 mt-3">'.mb_strimwidth($denuncias['narracion_hechos'],0,40,"...").'</small><br>
            <div class="d-flex justify-content-end">
                <a href="revisarDenuncia.php?id='.$denuncias['id_denuncia'].'" class="mt-2">Clasificar denuncia</a>
            </div>
        </div>';
    }
}else{
    echo '<small class="text-center">No hay denuncias por clasificar</small>';
}
