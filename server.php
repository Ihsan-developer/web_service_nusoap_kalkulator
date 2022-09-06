<?php

require 'vendor/autoload.php';
require_once('vendor/econea/nusoap/src/nusoap.php');
$server = new soap_server();

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$server->configureWSDL('Kalkulator Application by Ihsan');
$server->wsdl->schemaTargetNamespace = $namespace;
$server->register('jumlahkan',
    array('name' => 'xsd:integer'),
    array('return' => 'xsd:integer'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode perhitungan Sederhana'

);
$server->register('kurangkan',
    array('name' => 'xsd:integer'),
    array('return' => 'xsd:integer'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode perhitungan Sederhana'

);

$server->register('kalikan',
    array('name' => 'xsd:integer'),
    array('return' => 'xsd:integer'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode perhitungan Sederhana'

);

$server->register('bagikan',
    array('name' => 'xsd:float'),
    array('return' => 'xsd:float'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode perhitungan Sederhana'

);

$server->register('modulus',
    array('name' => 'xsd:integer'),
    array('return' => 'xsd:integer'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode perhitungan Sederhana'

);

$server->register('get_message',
    array('name' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Hello World Sederhana'
);


// Membuat method operasi matematika dasar
function jumlahkan($x, $y) {
    return $x + $y;
}
 
function kurangkan($x, $y) {
    return $x - $y;
}

function kalikan($x, $y) {
    return $x * $y;
}

function bagikan($x, $y) {
    return $x / $y;
}

function modulus($x, $y) {
    return $x % $y;
}

// Membuat method welcome message
function get_message($name) {
    return "Welcome $name";
}

$server->service(file_get_contents("php://input"));
exit();
?>