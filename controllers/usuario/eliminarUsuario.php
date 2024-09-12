<?php

include('../../db/db.php');

$link = connect();
if ($_GET) {
    $id = $link->real_escape_string($_GET['id']);
    $activo = $link->real_escape_string($_GET['activo']);
    $query = "UPDATE usuarios SET activo=? WHERE id_usuario=?";
    $update = $link->prepare($query);
    $update->bind_param('ii', $activo, $id);
    if (!$update->execute()) {
        echo $update->error . "<br>";
        exit;
    }
    header("Location: ../../views/usuarios.php");
}
