<?php
include('../../db/db.php');
$link = connect();

$query = "SELECT denuncia.id_denuncia,folio,fechaRecepcion,cat_opciones_sistemas.nombre AS sistema,clasificacion_denuncia.fecha_clasificacion AS fechaClasificacion,cat_tipo_denuncia.tipo_denuncia AS tipo,cat_estatus.estatus AS estatus,dependencialibre,narracion_hechos 
            FROM denuncia
            INNER JOIN cat_tipo_denuncia ON denuncia.tipo_denuncia = cat_tipo_denuncia.id_cat_tipo_denuncia
            INNER JOIN cat_estatus ON denuncia.estatus = cat_estatus.id
            INNER JOIN (
                SELECT * 
                FROM clasificacion_denuncia AS cd 
                WHERE fecha_clasificacion = ( SELECT MAX( fecha_clasificacion ) FROM clasificacion_denuncia AS cdd WHERE cd.id_denuncia = cdd.id_denuncia GROUP BY cd.id_denuncia ) 
            ) AS clasificacion_denuncia ON clasificacion_denuncia.id_denuncia = denuncia.id_denuncia
            INNER JOIN cat_opciones_sistemas ON clasificacion_denuncia.clasificacion = cat_opciones_sistemas.id
            WHERE denuncia.estatus = 21";
if (!$resultado = $link->query($query)) {
    echo $link->error . "<br>";
    exit;
}
if ($resultado->num_rows >= 1){
    echo '
        <table id="table_desechadas" class="table table-md table-hover text-center shadow">
            <thead style="background-color:#005CB9; color: white;">
                <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">Fecha de Recepción</th>
                    <th scope="col" class="noExl">Ver detalle</th>
                </tr>
            </thead>
            <tbody class="table-bordered">';
    while ($denuncias = $resultado->fetch_assoc()) {
            echo '<tr>
                    <td>'.$denuncias['folio'].'</td>
                    <td>'.$denuncias['fechaRecepcion'].'</td>
                    <td class="noExl">
                        <a href="../views/revisarDenuncia.php?id=' . $denuncias['id_denuncia'] . '&ob=true" class="nav-link">Ver denuncia</a>
                    </td>
                </tr>';
    }
    echo '</tbody>
    </table>';
}else {
    echo '<small class="text-center">No hay denuncias improcedentes</small>';
    exit;
}
?>

<style>
    table {
        width: 100%;
    }

    #table_desechadas_filter {
        float: right;
    }

    #table_desechadas_paginate {
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
        $('#table_desechadas').DataTable({
            "aLengthMenu": [
                [5, 10, 25, -1],
                [5, 10, 25, "Todos"]
            ],
            "iDisplayLength": 5,
        });
    });
</script>