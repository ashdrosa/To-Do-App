<?php

require_once('vendor/autoload.php');
$f3 = \Base::instance();
$f3->config('app/config/config.ini');
$f3->config('app/config/routes.ini');
$f3->config('app/config/db.ini');

[$host, $port] = explode(':', $f3->get('DB_HOST'));

$f3->set('DB', new \DB\SQL(
    "mysql:host={$host};port={$port};dbname={$f3->get('DB_NAME')}",
    $f3->get('DB_USER'),
    $f3->get('DB_PASS')

));


$f3->run();
