<?php
require '../assets/dompdf/autoload.inc.php';

Dompdf\Autoloader::register();
ob_start();

if (isset($_GET['folio']) && !empty($_GET['folio']) && isset($_GET['fecha']) && !empty($_GET['fecha'])) {
    include "template.php";
}

$dompdf = new Dompdf\Dompdf();
$dompdf -> set_paper("A4", "portrait");
$dompdf->loadHtml(ob_get_clean());

$dompdf->render();
$dompdf->stream('Constancia.pdf');