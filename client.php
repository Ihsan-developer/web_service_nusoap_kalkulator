<?php
 
require 'vendor/autoload.php';
require 'vendor/econea/nusoap/src/nusoap.php';

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$namespace = str_replace('client.php','server.php', $namespace);
$client = new nusoap_client($namespace);

$response = $client->call('get_message', array(
    'name' => 'Ihsan'
));
echo $response;

echo '<br>';

// Inisiasi variabel angka
$bil1 = 20;
$bil2 = 15;

// Penjumlahan
$result1 = $client->call('jumlahkan', array('x' => $bil1, 'y' => $bil2));
 
echo "<p>Hasil penjumlahan ".$bil1." dan ".$bil2." adalah ".$result1."</p>";

// Pengurangan
$result2 = $client->call('kurangkan', array('x' => $bil1, 'y' => $bil2));
 
echo "<p>Hasil pengurangan ".$bil1." dan ".$bil2." adalah ".$result2."</p>";

// Perkalian
$result3 = $client->call('kalikan', array('x' => $bil1, 'y' => $bil2));
 
echo "<p>Hasil perkalian ".$bil1." dan ".$bil2." adalah ".$result3."</p>";

// Pembagian
$result4 = $client->call('bagikan', array('x' => $bil1, 'y' => $bil2));
 
echo "<p>Hasil pembagian ".$bil1." dan ".$bil2." adalah ".$result4."</p>";

// Modulus
$result5 = $client->call('modulus', array('x' => $bil1, 'y' => $bil2));
 
echo "<p>Hasil modulus ".$bil1." dan ".$bil2." adalah ".$result5."</p>";

?>