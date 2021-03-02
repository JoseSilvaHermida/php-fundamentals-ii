<?php

define('BASE_DIR', __DIR__);
spl_autoload_register(
    function ($class) {
        $fn = str_replace('\\', '/', $class) . '.php';
        require(BASE_DIR . '/src/' . $fn);
    }
);

use \Server\VPS;

$vps = new VPS('newvps', '8GB', '16GB');
var_dump($vps);

if ( $vps->create(true) ) {
    echo "VPS created\n";
}
else {
    echo "VPS couldn't be created\n";
}

sleep(1);

if ( $vps->delete() ) {
    echo "VPS removed\n";
}
else {
    echo "VPS couldn't be removed\n";
}

