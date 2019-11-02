<?php

//require_once __DIR__ . '/vendor/autoload.php';

include(__DIR__ . '/mpdf/mpdf.php');

$mpdf = new Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output('arquivo.pdf', 'I');

?>