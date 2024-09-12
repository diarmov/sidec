<?php
session_start();
include('../db/db.php');

$link = connect();

if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $link->real_escape_string($_POST['username']);
    $password = $link->real_escape_string($_POST['password']);

    $username = trim($username);
    $password = trim($password);

    $query = "SELECT password FROM usuarios WHERE username = '$username'";
    if (!$resultado = $link->query($query)) {
        echo $link->error . '<br>';
        exit;
    } else {
        $hash = null;
        if ($resultado->num_rows == 1) {
            $get_pass = $resultado->fetch_assoc();
            $hash = $get_pass['password'];
        }
        $auth = password_verify($password, $hash);
        if ($auth === TRUE) {
            $q_user = "SELECT id_usuario, username, email, nombre, puesto FROM usuarios WHERE username = '$username' AND activo = 1";
            if (!$rs = $link->query($q_user)) {
                echo $link->error . '<br>';
                exit;
            } else {
                if ($rs->num_rows == 1) {
                    $usuario = $rs->fetch_assoc();
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    $_SESSION['username'] = $usuario['username'];
                    $_SESSION['nombre'] = $usuario['email'];
                    $_SESSION['email'] = $usuario['nombre'];
                    $_SESSION['puesto'] = $usuario['puesto'];
                    echo 1;
                }
            }
        }
    }
} else {
    echo 0;
}
