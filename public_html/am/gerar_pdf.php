<?php
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $html = file_get_contents('aposta.html');
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream("bilhete.pdf", array(true));
    ?>