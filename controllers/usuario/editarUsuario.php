<?php

include('../../db/db.php');

$link = connect();
if ($_POST) {
    $id = $link->real_escape_string($_POST['id']);
    $username = $link->real_escape_string($_POST['username']);
    $nombre = $link->real_escape_string($_POST['nombre']);
    $puesto = $link->real_escape_string($_POST['puesto']);
    $email = $link->real_escape_string($_POST['email']);
    $password = password_hash($link->real_escape_string($_POST['password']), PASSWORD_BCRYPT);

    $query = "UPDATE usuarios SET username=?, nombre=?, puesto=?, email=?,password=? WHERE id_usuario=?";
    $update = $link->prepare($query);
    $update->bind_param('sssssi', $username, $nombre, $puesto, $email, $password,$id);
    if (!$update->execute()) {
        echo $update->error . "<br>";
        exit;
    } else {

        echo "<p>Usuario actualizado exitosamente</p><br>";
        echo
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>';
    }
}
