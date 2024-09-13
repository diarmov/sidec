<!doctype html>
<html lang="es">

<head>
    <title>SIDEC - Categoria de la Denuncia</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/cards.css">
    <link rel="stylesheet" href="../../assets/css/style.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
    <link rel="stylesheet" href="../../assets/css/map.css">
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
                                    <li><a class="text-white" href="#"> <i class="fa fa-envelope" style="color: #d37e77;"></i> Secretaría de la Función Pública del
                                            Estado de Zacatecas</a></li>
                                    <li><a class="text-white" href="#"> <i class="fa fa-phone" style="color: #d37e77;"></i> (492) 9256540</a></li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area shadow">
                <!--<div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 mr-5">
                            <div class="logo">
                                <a href="../../index.php">
                                    <img src="../../assets/img/zacatecas_logo.png" aria-label="logo" alt="" style=" width:20em;max-width: 20em;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-8">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="../../index.php">Página principal</a></li>
                                        <li><a href="categoriaDenuncia.php">Realiza una denuncia</a></li>
                                        <li><a href="seguimiento.html">Seguimiento a tu denuncia</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>-->
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="../../index.php">
                                    <img src="../../assets/img/zacatecas_logo_veda.png" aria-label="logo" alt="" style="max-width: 17em; padding-right: 10px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-9">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="../../index.php">Página principal</a></li>
                                        <li><a href="categoriaDenuncia.php">Denuncia Por Actos de Corrupción</a></li>
                                        <li><a href="seguimiento.html">Seguimiento A Tu Trámite</a></li>
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
    <div class="container mt-5 mb-5">
        <?php
        if (isset($_GET['type']) && !empty($_GET['type']) && is_numeric($_GET['type'])) {
            $type = $_GET['type'];
            if ($type == 1) {
                include("../templates/categorias/categorias_actos_corrupcion.php");
            } else if ($type == 2) {
                include("../templates/categorias/categorias_manifestaciones.php");
            } else {
                header('Location: ../../index.php');
            }
        } else {
            include("../templates/categorias/categorias_actos_corrupcion.php");
        }
        ?>
    </div>

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="../../assets/img/zacatecas_escudo_veda.png" aria-label="logo" alt="" style="max-width: 12em;">
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
                        <p class="copy_right text-center">

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end  -->

    <script src="../../assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.slicknav.min.js"></script>
    <script src="../../assets/js/navigation.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAh8noOCUSBNgkOJ5XQGQPxUg7lJtVFn4E&callback=initMap"></script>
    <script>
        $(function() {
            getMunicipiosAPI();
            $('#municipios').on("change", function() {
                $('#buzones').empty();
                let count = 1;
                let id = $('#municipios').find(":selected").val();
                $.getJSON("https://sidec.zacatecas.gob.mx/api-SAC/public/api/buzon/" + id, function(data) {
                    $.each(data, function(key, value) {
                        $('#buzones').append('<tr><td>' + count + '</td><td>' + value.nombre + '</td><td>' + value.direccion + '</td><td><a id="btn-table" href="../../views/ciudadano/crearDenuncia.php?name=' + value.nombre + '&idBuzon=' + value.id + '&cat_den=0">Denuncia en este buzón virtual</a></td></tr>');
                        count += 1;
                    });
                });
            });
        });

        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll < 250) {
                $("#sticky-header").removeClass("sticky");
                $('#back-top').fadeIn(500);
            } else {
                $("#sticky-header").addClass("sticky");
                $('#back-top').fadeIn(500);
            }
        });

        function getMunicipiosAPI() {
            let dropdown = $('#municipios');
            dropdown.empty();
            dropdown.append('<option selected="true" disabled>Elija un municipio</option>');
            dropdown.prop('selectedIndex', 0);
            $.getJSON("https://sidec.zacatecas.gob.mx/api-SAC/public/api/municipio", function(data) {
                $.each(data, function(key, value) {
                    dropdown.append($('<option></option>').attr('value', value.idMunicipio).text(value.nombre));

                })
            });
        }
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14
            });

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    //current position
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    }
                    //current position mark
                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: "Te encuentras aquí!"
                    });
                    //draw and center the map in current mark (position)
                    map.setCenter(pos);

                    var infoWindow = new google.maps.InfoWindow;

                    downloadUrl("../../controllers/maps/geolocalizacion.php", function(data) {
                        var xml = data.responseXML;
                        var markers = xml.documentElement.getElementsByTagName("marcador");
                        for (var i = 0; i < markers.length; i++) {
                            var name = markers[i].getAttribute("name");
                            var idbuz = markers[i].getAttribute("id");
                            var address = markers[i].getAttribute("address");
                            var type = markers[i].getAttribute("type");
                            var point = new google.maps.LatLng(
                                parseFloat(markers[i].getAttribute("lat")),
                                parseFloat(markers[i].getAttribute("lng")));
                            var html = "<span class='font-weight-bold text-success'>" + name + "</span><br/>" + address + "<br/><br/><b><a class='text-success' href='crearDenuncia.php?name=" + name + "&idBuzon=" + idbuz + "&cat_den=0'>Realizar denuncia en buzón virtual</a></b><br/><br/>";
                            var marker = new google.maps.Marker({
                                map: map,
                                title: name,
                                position: point,
                                icon: '../../assets/img/mailbox_.svg',
                            });

                            bindInfoWindow(marker, map, infoWindow, html);
                        }
                    });
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    //request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }

        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }
    </script>
</body>

</html>