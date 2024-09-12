<?php

include('../../db/db.php');

$link = connect();

$query = "SELECT id_usuario, username, email, activo FROM usuarios";

if (!$usuarios = $link->query($query)) {
    //echo $link->error . "<br>";
    echo 400;
    exit;
} else {
    if ($usuarios->num_rows > 0) {
        echo '
                <table id="usuarios" class="table table-md table-hover text-center shadow">
                    <thead style="background-color:#005CB9; color: white;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre de usuario</th>
                            <th scope="col">Email</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">';
        while ($usuario = $usuarios->fetch_assoc()) {
            echo '
            <tr>
                <td>' . $usuario['id_usuario'] . '</td>
                <td>' . $usuario['username'] . '</td>
                <td>' . $usuario['email'] . '</td>';
                if($usuario['activo'] == 1){
                    echo '<td>Activo</td>';
                }else{
                    echo '<td>Inactivo</td>';
                }
                echo '
                <td>
                    <a href="../views/editarUsuario.php?id='.$usuario['id_usuario'].'" type ="button" class="btn btn-secondary text-white">Editar</a>';
                    if($usuario['activo'] ==  1){
                        echo '<a id="eliminar" href="../controllers/usuario/eliminarUsuario.php?id='.$usuario['id_usuario'].'&activo=0" type ="button" class="btn btn-danger text-white ml-1">Inhabilitar</a>';
                    }else{
                        echo '<a id="eliminar" href="../controllers/usuario/eliminarUsuario.php?id='.$usuario['id_usuario'].'&activo=1" type ="button" class="btn btn-danger text-white ml-1">Habilitar</a>';
                    }
                    
                echo '</td>
                </tr>';
        }
        echo '</tbody>
            </table>';
    }
}
?>
<style>
    table {
        width: 100%;
    }

    #usuarios_filter {
        float: right;
    }

    #usuarios_paginate {
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
        $('#usuarios').DataTable({
            "aLengthMenu": [
                [5, 10, 25, -1],
                [5, 10, 25, "Todos"]
            ],
            "iDisplayLength": 5,
        });
    });
</script>
