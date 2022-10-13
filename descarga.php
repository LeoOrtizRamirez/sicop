<?php
include 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerEscaping;
use Symfony\Component\HttpClient\HttpClient;

$client = new Client(HttpClient::create(array(
	'headers' => array(
		'Host' => 'www.sicop.go.cr',
		'Origin' => 'https://www.sicop.go.cr',
		'Referer' => 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ603.jsp?cartelNo=20221001821&cartelSeq=00'
	),
)));
