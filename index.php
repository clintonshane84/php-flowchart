<?php
// Run Composer's Autoloader
include_once("vendor/autoload.php");


use Clinton\Wright\PHPFlowchart\Draw\DrawFlowchartDecision;
use Clinton\Wright\PHPFlowchart\Constants\Server;

Server::setServerPath(dirname(__FILE__));

$decision = new DrawFlowchartDecision();
$decision->draw();
