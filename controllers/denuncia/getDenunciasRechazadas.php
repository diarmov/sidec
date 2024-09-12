<?php
include('../../db/db.php');
$link = connect();

$query = "SELECT denuncia.id_denuncia,folio,cat_opciones_sistemas.nombre AS sistema,clasificacion_denuncia.fecha_clasificacion AS fechaClasificacion,cat_tipo_denuncia.tipo_denuncia AS tipo,cat_estatus.estatus AS estatus,dependencialibre,narracion_hechos 
            FROM denuncia
            INNER JOIN cat_tipo_denuncia ON denuncia.tipo_denuncia = cat_tipo_denuncia.id_cat_tipo_denuncia
            INNER JOIN cat_estatus ON denuncia.estatus = cat_estatus.id
            INNER JOIN (
                SELECT * 
                FROM clasificacion_denuncia AS cd 
                WHERE fecha_clasificacion = ( SELECT MAX( fecha_clasificacion ) FROM clasificacion_denuncia AS cdd WHERE cd.id_denuncia = cdd.id_denuncia GROUP BY cd.id_denuncia ) 
            ) AS clasificacion_denuncia ON clasificacion_denuncia.id_denuncia = denuncia.id_denuncia
            INNER JOIN cat_opciones_sistemas ON clasificacion_denuncia.clasificacion = cat_opciones_sistemas.id
            WHERE denuncia.estatus = 3
            ORDER BY denuncia.id_denuncia DESC";
if (!$resultado = $link->query($query)) {
    echo $link->error . "<br>";
    exit;
}
if ($resultado->num_rows >= 1){
    while ($denuncias = $resultado->fetch_assoc()) {
        echo '
        <div class="col-xl-12 col-md-12 list-group-item list-group-item-action">
        <small class="text-muted pt-1 folio" style="display:none;">Folio: <strong>'.$denuncias['folio'].'</strong></small>                
            <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">'.mb_strimwidth($denuncias['dependencialibre'],0,15,"...").' - '.mb_strimwidth($denuncias['tipo'],0,15,"...").'</h6>
                <div class="d-flex flex-column align-items-end">
                    <small class="text-muted pt-1">Fecha de la última clasificación: '.$denuncias['fechaClasificacion'].'</small>                
                    <small class="text-muted pt-1 folio">Folio: <strong>'.$denuncias['folio'].'</strong></small>                
                    <small class="text-muted pt-1">Estatus: <strong class="badge rounded-pill bg-warning text-white p-1">'.$denuncias['estatus'].'</strong></small>
                    <small class="text-muted pt-1">Sitema que rechazó: <strong class="p-1">'.$denuncias['sistema'].'</strong></small>
                    <a href="revisarDenuncia.php?id='.$denuncias['id_denuncia'].'">Ver denuncia</a>
                </div>
            </div>
            <p class="mb-1 mt-4">'.mb_strimwidth($denuncias['narracion_hechos'],0,40,"...").'</small><br>
        </div>';
    }
}else{
    echo '<small class="text-center">No hay denuncias rechazadas</small>';
}