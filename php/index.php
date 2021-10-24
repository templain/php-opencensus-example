<?php
require __DIR__.'/vendor/autoload.php';

//use OpenCensus\Trace\Exporter\OneLineEchoExporter;
use OpenCensus\Trace\Exporter\ZipkinExporter;
use OpenCensus\Trace\Tracer;

//$exporter = new OneLineEchoExporter();
$exporter = new ZipkinExporter('my_app', 'http://zipkin:9411/api/v2/spans');
Tracer::start($exporter);

Tracer::inSpan(['name' => 'test-span'], function () {
    sleep(1);
    echo 'hello' . PHP_EOL;
});

