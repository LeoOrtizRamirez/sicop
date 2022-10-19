<?php

$link = $_GET['link'];
$link = ($link . '&cartelSeq=00');
// echo $linkDetalle;

$opts = [
    "http" => [
        "method" => "GET",
        "header" => "Referer: https://www.sicop.go.cr"
    ]
];

// DOCS: https://www.php.net/manual/en/function.stream-context-create.php
$context = stream_context_create($opts);
// Open the file using the HTTP headers set above
// DOCS: https://www.php.net/manual/en/function.file-get-contents.php
$content = file_get_contents($link, false, $context);
echo $content;

// require 'vendor/autoload.php';

// use Goutte\Client;

// $client = new Client();

// $crawler = $client->request("GET", $content);

// echo($crawler);
