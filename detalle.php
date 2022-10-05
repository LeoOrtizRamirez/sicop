<?php
$concurso_enlace = $_GET['concurso_enlace'];
$concurso_enlace = ($concurso_enlace . '&cartelSeq=00');

include 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

$url = $concurso_enlace;

$client = new Client(HttpClient::create(array(
    'headers' => array(
        // 'Host' => 'www.sicop.go.cr',
        'Referer' => 'https://www.sicop.go.cr',
    ),
)));

$crawler = $client->request('GET', $url);
var_dump($crawler);
