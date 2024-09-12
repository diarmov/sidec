<?php

include('../../db/db.php');
$link = connect();

if (isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] > 1) {
    $id = trim($_POST['id']);
    $id = $link->real_escape_string($id);

    $query = "SELECT id,nombre,direccion FROM posicionbuzones2 WHERE idmunicipio = " . $id;
    echo $query;
    if (!$resultado = $link->query($query)) {
        echo $link->error . "<br>";
        //exit;
    } else {

        if($resultado->num_rows > 1){
            $count = 1;
            echo '
                <table class="table table-hover ">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre del buzón</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($buzon = $resultado->fetch_assoc()) {
                echo '
                        <tr>
                            <td>' . $count . '</td>
                            <td>' . $buzon['nombre'] . '</td>
                            <td>' . $buzon['direccion'] . '</td>
                            <td>
                                <a href="../../views/crearDenuncia.php?idBuzon=' . $buzon['id'] . '">Realiza tu denuncia en este buzón virtual</a>
                            </td>
                        </tr>
                ';
                $count++;
            }
            echo '
                    </tbody>
                </table>';
        }
    }
}
