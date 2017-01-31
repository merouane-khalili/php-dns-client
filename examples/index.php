<?php

require __DIR__ . '/../vendor/autoload.php';

use DNS\Protocols\DnsProtocol;
use DNS\Results\DnsAresult;

$dns = new DnsProtocol();
$dns->setServer('8.8.8.8');
$result = $dns->Query('www.google.com','A');

/* @var $result DNS\DnsResponse */
foreach ($result->getResourceResults() as $resource) {

    if ($resource instanceof DnsAresult) {
        echo $resource->getDomain().' - '.$resource->getIpv4().' - '.$resource->getTtl()."\n";
    }
}
