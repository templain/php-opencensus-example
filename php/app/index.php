<?php
require __DIR__.'/vendor/autoload.php';

//use OpenCensus\Trace\Exporter\OneLineEchoExporter;
use OpenCensus\Trace\Exporter\ZipkinExporter;
use OpenCensus\Trace\Tracer;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Utils;
use OpenCensus\Trace\Integrations\Guzzle\Middleware;

//$exporter = new OneLineEchoExporter();
$exporter = new ZipkinExporter('my_app', 'http://zipkin:9411/api/v2/spans');
Tracer::start($exporter);

$stack = new HandlerStack();
$stack->setHandler(Utils::chooseHandler());
$stack->push(new Middleware());
$client = new Client(['handler' => $stack]);

Tracer::inSpan(['name' => 'outer'], function () use ($client) {
    // some code
    $res = $client->request('GET', 'http://nginx/api/entries/');
    $entries = json_decode((string)$res->getBody(), true);
    $authors = [];
    Tracer::inSpan(['name' => 'inner'], function () use ($client, $entries, &$authors) {
        foreach ($entries as $entry) {
            $res = $client->request('GET', 'http://nginx/api/users/' . $entry['author']. '/');
            // some code
            $user = json_decode((string)$res->getBody(), true);
            $authors[] = $user['name'];
        }
    });
    // some code
    echo 'AUTHORS=' . implode(",", $authors) . PHP_EOL;
});
