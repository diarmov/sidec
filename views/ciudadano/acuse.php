<!doctype html>
<html lang="es">

<head>
    <title>SIDEC - Acuse</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/style.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
</head>

<body>
    <header>
        <div class="header-area ">
            <div class="header-top_area" style="background-color: #b14948;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope" style="color: #d37e77;"></i> Secretaría de la Función Pública del
                                            Estado de Zacatecas</a></li>
                                    <li><a href="#"> <i class="fa fa-phone" style="color: #d37e77;"></i> (492) 9256540</a></li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area shadow">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="#">
                                    <img src="../../assets/img/zacatecas_logo_veda.png" aria-label="logo" alt="" style="max-width: 17em; padding-right: 10px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-9">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#">Página Principal</a></li>
                                        <li><a href="#">Denuncia Por Actos de Corrupción</a></li>
                                        <li><a href="#">Seguimiento A Tu Trámite</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br>
    <div class="container mt-5 mb-5 rounded">
        <?php
        if (isset($_GET['folio']) && !empty($_GET['folio']) && isset($_GET['fecha']) && !empty($_GET['fecha'])) {
            $folio = $_GET['folio'];
            $fecha = $_GET['fecha'];

            echo
                '<div class="row shadow">
                <div class="col-md-1"></div>
                <div class="col-md-10 text-center">
                    <i class="fas fa-check-circle fa-10x text-success"></i>
                    <h5 class="display-4 pb-4">Denuncia recibida</h5>
                    <p>
                        Su denuncia fue ingresada al Sistema (SIDEC) el día <span class="text-danger font-weight-bold">' . $fecha . '</span>.
                        A partir de este momento podrá consultar el avance del proceso en la opción de seguimiento con el siguiente número de folio:
                    </p>
                </div>
                <div class="col-md-1"></div>
    
    
                <div class="col-md-1"></div>
                <div class="col-md-10 d-flex justify-content-center align-items-center mt-2 pt-5 pb-5">
                    <h3>Folio &nbsp;</h3><span class="border border-dark p-4 font-weight-bold">' . $folio . '</span>
                </div>
                <div class="col-md-1"></div>
    
    
                <div class="col-md-1"></div>
                <div class="col-md-10 text-center">
                    <p class="text-justify">
                        La información referente a su caso y el acuse de recibo fueron enviados a la cuenta de 
                        correo electrónico que nos proporcionó al momento de presentar su denuncia o manifestación ciudadana, 
                        si no recibió el correo revise en su correo no deseado, 
                        si no proporcionó una cuenta de correo electrónico puede descargar el acuse de recibo en este momento.
                    </p>
                    <a href="../../pdf/creator.php?folio=' . $folio . '&fecha=' . $fecha . '" type="button" class="btn btn-outline-danger mt-5 mb-5">Descargar el acuse de recibo</a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>

                <div class="col-md-10 bg-secondary rounded mt-5 p-5 text-justify">
                    <h4 class="text-white">¿Qué viene ahora?</h4>
                    <p class="text-white">
                        La información es turnada a la instancia competente y en su caso puede resultar 
                        en una sanción o inhabilitación hacia el servidor público reportado. Aparte de los asuntos que se 
                        reciben a través del Sistema (SIDEC) existen otros canales para la recepción de 
                        asuntos relacionados con quejas, denuncias y peticiones, estos canales son: Buzones fijos y móviles, 
                        Vía telefónica, Redes sociales y Directamente en la Secretaría de la Función Pública.
                    </p>
                </div>
                <div class="col-md-1"></div>
    
    
                <div class="col-md-1"></div>
                <div class="col-md-10 mt-5 mb-3 p-0 d-flex justify-content-end">
                    <a href="../../pdf/creator.php?folio=' . $folio . '&fecha=' . $fecha . '" id="btn_finalizar" class="btn btn-danger px-5">Finalizar</a>
                </div>
                <div class="col-md-1"></div>
            </div>';
        } else {
            echo '404 <br>
            <a href="../../index.php">Regresar al menú principal</a>';
        }
        ?>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.slicknav.min.js"></script>
    <script src="../../assets/js/navigation.min.js"></script>
    <script>
        $("#btn_finalizar").on("click", function(e) {
            $("#btn_finalizar").prop('disabled', 'disabled');
            setTimeout("window.location.href = '../../index.php';", 3000);
        });
    </script>
</body>

</html>