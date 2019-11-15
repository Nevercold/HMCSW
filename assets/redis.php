<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 15.11.2019 at 18:59
 */


// mysql login data
define('redis-ip', '');
define('redis-port', '');
define('redis-pw', '');

$redisenabled = false;
if ($redisenabled == true) {
    Predis\Autoloader::register();
    $redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => redis - ip,
        "port" => redis - port,
        "password" => redis - pw
    ));
}