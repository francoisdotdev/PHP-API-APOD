<?php

require 'vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();

$response = $client->request('GET', 'https://api.nasa.gov/planetary/apod?api_key=eSmx20HngcRpsw5jBfdVU3jQcvePfnXObw86dhUf');


$content = $response->getContent();

//parse le json en objet
$arrayDataClass = json_decode($content);
//pour l'objet
echo $arrayData->title;

//parse le json en array
$arrayData = json_decode($content, NULL, 512, JSON_OBJECT_AS_ARRAY);
//pour l'array
echo $arrayData['copyright'];

?>