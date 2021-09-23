<?php
// Datos
$token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
$dni = $_GET['nro_documento'];

// Iniciar llamada a API
$curl = curl_init();

// Buscar dni
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 2,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array('Referer: https://apis.net.pe/consulta-dni-api','Authorization: Bearer' . $token
  ),
));

$response = curl_exec($curl);

curl_close($curl);

echo $response;
// Datos listos para usar



/* $datos=array(
    'dni'=> $persona->numeroDocumento,
    'nombre'=>$persona->nombres,
    'apellidoMaterno'=>$persona->apellidoPaterno,
    'apellidoPaterno'=>$persona->apellidoMaterno
);

echo json_encode($datos, JSON_FORCE_OBJECT); */

?>