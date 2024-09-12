<?php

include('../../db/db.php');
$link = connect();

$fields = array('tipo_denuncia', 'sistema', 'estatus', 'fechaRecepcion');
$conditions = array();
$where = '';

if (isset($_POST['fechaRecepcion']) && !empty($_POST['fechaRecepcion'])) {
    $aux = explode('-', $_POST['fechaRecepcion']);
    $fecha_inicio = trim($aux[0]);
    $fecha_fin = trim($aux[1]);
}
foreach ($fields as $field) {
    // if the field is set and not empty
    if (isset($_POST[$field]) && !empty($_POST[$field]) && $_POST[$field] != 0) {
        $_POST[$field] = $link->real_escape_string($_POST[$field]);

        if ($field == 'fechaRecepcion') {
            $conditions[] = "denuncia.$field between '$fecha_inicio' and '$fecha_fin'";
        } else if ($field == 'sistema') {
            $conditions[] = "cat_opciones_sistemas.id = '" . $_POST[$field] . "'";
        } else {
            $conditions[] = "denuncia.$field = '" . $_POST[$field] . "'";
        }
    }
}

if (count($conditions) > 0) {
    $where = "WHERE " . implode(' AND ', $conditions);
} else {
    echo 400;
    exit;
}

$query = "SELECT
                denuncia.id_denuncia,
                denuncia.folio,
                denuncia.fechaRecepcion,
                cat_opciones_sistemas.nombre AS sistema,
                cat_tipo_denuncia.tipo_denuncia AS tipo,
                cat_estatus.estatus AS estatus 
            FROM denuncia
            left JOIN cat_tipo_denuncia ON denuncia.tipo_denuncia = cat_tipo_denuncia.id_cat_tipo_denuncia
            left JOIN cat_estatus ON denuncia.estatus = cat_estatus.id
            left JOIN (
                SELECT
                    * 
                FROM
                    clasificacion_denuncia AS cd 
                WHERE
                    fecha_clasificacion = ( SELECT MAX( fecha_clasificacion ) FROM clasificacion_denuncia AS cdd WHERE cd.id_denuncia = cdd.id_denuncia GROUP BY cd.id_denuncia ) 
                ) AS clasificacion_denuncia ON clasificacion_denuncia.id_denuncia = denuncia.id_denuncia
            left JOIN cat_opciones_sistemas ON clasificacion_denuncia.clasificacion = cat_opciones_sistemas.id 
            {$where}
            ORDER BY
            denuncia.id_denuncia";
if (!$denuncias = $link->query($query)) {
    //echo $link->error . "<br>";
    echo 400;
    exit;
} else {
    if ($denuncias->num_rows > 0) {
        echo '
                <table id="busqueda-table" class="table table-md table-hover text-center shadow">
                    <thead style="background-color:#005CB9; color: white;">
                        <tr>
                            <th scope="col">Folio</th>
                            <th scope="col">Fecha de Recepción</th>
                            <th scope="col">Sistema destino</th>
                            <th scope="col">Tipo de denuncia</th>
                            <th scope="col">Estatus</th>
                            <th scope="col" class="noExl">Ver detalle</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">';
        while ($denuncia = $denuncias->fetch_assoc()) {
            echo '
                        <tr>
                            <td width="250">' . $denuncia['folio'] . '</td>
                            <td>' . $denuncia['fechaRecepcion'] . '</td>
                            <td>' . $denuncia['sistema'] . '</td>
                            <td>' . $denuncia['tipo'] . '</td>
                            <td>' . $denuncia['estatus'] . '</td>';
            if ($denuncia['estatus'] == 'Enviado') {
                echo '
                                <td class="noExl">
                                    <a href="../views/revisarDenuncia.php?id=' . $denuncia['id_denuncia'] . '" class="nav-link">Ver denuncia</a>
                                </td>';
            } else {
                echo '
                                <td class="noExl">
                                    <a href="../views/revisarDenuncia.php?id=' . $denuncia['id_denuncia'] . '&ob=true" class="nav-link">Ver denuncia</a>
                                </td>';
            }

            echo '</tr>';
        }
        echo '</tbody>
                </table>';
    } else {
        echo 404;
        exit;
    }
}
?>
<style>
    table {
        width: 100%;
    }

    #busqueda-table_filter {
        float: right;
    }

    #busqueda-table_paginate {
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
        $('#busqueda-table').DataTable({
            "aLengthMenu": [
                [5, 10, 25, -1],
                [5, 10, 25, "Todos"]
            ],
            "iDisplayLength": 5,
            "order": [4, 'desc']
        });
    });
</script>