<?php

session_start();

if (empty($_SESSION['username'])) {

    header('Location: ../sessions/logout.php');

}

?>



<!doctype html>

<html lang="es">



<head>

    <title>SIDEC - Denuncias</title>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

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

        <h4 class="text-center display-4">Listado de todas las denuncias existentes en el sistema</h4>

        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end pr-5 m-3 pt-5">

            <a id="downloadXLS" href="#" style="color:#074167;"><i class="far fa-file-excel fa-lg"></i> Exportar</a>

        </div>

        <div class="table-responsive-md mt-5" id="table">

        </div>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



    <script src="../assets/js/jquery.dataTables.min.js"></script>

    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="../assets/js/jquery.table2excel.js"></script>



    <script>

        $(function() {

            $.ajax({

                url: '../controllers/denuncia/getDenunciasTodas.php',

                type: 'GET',

                success: function(response) {

                    $("#table").html(response);

                },

                error: function(response) {

                    alert("Problemas al tratar de obtener todas las denuncias");

                }

            });

        }); //termina orReady



        $("#downloadXLS").click(function() {

            $("#table").table2excel({

                // exclude CSS class

                exclude: ".noExl",

                name: "Worksheet Name",

                exclude_links: false,

                exclude_inputs: false,

                filename: "Cumulo Denuncias", //do not include extension

                fileext: ".xls" // file extension

            });

        });

    </script>

</body>



</html>