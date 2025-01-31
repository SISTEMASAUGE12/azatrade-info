<?php
// Datos
$token = 'apis-token-3761.Yw35Vs-h-2tho8ldpdiwA-A0Q7DU82xL';
$ruc = '20605041419';

// Iniciar llamada a API
$curl = curl_init();

// Buscar ruc sunat
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.apis.net.pe/v1/ruc?numero=' . $ruc,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Referer: http://apis.net.pe/api-ruc',
    'Authorization: Bearer ' . $token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// Datos de empresas según padron reducido
$empresa = json_decode($response);
var_dump($empresa);

echo "<br><br><br>".$empresa->nombre."<br>";
echo $empresa->numeroDocumento."<br>";
echo $empresa->estado."<br>";
echo $empresa->condicion."<br>";
echo $empresa->direccion."<br>";
echo $empresa->ubigeo."<br>";
echo $empresa->ubigeo."<br>";
echo $empresa->viaTipo."<br>";
echo $empresa->viaNombre."<br>";
echo $empresa->zonaCodigo."<br>";
echo $empresa->zonaTipo."<br>";
echo $empresa->numero."<br>";
echo $empresa->interior."<br>";
echo $empresa->lote."<br>";
echo $empresa->dpto."<br>";
echo $empresa->manzana."<br>";
echo $empresa->kilometro."<br>";
echo $empresa->distrito."<br>";
echo $empresa->provincia."<br>";
echo $empresa->departamento."<br>";
echo $empresa->nombres."<br>";

?>