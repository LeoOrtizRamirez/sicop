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

$crawler->filter('div.cl_context > table:nth-child(45) tr:not(:first-child)')->each(function ($node) {
	// Filtrar datos
	$info_eptdc = '';
	if ($info_eptdc = $node->filter('tr td.eptdc')->count()) {
		$info_eptdc = $node->filter('tr td.eptdc')->text();
	} else {
		$info_eptdc = 'Campo vacio';
	}

	$info_eptdl = '';
	if ($info_eptdl = $node->filter('td.eptdl')->count()) {
		$info_eptdl = $node->filter('td.eptdl')->text();
	} else {
		$info_eptdl = 'Campo vacio';
	}

	$info_eptdl_a = 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008';

	$info_eptdl_a_txt = '';
	if ($info_eptdl_a_txt = $node->filter('td a')->count()) {
		$info_eptdl_a_txt = $node->filter('td a')->text();
	} else {
		$info_eptdl_a_txt = 'Campo vacio';
	}

?>
	<!DOCTYPE html>
	<html>

	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" href="styles.css">
	</head>

	<body class="body">
		<header id="header">
			<div class="row">
				<div class="col-2 sidebar">
					<h4 class="volver">Descarga de documentos</h4>
					</ul>
				</div>
			</div>
		</header>
	<?php
	echo "<table class='table table-striped '>
    <thead class='thead-dark'>
    <tr>
    <th>No</th>
    <th>Tipo Documento</th>
    <th>Nombre del documento</th>
    <th>Archivo adjunto</th>
    </tr>
    </thead>
        <tr>
        <td> $info_eptdc </td>
        <td> Documentos del cartel </td>
        <td> $info_eptdl_a_txt </td>
		<td> <a href='descarga.php?info_eptdl_a=$info_eptdl_a' > Descargar </a> </td>
        </tr>
    </table>";
});
