<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: ../sessions/logout.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
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
                    <a class="nav-link disabled" href="#">Usuarios</a>
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
    <div class="container mt-5 pt-5">
        <h4 class="text-center display-4">Listado de usuarios</h4>
        <div class="d-flex justify-content-end px-4">
            <a href="crearUsuario.php" class=""><i class="fas fa-user-plus"></i> Crear usuario</a>
        </div>
        <div id="table" class="mt-5"></div>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $.ajax({
                url: '../controllers/usuario/tableUsuarios.php',
                type: 'GET',
                processData: false,
                contentType: false,
                beforeSend: function() {
                },
                success: function(response) {
                    $('#table').html(response);
                },
                complete: function() {
                },
                error: function(response) {
                }
            });
        });

        $("#eliminar").on("click", function (e) {
            console.log('click');
            /*$.ajax({
                url: '../controllers/usuario/eliminarUsuario.php',
                type: 'POST',
                processData: false,
                contentType: false,
                beforeSend: function() {
                },
                success: function(response) {
                    location.reload();
                },
                complete: function() {
                },
                error: function(response) {
                }
            });*/
        });
    </script>
</body>

</html>