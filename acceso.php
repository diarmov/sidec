<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIDEC - Acceso al sistema</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/util.min.css">
    <link rel="stylesheet" href="assets/css/main.min.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <div id="form_ingresar" class="login100-form flex-sb flex-w">
                    <div class="d-flex justify-content-center mb-5">
                        <img src="assets/img/zacatecas_logo_veda.png" class="w-75 img-fluid" alt="">
                    </div>
                    <span class="login100-form-title p-b-20">
                        Acceso al sistema
                    </span>


                    <div class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="text" id="username" name="username" placeholder="Username" autofocus>
                        <span class="focus-input100"></span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <!--<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot?
							</a>
						</div>
					</div>-->

                    <div class="container-login100-form-btn m-t-17">
                        <button id="btn_ingresar" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>
                <br>
                <div id="alerta" class="alert alert-danger mt-2 alert-dismissible fade show" role="alert" style="display: none;">
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
			================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $("#btn_ingresar").on("click", function() {
            let nombreUsuario = $("#username").val();
            let password = $("#password").val();

            if ($.trim(nombreUsuario).length > 0 && $.trim(password).length > 0) {
                var formData = new FormData();

                formData.append('username', nombreUsuario);
                formData.append('password', password);

                $.ajax({
                    url: 'sessions/user.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        //$('#gif_estatuto').show();
                    },
                    success: function(response) {
                        //console.log("RESPUESTA 1" + response);
                        if (response == 1) {
                            //enviar al listado
                            window.location.href = "views/verDenuncia.php";
                        } else {
                            $("#username").val('');
                            $("#password").val('');
                            $('#alerta').html('<p>Nombre de usuario o contraseña incorrecta, intenta nuevamente.</p><br><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                            $('#alerta').show();
                        }
                    },
                    complete: function() {
                        //$('#gif_estatuto').hide();
                    },
                    error: function(response) {
                        alert("Problemas al tratar de enviar el formulario");
                    }
                });
            }
        });
    </script>
</body>

</html>