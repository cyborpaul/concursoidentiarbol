<?php

$dni = $_GET['nro_documento'];

$url = "https://dni.optimizeperu.com/api/prod/persons/".$dni;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Token 3565b84db58e6f9672c00d80856c710267ebca23",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;

// Datos
/* $dni = $_GET['nro_documento'];
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Imxlb3dhbGRpcjIwMDBAZ21haWwuY29tIn0.6YribgI-hAXwmUuP3hfiAigCOepXafgPpWO2FFuITIg';

$json = file_get_contents('https://dniruc.apisperu.com/api/v1/dni/'.$dni.'?token='.$token);

$person = json_decode($json);



$datos=array(
    'dni'=> $person->dni,
    'nombres'=>$person->nombres,
    'apellidoMaterno'=>$person->apellidoPaterno,
    'apellidoPaterno'=>$person->apellidoMaterno
);

echo json_encode($datos, JSON_FORCE_OBJECT); */

?>
