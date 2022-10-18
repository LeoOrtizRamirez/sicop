<?php
include 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerEscaping;
use Symfony\Component\HttpClient\HttpClient;

$concurso_enlace = $_GET['concurso_enlace'];
$concurso_enlace = ($concurso_enlace . '&cartelSeq=00');

$client = new Client(HttpClient::create(array(
	'headers' => array(
		// 'Host' => 'www.sicop.go.cr',
		'Referer' => 'https://www.sicop.go.cr',
	),
)));

$crawler = $client->request('GET', $concurso_enlace);

$crawler->filter('table:nth-child(42) tr')->each(function ($node) {
	//Filtrar datos
	$no = $node->filter('td')->text();
	// body > div > div > div.cl_context > table:nth-child(42) > tbody > tr:nth-child(2) > td:nth-child(1)
	echo $no . '5156515';
	echo '<br>';
	// $tipo_documento = $node->filter('tr:nth-child(2) > td:nth-child(2)')->text();
	// echo $tipo_documento;
	// echo '<br>';
	// $nombre_documento = $node->filter('tr:nth-child(2) > td:nth-child(3)')->text();
	// echo $nombre_documento;
	// echo '<br>';
	// $adjunto = $node->filter('tr:nth-child(2) > td:nth-child(4) > a')->text();
	// echo $adjunto;
});
