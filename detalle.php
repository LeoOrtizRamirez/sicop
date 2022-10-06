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

$crawler->filter('')->each(function ($node) {

    
});

// $crawler->filter('.epa')->each(function ($node) {
//     $encargado_solicitud_publicacion = $node->filter('.epa:nth-child(1)')->text();
//     echo $encargado_solicitud_publicacion;
//     echo '</br>';

//     $elaborador = $node->filter('.epa:nth-child(1)')->text();
//     echo $elaborador;
//     echo '</br>';

//     $encargado_solicitar_estudio = $node->filter('.epa:nth-child(1)')->text();
//     echo $encargado_solicitar_estudio;
//     echo '</br>';
// });



// body > div > div > div.cl_context > table:nth-child(6) > tbody > tr:nth-child(5) > td:nth-child(2) > b