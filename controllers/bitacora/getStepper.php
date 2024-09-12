<?php
include('../../db/db.php');
$link = connect();

if (isset($_POST['folio']) && !empty($_POST['folio'])) {
    $folio = trim($_POST['folio']);
    $folio = $link->real_escape_string($folio);

    $query = "SELECT cat_estatus.estatus
            FROM denuncia
            INNER JOIN cat_estatus ON denuncia.estatus = cat_estatus.id where folio = '$folio'";
    if (!$resultado = $link->query($query)) {
        //echo $link->error . "<br>";
        exit;
    } else {
        if ($resultado->num_rows == 1) {

            $activeStep1 = '';
            $activeStep2 = '';
            $activeStep3 = '';
            $activeStep4 = '';

            //var auxiliares
            $proceso = '';
            $conclusion = '';

            $estatus = $resultado->fetch_assoc();

            switch ($estatus['estatus']) {
                case 'Enviado':
                    $activeStep1 = 'active done';
                    break;

                case 'Clasificado':
                    $activeStep1 = 'active done';
                    $activeStep2 = 'active done';
                    break;


                case 'Improcedente':
                case 'Concluido Promovente':
                case 'Concluido Secretaria de la Funcion Publica':
                case 'Desechada':
                    $activeStep1 = 'active done';
                    $activeStep2 = 'active done';
                    $activeStep3 = 'active done';
                    $activeStep4 = 'active done';
                    $conclusion = $estatus['estatus'];
                    break;

                    //entran todos los estatus que tengan que ver con el proceso de la denuncia
                default:
                    $activeStep1 = 'active done';
                    $activeStep2 = 'active done';
                    $activeStep3 = 'active done';
                    $proceso = $estatus['estatus'];
                    break;
            }
            if($conclusion == 'Desechada'){
                $conclusion = 'Improcedente';
            }
            echo
                '<div class="md-stepper-horizontal green">
                <div class="md-step ' . $activeStep1 . '">
                    <div class="md-step-circle"><span>1</span></div>
                    <div class="md-step-title">Enviado</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <div class="md-step ' . $activeStep2 . '">
                    <div class="md-step-circle"><span>2</span></div>
                    <div class="md-step-title">Clasificado</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <div class="md-step ' . $activeStep3 . '">
                    <div class="md-step-circle"><span>3</span></div>
                    <div class="md-step-title">Proceso</div>
                    <div class="md-step-optional">' . $proceso . '</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
                <div class="md-step ' . $activeStep4 . '">
                    <div class="md-step-circle"><span>4</span></div>
                    <div class="md-step-title">Conclusión</div>
                    <div class="md-step-optional">' . $conclusion . '</div>
                    <div class="md-step-bar-left"></div>
                    <div class="md-step-bar-right"></div>
                </div>
            </div>
            
            <div>';
            //<h6>'.$estatus['estatus'].':</h6>
            //Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero impedit dignissimos error assumenda repudiandae voluptates expedita eligendi, corporis perspiciatis quo.
            //</div>
            //';
        }
    }
}
