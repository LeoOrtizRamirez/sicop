<?php
$concurso_enlace = $_GET['concurso_enlace'];
$concurso_enlace = ($concurso_enlace . '&cartelSeq=00');

include 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerEscaping;
use Symfony\Component\HttpClient\HttpClient;

$url = $concurso_enlace;

$client = new Client(HttpClient::create(array(
    'headers' => array(
        // 'Host' => 'www.sicop.go.cr',
        'Referer' => 'https://www.sicop.go.cr',
    ),
)));

$crawler = $client->request('GET', $url);

// $crawler->filter('td.eptdl')->each(function ($node) {

// });

$numero_proceso = $crawler->filter('td.eptdl b:nth-child(1)')->text();
echo $numero_proceso;
echo '</br>';

$estado = $crawler->filter('font.epfred')->text();
echo $estado;
echo '</br>';

$encargado_solicitud_publicacion = $crawler->filter('.epa:nth-child(1)')->text();
echo $encargado_solicitud_publicacion;
echo '</br>';

$elaborador = $crawler->filter('.epa:nth-child(1)')->text();
echo $elaborador;
echo '</br>';

$encargado_solicitar_estudio = $crawler->filter('.epa:nth-child(1)')->text();
echo $encargado_solicitar_estudio;
echo '</br>';
