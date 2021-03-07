<?php

define('BASE_DIR', __DIR__);
spl_autoload_register(
    function ($class) {
        $fn = str_replace('\\', '/', $class) . '.php';
        require(BASE_DIR . '/src/' . $fn);
    }
);

use \Machine\VPS;
use \Machine\Hypervisor;

$vps = new VPS('newvps', '8GB', '16GB');
echo "toString: [".$vps."]\n";

if ( $vps->create(true) ) {
    echo "VPS created and started\n";
}
else {
    echo "VPS couldn't be created\n";
}

$hypervisor = new Hypervisor('hypervisor', 'myDatastore',$vps );
echo "\n----------\n";
var_dump($hypervisor);
echo "----------\n\n";

printf("Hypervisor [%s] datastore: %s\n", $hypervisor->getName(), $hypervisor->getDatastore());

sleep(1);

printf("Hypervisor exists: %s, VPS exists: %s\n", $hypervisor->exists(), $vps->exists());

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

try {
    $vps->opticalDrive = 'Pioneer';
    printf("Mouse: %s\n", $vps->mouse);
}
catch ( Exception $e ) {
    printf("Oops, something went wrong! %s [%s]\n", $e->getMessage(), $e->getCode());
}
finally {
    echo "That wasn't so bad, was it?\n";
}

exit(0);
