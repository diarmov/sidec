<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: ../sessions/logout.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIDEC - Bitacora</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="verDenuncia.php">SIDEC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div></div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Bitacora de denuncia</a>
                </li>
            </ul>
            <div class="form-inline mt-2 mt-md-0">
                <span class="text-white mr-4"><small class="text-muted">Usuario: </small><?=$_SESSION['username']?></span>
                <a id="btn_salir" href="../sessions/logout.php" class="btn btn-danger my-2 my-sm-0" type="button">Salir</a>
            </div>
        </div>
    </nav>
    <br>
    <div class="container mt-5 rounded shadow">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4">Bitacora de la denuncia</h1>
                <p class="mt-5">Para ver los movimientos de una denuncia, ingresa el folio.</p>
            </div>
            
            <div class="d-flex col-md-12">
                <input id="folioDenuncia" name="folioDenuncia" class="form-control col-xl-4 col-md-4" type="text" placeholder="Ingresa el folio" aria-label="Folio">
                <button id="btn_buscar" name="btn_buscar" type="button" class="btn btn-success ml-4 col-xl-1 col-md-1 col-sm-12">Buscar</button>
            </div>
            <div class="col-md-12">
                <small class="text-muted">Ej. SIDEC-1-25032020-48</small>
            </div>
        </div>
        <div class="row" style="padding: 3rem 3rem;">
            <div id="listado" class="col-md-12">
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $("#btn_buscar").on("click", function (e) {
        $("#btn_buscar").prop('disabled', 'disabled');
        e.preventDefault();
        let folio = $("#folioDenuncia").val();
        $.ajax({
            url: '../controllers/bitacora/getBitacoraByDenuncia.php',
            type: 'POST',
            data: {folio: folio},
            beforeSend: function () {
                    //$('#gif_estatuto').show();
            },
            success: function (response) {
                $("#btn_buscar").prop('disabled', false);
                $('#listado').html(response);
            },
            complete: function () {
                $("#btn_buscar").prop('disabled', false);
                //$('#gif_estatuto').hide();
            },
            error: function (response) {
                alert("Problemas al tratar de enviar el formulario");
            }
            });
        });
    </script>
</body>

</html>