<?php
include('../../db/db.php');
$link = connect();

$query = "SELECT denuncia.id_denuncia, denuncia.fechaRecepcion, folio, cat_opciones_sistemas.nombre AS sistema, clasificacion_denuncia.fecha_clasificacion AS fechaClasificacion, cat_tipo_denuncia.tipo_denuncia AS tipo, cat_estatus.estatus AS estatus 
        FROM denuncia
        LEFT JOIN cat_tipo_denuncia ON denuncia.tipo_denuncia = cat_tipo_denuncia.id_cat_tipo_denuncia
        LEFT JOIN cat_estatus ON denuncia.estatus = cat_estatus.id
        LEFT JOIN (
            SELECT * 
            FROM clasificacion_denuncia AS cd 
            WHERE fecha_clasificacion = ( SELECT MAX( fecha_clasificacion ) FROM clasificacion_denuncia AS cdd WHERE cd.id_denuncia = cdd.id_denuncia GROUP BY cd.id_denuncia ) 
        ) AS clasificacion_denuncia ON clasificacion_denuncia.id_denuncia = denuncia.id_denuncia
        LEFT JOIN cat_opciones_sistemas ON clasificacion_denuncia.clasificacion = cat_opciones_sistemas.id 
        ORDER BY denuncia.id_denuncia ASC";
if (!$resultado = $link->query($query)) {
    echo $link->error . "<br>";
    exit;
}
if ($resultado->num_rows >= 1){
    echo '
        <table id="table_denuncias_todas" class="table table-md table-hover text-center shadow">
            <thead style="background-color:#005CB9; color: white;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Folio</th>
                    <th scope="col">Fecha de Recepción</th>
                    <th scope="col">Fecha de clasificación</th>
                    <th scope="col">Sistema Destino</th>
                    <th scope="col">Estatus</th>
                    <th scope="col" class="noExl">Ver detalle</th>
                </tr>
            </thead>
            <tbody class="table-bordered">';
    while ($denuncias = $resultado->fetch_assoc()) {
            echo '<tr>
                    <td>'.$denuncias['id_denuncia'].'</td>
                    <td>'.$denuncias['folio'].'</td>
                    <td>'.$denuncias['fechaRecepcion'].'</td>';

                    if($denuncias['fechaClasificacion'] == ''){
                        echo '<td class="table-danger">Sin clasificar</td>';
                    }else{
                        echo '<td>'.$denuncias['fechaClasificacion'].'</td>';
                    }

                    if($denuncias['sistema'] == ''){
                        echo '<td class="table-danger">Sin clasificar</td>';
                    }else{
                        echo '<td>'.$denuncias['sistema'].'</td>';
                    }

                    echo '<td>'.$denuncias['estatus'].'</td>';

                    echo '<td class="noExl">
                        <a href="../views/revisarDenuncia.php?id=' . $denuncias['id_denuncia'] . '&ob=true" class="nav-link">Ver denuncia</a>
                    </td>
                </tr>';
    }
    echo '</tbody>
    </table>';
}else {
    echo '<small class="text-center">No hay denuncias</small>';
    exit;
}
?>

<style>
    table {
        width: 100%;
    }

    #table_denuncias_todas_filter {
        float: right;
    }

    #table_denuncias_todas_paginate {
        float: right;
    }

    label {
        display: inline-flex;
        margin-bottom: .5rem;
        margin-top: .5rem;
    }
</style>
<script>
    $(function() {
        $('#table_denuncias_todas').DataTable({
            "aLengthMenu": [
                [5, 10, 25, -1],
                [5, 10, 25, "Todos"]
            ],
            "iDisplayLength": 5,
        });
    });
</script>