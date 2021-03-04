<?php

define('BASE_DIR', __DIR__);
spl_autoload_register(
    function ($class) {
        $fn = str_replace('\\', '/', $class) . '.php';
        require(BASE_DIR . '/src/' . $fn);
    }
);

use \Machine\VPS;

$vps = new VPS('newvps', '8GB', '16GB');
echo "toString: [".$vps."]\n";

if ( $vps->create(true) ) {
    echo "VPS created\n";
}
else {
    echo "VPS couldn't be created\n";
}

echo "Starting the VPS...\n";
if ( ! $vps->start() ) {
    echo "Error starting VPS!\n";
    exit(1);
}

sleep(1);

echo "Generating report...\n";
$report = $vps->getReport();
echo "REPORT: ".$report->generate()."\n";

echo "Stopping the VPS...\n";
if ( ! $vps->stop() ) {
    echo "Error stopping VPS!\n";
    exit(2);
}

if ( $vps->delete() ) {
    echo "VPS removed\n";
}
else {
    echo "VPS couldn't be removed\n";
}

$vps->opticalDrive = 'Pioneer';

exit(0);
