<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: ../sessions/logout.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>SIDEC - Alta de usuario</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="verDenuncia.php">SIDEC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bitacoraDenuncia.php">Bitacora de denuncia</a>
                </li>
            </ul>
            <div class="form-inline mt-2 mt-md-0">
                <span class="text-white mr-4"><small class="text-muted">Usuario: </small><?= $_SESSION['username'] ?></span>
                <a id="btn_salir" href="../sessions/logout.php" class="btn btn-danger my-2 my-sm-0" type="button">Salir</a>
            </div>
        </div>
    </nav>
    <br>
    <div class="container shadow rounded mt-5">
        <div class="row">
            <div class="d-flex justify-content-center container mt-3 mb-3">
                <form id="form_usuario" name="form_usuario">
                    <h5 class="display-4">Alta de usuario</h5>
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input id="username" name="username" type="text" class="form-control">
                        <small class="form-text text-muted">Ej. gera34</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input id="password" name="password" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-control">
                        <small class="form-text text-muted">Ej. user@example.com</small>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control">
                        <small class="form-text text-muted">Ej. Gerardo Gallardo</small>
                    </div>
                    <div class="form-group">
                        <label for="puesto">Puesto</label>
                        <input id="puesto" name="puesto" type="text" class="form-control">
                        <small class="form-text text-muted">Ej. Coordinador Estatal de Bibliotecas Públicas</small>
                    </div>
                </form>
            </div>
        </div>
        <div class="row d-flex justify-content-center py-3 px-3">
            <button id="btn_crear_usuario" class="btn btn-success px-5">Crear usuario</button>
        </div>
        <div id="alerta" class="alert alert-success mt-5 pt-5 alert-dismissible fade show" role="alert" style="display: none;">
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $("#btn_crear_usuario").on("click", function(e) {
            $("#btn_crear_usuario").prop('disabled', 'disabled');
            e.preventDefault();

            $.ajax({
                url: '../controllers/usuario/crearUsuario.php',
                type: 'POST',
                data: $("#form_usuario").serialize(),
                beforeSend: function() {
                    //$('#gif_estatuto').show();
                },
                success: function(response) {
                    $("#btn_crear_usuario").prop('disabled', false);
                    $('#alerta').html(response);
                    $('#alerta').show();
                    $('input').val('');
                    setTimeout("window.location.href = 'usuarios.php';", 3000);
                },
                complete: function() {
                    //$('#gif_estatuto').hide();
                },
                error: function(response) {
                    alert("Problemas al tratar de enviar el formulario");
                }
            });
        });
    </script>
</body>

</html>