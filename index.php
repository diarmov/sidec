<!doctype html>
<html class="no-js" lang="ES">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema de denuncia ciudadana</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no, shrink-to-fit=no">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <script src="https://cdn.botpress.cloud/webchat/v2.1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/5d5305d1-c388-4368-b525-effcabb1fc0d/webchat/v2.1/config.js"></script>
    <link rel="stylesheet" href="assets/css/style.min.css">
    <style>
        @media screen and (max-width: 424px) {
            .slider_area {
                height: 550px;
            }

            .slider_area .single_slider {
                height: 550px;
            }

            .text_responsive {
                font-size: 10px;
            }

            .boxed-btn3 {
                padding: 10px 10px 10px 10px;
                margin: 1px 1px 1px 1px;
            }
        }
    </style>
</head>

<body>
    <!-- header-start -->
    <header>
        <div class="header-area">
            <div class="header-top_area" style="background-color: #696969">
                <div class="container">
                    <div class="row">
                        <!--<div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>-->
                        <div class="col-xl-12 col-md-12">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a class="text-white" href="#"> <i class="fa fa-envelope" style="color: #d37e77;"></i> Secretaría de la Función Pública del
                                            Estado de Zacatecas</a></li>
                                    <li><a class="text-white" href="#"> <i class="fa fa-phone" style="color: #d37e77;"></i> (492) 9256540</a></li>
                                    <!--<li><a href="acceso.php" id="iniciar_sesion"> <i class="fa fa-user"></i> Inicia sesión</a>-->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 mr-5">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="assets/img/zacatecas_logo_veda.png" class="img-fluid" aria-label="logo" alt="" style="max-width: 17em; padding-right: 10px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="#" disabled>Página principal</a></li>
                                        <li><a href="views/ciudadano/categoriaDenuncia.php">Denuncia Por Actos de Corrupción</a></li>
                                        <li><a href="views/ciudadano/seguimiento.html">Seguimiento A Tu Trámite</a></li>
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
    <!-- header-end -->

    <!-- slider_area_start -->
    <div id="carouselExampleInterval" class="carousel slide slider_area" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active single_slider slider_bg_1 ">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="slider_text">
                                    <h3 class="text-center">DENUNCIA ACTOS DE CORRUPCIÓN <br>
                                    </h3>
                                    <p class="text_responsive">
                                        El Sistema de Denuncia Ciudadana (SIDEC) del Estado de Zacatecas,
                                        es el medio para que cualquier ciudadano, pueda denunciar
                                        principalmente actos de corrupción que involucren a servidores
                                        públicos.
                                    </p>
                                    <a class="btn btn-lg text-white" style="background-color: #696969;" id="btn_listado_denuncia" href="#tipos_denuncia">Tipos de
                                        denuncias</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item single_slider slider_bg_2">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="slider_text">
                                    <h3>PRESENTA ALGUNA MANIFESTACIÓN CIUDADANA</h3>
                                    <p class="text_responsive">
                                        Cualquier ciudadano puede presentar una manifestación ciudadana
                                        relacionada con el actuar de los servidores públicos, obras públicas,
                                        así como de la ejecución de los diferentes programas sociales.
                                    </p>
                                    <a class="btn btn-lg text-white" style="background-color: #696969;" id="btn_listado_asuntos" href="#tipos_asuntos">Tipos de manifestaciones</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- slider_area_end -->

    <!-- service_area_start -->
    <div class="service_area" style="background-color: white;">
        <div class="container p-0 ">
            <div class="row no-gutters">
                <div class="col-xl-6 col-md-6" style="background-color: #696969">
                    <div class="single_service">
                        <div class="icon">
                            <i class="fas fa-hand-paper"></i>
                        </div>
                        <h3 class="pt-3">Denuncia actos de corrupción</h3>
                        <p>
                            Si observaste o sabes de un acto de corrupción cometido por un servidor público, denúncialo.
                        </p>
                        <div class="pb-5"></div>
                        <a href="views/ciudadano/categoriaDenuncia.php" class="btn btn-secondary">Presenta tu denuncia</a>

                    </div>
                </div>

                <div class="col-xl-6 col-md-6" style="background-color: #696969;">
                    <div class="single_service">
                        <div class="icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Seguimiento a tu denuncia o manifestación</h3>
                        <p>
                            Si ya presentaste tu denuncia o manifestación ciudadana, consulta el avance del trámite con el número de folio asignado por el sistema.
                        </p>
                        <a href="views/ciudadano/seguimiento.html" class="btn btn-secondary">Seguimiento</a>
                    </div>
                </div>
                <!--<div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i class="flaticon-first-aid-kit"></i>
                        </div>
                        <h3>Chamber Service</h3>
                        <p>Clinical excellence must be the priority for any health care service provider.</p>
                        <a href="#" class="boxed-btn3-white">Make an Appointment</a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!-- service_area_end -->

    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area" id="tipos_denuncia" style="padding-bottom: 100px; background-color: #F3F4F6;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="assets/img/actos_corrupcion.webp" class="w-100 h-50" alt="">
                        </div>
                        <!--<div class="thumb_2">
                            <img src="img/denuncia.jpg" alt="">
                        </div>-->
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h3>Actos de corrupción</h3>
                        <!--<h3>Best Care For Your <br>
                                Good Health</h3>-->
                        <p>Si fuiste víctima o testigo como ciudadano o servidor público en alguno de los
                            siguientes casos ¡Denuncialo!</p>
                        <ul>
                            <li><i class="fas fa-check" style="color: #696969;"></i>Cohecho </li>
                            <li><i class="fas fa-check" style="color: #696969;"></i>Desvío de recursos públicos</li>
                            <li><i class="fas fa-check" style="color: #696969;"></i>Abuso de funciones</li>
                            <li><i class="fas fa-check" style="color: #696969;"></i>Obstrucción de la justicia</li>
                            <li class="d-flex"><i class="fas fa-check" style="color: #696969;"></i> Conflicto de intereses</li>
                            <li class="d-flex"><i class="fas fa-check" style="color: #696969;"></i> Contratación indebida</li>
                            <li class="d-flex"><i class="fas fa-check" style="color: #696969;"></i> Desacato</li>
                            <li class="d-flex"><i class="fas fa-check" style="color: #696969;"></i> Simulación de acto jurídico</li>
                            <li class="d-flex"><i class="fas fa-check" style="color: #696969;"></i> Tráfico de influencias</li>
                            <li class="d-flex"><i class="fas fa-check" style="color: #696969;"></i> Encubrimiento</li>
                            <li class="d-flex"><i class="fas fa-check" style="color: #696969;"></i> Nepotismo</li>
                            <li class="d-flex"><i class="fas fa-check" style="color: #696969;"></i> Violaciones a la ley federal de austeridad republicana</li>
                        </ul>
                        <a href="views/ciudadano/categoriaDenuncia.php?type=1" class="btn btn-lg text-white" style="background-color: #696969;">Presenta tu denuncia</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->

    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area" id="tipos_asuntos" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h3>Manifestaciones Ciudadanas</h3>
                        <!--<h3>Best Care For Your <br>
                                Good Health</h3>-->
                        <p>
                            Sí recibiste un mal trato por parte de un servidor público al realizar un
                            trámite o servicio ante alguna dependencia o quieres realizar
                            una petición relacionada con programas sociales. ¡Manifiestalo!</p>
                        <ul>
                            <li><i class="fas fa-check" style="color: #696969;"></i>Queja </li>
                            <li><i class="fas fa-check" style="color: #696969;"></i>Petición</li>
                            <li><i class="fas fa-check" style="color: #696969;"></i>Mal uso de vehículo oficial</li>
                            <li><i class="fas fa-check" style="color: #696969;"></i>Otros</li>
                        </ul>
                        <a href="views/ciudadano/categoriaDenuncia.php?type=2" class="btn btn-small text-white mb-5" style="background-color: #696969;">Realiza tu manifestación ciudadana</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="assets/img/manifestaciones.webp" class="w-100 h-50" alt="">
                        </div>
                        <!--<div class="thumb_2">
                            <img src="img/denuncia.jpg" alt="">
                        </div>-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->


    <!-- offers_area_start -->
    <div class="our_department_area" style="background-color: #F3F4F6;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h2 class="mb-3">Dónde realizar mi trámite</h2>
                        <p>Ahora es más fácil presentar tu queja, denuncia, petición, sugerencia o reconocimiento por medio de las siguientes
                            opciones</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-globe fa-10x mt-3" style="color: #696969;"></i>
                        </div>
                        <div class="department_content d-flex justify-content-center align-items-center flex-column">
                            <h3>En línea</h3>
                            <p>24 hrs. / 7 días</p>
                            <a href="https://sidec.zacatecas.gob.mx" style="color: #696969;">sidec.zacatecas.gob.mx</a>
                            <div style="padding-bottom: 5.5rem;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-phone fa-10x mt-3" style="color: #696969;"></i>
                        </div>
                        <div class="department_content d-flex justify-content-center align-items-center flex-column">
                            <h3>Vía Telefónica</h3>
                            <p>Lunes a viernes de 8:00 - 15:30 hrs. </p>
                            <p><i class="fas fa-phone-volume mr-1"></i> 800 llamanos (5526266)</p>
                            <div style="padding-bottom: 4.2rem;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-map-marker-alt fa-10x mt-3" style="color: #696969;"></i>
                        </div>
                        <div class="department_content d-flex justify-content-center align-items-center flex-column">
                            <h3>Presencial</h3>
                            <p class="text-center">Circuito Cerro del Gato #1900, Edificio D, Ciudad Administrativa, Zacatecas, Zac. <br>Con un horario de lunes a viernes de 08:00 hrs a 15:30 hrs
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offers_area_end -->


    <!-- business_expert_area_start  -->
    <div class="business_expert_area pt-5 mt-5">
        <div class="business_tabs_area" style="background-color: #FFFFFF;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="nav" id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active business_a" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Preguntas frecuentes</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link business_a" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Seguimiento a tu denuncia</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link business_a" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Centro de Atención Ciudadana</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="border_bottom">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="business_info">
                                    <div>
                                        <i class="fas fa-thumbtack fa-5x" style="color: #696969;"></i>
                                    </div>
                                    <h3>Seguimiento a tu denuncia</h3>
                                    <p>
                                        Sí ya presentaste tu denuncia, sugerencia o reconocimiento,
                                        consulta el avance del trámite con el número de folio asignado por el sistema.
                                        <br>

                                        <strong>Ej. SIDEC-1-25032020-48</strong>
                                    </p>
                                    <div class="d-flex justify-content-center align-items-center pt-5 book_btn">
                                        <a href="views/ciudadano/seguimiento.html" class="btn btn-small text-white" style="background-color:#b04946; border-color: #b04946;"> Consulta</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="business_thumb">
                                    <img src="assets/img/seguimiento.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-md-8">
                                <div class="business_info">
                                    <div>
                                        <i class="fas fa-question fa-5x" style="color: #696969;"></i>
                                    </div>

                                    <h3>Preguntas frecuentes</h3>
                                    <a href="#" class="link collapsed" id="headingOne" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1"><i class="fas fa-plus"></i> ¿C&oacutemo puedo presentar mi
                                        denuncia? </a>
                                    <div id="collapse1" class="collapse">
                                        <div class="card-body text-justify">
                                            Las denuncias en contra de servidores públicos, personas físicas o empresas se pueden presentar a través
                                            del Sistema de Denuncia Ciudadana en la dirección electrónica https://sidec.zacatecas.gob.mx, vía telefónica al 01 800 llamanos (5526266),
                                            de forma escrita directamente en la Secretaría de la Función Pública del Estado de Zacatecas y
                                            en las oficinas de los órganos internos de control de las dependencias y entidades de la administración pública estatal.
                                        </div>
                                    </div>

                                    <br>

                                    <a href="#" class="link collapsed" id="headingtwo" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2"><i class="fas fa-plus"></i> Si tengo m&aacutes pruebas, ¿c&oacutemo
                                        las hago llegar? </a>
                                    <div id="collapse2" class="collapse">
                                        <div class="card-body text-justify">
                                            A través del Sistema de Denuncia Ciudadana o directamente ante la autoridad a la que fue turnada su denuncia.
                                        </div>
                                    </div>

                                    <br>

                                    <a href="#" class="link p-10 collapsed" id="headingthree" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3"> <i class="fas fa-plus"></i> ¿Qu&eacute elementos debe contener mi
                                        denuncia? </a>
                                    <div id="collapse3" class="collapse">
                                        <div class="card-body text-justify">
                                            De conformidad con el artículo 93 de la Ley General de Responsabilidades Administrativas, la denuncia
                                            debe contener los datos o indicios mínimos que permitan a la autoridad investigadora establecer la línea de investigación,
                                            para determinar la existencia de la falta administrativa y la presunta responsabilidad del servidor público;
                                            por tanto, la autoridad puede abstenerse de iniciar
                                            el procedimiento de investigación o en su caso, concluir y archivar la misma en el momento procesal oportuno.
                                        </div>
                                    </div>

                                    <br>

                                    <a href="#" class="link collapsed" id="headingfive" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5"><i class="fas fa-plus"></i> ¿Qu&eacute datos personales se recaban y
                                        para qu&eacute finalidad? </a>
                                    <div id="collapse5" class="collapse">
                                        <div class="card-body text-justify">
                                            Se solicitará: nombre completo, curp, rfc, correo electrónico, domicilio y teléfono, si es su deseo presentar la denuncia de manera anónima,
                                            se solicitará registre un correo electrónico o número de teléfono, con la finalidad de que la autoridad pueda contactarlo.
                                        </div>
                                    </div>

                                    <br>

                                    <!--<a href="#" class="link p-10 collapsed" id="headingsix" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6"> <i class="fas fa-plus"></i> ¿Por qué mi denuncia fue turnada a un
                                        órgano interno de control? </a>

                                    <div id="collapse6" class="collapse">
                                        <div class="card-body text-justify">
                                            <!--Las denuncias se turnan a los &oacuterganos internos de control de las
                                            dependencias u organismos auxiliares del Gobierno del Estado de
                                            M&eacutexico, donde ocurrieron los hechos irregulares denunciados o a las
                                            que se encuentran adscritos los servidores p&uacuteblicos denunciados.
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo accusamus esse quo placeat ad repudiandae voluptas, quaerat aliquid nobis aspernatur.
                                        </div>
                                    </div>

                                    <br>-->

                                    <a href="#" class="link collapsed" id="headingFour" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4"> <i class="fas fa-plus"></i> Despu&eacutes de ingresar mi denuncia,
                                        ¿Cómo se le puede dar seguimiento? </a>
                                    <div id="collapse4" class="collapse">
                                        <div class="card-body text-justify">
                                            A través del Sistema de Denuncia Ciudadana utilizando el número de folio que le haya proporcionado el sistema y consultar el seguimiento a la denuncia
                                        </div>
                                    </div>
                                </div><!-- Business_info-->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="business_info">
                                    <div>
                                        <i class="fas fa-city fa-5x" style="color: #696969;"></i>
                                    </div>
                                    <h3>Centro de Atención Ciudadana</h3>
                                    <p>Si tienes dudas comunicate a los siguientes télefonos:</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="business_thumb mt-5 pt-5">
                                    <ul>
                                        <li class="font-weight-bold">Teléfono. 492-925-6540</li>
                                        <br>
                                        <li>Atención sobre Denuncias por Actos de Corrupción</li>
                                        <li><i class="fas fa-phone-volume mr-1"></i> Extensión. 42441</li>
                                        <br>
                                    </ul>
                                    <ul>
                                        <li>Atención sobre Manifestaciones Ciudadanas</li>
                                        <li><i class="fas fa-phone-volume mr-1"></i> Extensión. 42260 al 42264</li>
                                    </ul>
                                    <ul class="mt-3">
                                        <li>Línea 800 sin costo</li>
                                        <li><i class="fas fa-phone-volume mr-1"></i> 800 llamanos (55262667)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- business_expert_area_end  -->

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="assets/img/zacatecas_escudo_veda.png" aria-label="logo" alt="" style="max-width: 12em;">
                                </a>
                            </div>
                            <p>
                                Sistema de denuncia ciudadana
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a rel="noreferrer" href="https://www.facebook.com/funcionpublica.zac/" target="_blank">
                                            <i class="fab fa-facebook-f" aria-label="facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="noreferrer" href="https://twitter.com/SFP_Zac" target="_blank">
                                            <i class="fab fa-twitter" aria-label="twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Relacionados
                            </h3>
                            <ul>
                                <li><a rel="noreferrer" href="http://funcionpublica.zacatecas.gob.mx/" target="_blank">Secretaría de la Función Pública</a></li>
                                <li><a rel="noreferrer" href="https://sidec.zacatecas.gob.mx/avisos/AVISO DE PRIVACIDAD INTEGRAL SIDEC.docx" target="_blank">Aviso de privacidad integral</a></li>
                                <li><a rel="noreferrer" href="https://sidec.zacatecas.gob.mx/avisos/AVISO DE PRIVACIDAD SIMPLIFICADO.SIDEC.docx" target="_blank">Aviso de privacidad simplificado</a></li>
                                <!--<li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>-->
                            </ul>

                        </div>
                    </div>
                    <!--<div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Titulo II
                            </h3>
                            <ul>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                                <li><a href="#">test</a></li>
                            </ul>
                        </div>
                    </div>-->
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Dirección
                            </h3>
                            <!--<p>
                                Circuito Cerro del Gato #1900, Edificio D,
                                Ciudad Administrativa,
                                Zacatecas, Zacatecas.<br> <br>
                                +52 492 869 2161 <br>
                                test@test.com
                            </p>-->
                            <p>
                                Circuito Cerro del Gato #1900, Edificio D,
                                Ciudad Administrativa,
                                Zacatecas, Zacatecas.<br> <br>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <!--<p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --
                            Copyright &copy;
                            2020 All rights reserved | This
                            template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" rel="noopener">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end  -->
    <!-- JS here -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script>
        $('#btn_listado_denuncia').on('click', function(e) {
            e.preventDefault();
            var target = this.hash,
                $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 260
            }, 1000);
        });
        $('#btn_listado_asuntos').on('click', function(e) {
            e.preventDefault();
            var target = this.hash,
                $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 260
            }, 1000);
        });
        $('.carousel').carousel("cycle");
    </script>
</body>

</html>