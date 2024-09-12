<!doctype html>
<html lang="es">

<head>
    <title>SIDEC - Acuse</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/b4.css">
</head>

<body>
    <div class="mb-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="text-right">
                    <img src="../assets/img/zacatecas_logo_veda.png" class="mb-5 w-50">
                </div>
                <div class="text-left">
                    <h5>Acuse de recibo</h5>
                    <hp class="mb-4">A quien corresponda:</hp>
                </div>
                
                <p class="text-justify">
                    Su denuncia fue ingresada al Sistema (SIDEC) el día <span class="font-weight-bold"><?php echo $_REQUEST['fecha'] ?></span>.
                    A partir de este momento podrá consultar el avance del proceso en la opción de seguimiento con el siguiente número de folio:
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center pt-3 pb-5">
                <h3>Folio &nbsp;</h3><span><?php echo $_REQUEST['folio'] ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-justify">
                <p>
                    La información referente a su caso y el acuse de recibo fueron enviados a la cuenta de
                    correo electrónico que nos proporcionó al momento de presentar su denuncia o manifestación ciudadana,
                    si no recibió el correo, revise en su correo no deseado,
                    si no proporcionó una cuenta de correo electrónico, puede descargar el acuse de recibo en este momento.
                </p>
                <p>
                    La información es turnada a la instancia competente y en su caso puede resultar
                    en una sanción o inhabilitación hacia el servidor público reportado. Además de los asuntos que se
                    reciben a través del Sistema (SIDEC) existen otros canales para la recepción de
                    asuntos relacionados con quejas, denuncias y peticiones, estos canales son: Buzones fijos y móviles,
                    Vía telefónica, Redes sociales y Directamente en la Secretaría de la Función Pública.
                </p>
            </div>
        </div>
    </div>
</body>

</html>