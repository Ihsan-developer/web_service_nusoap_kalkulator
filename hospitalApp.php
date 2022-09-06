<?php

/**<?php
 * 
 * Client.php
require 'vendor/autoload.php';

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$namespace = str_replace('client.php','server.php', $namespace);
$client = new nusoap_client($namespace);

$response = $client->call('get_message', array(
    'name' => 'Ihsan'
));
echo $response;

echo '<br>';
$response = $client->call('get_diagnose', array(
    'category' => 'basic',
    'name' => 'Jack'
));
echo $response;

echo '<br>';
$data = array(
    'ID' => '1',
    'first_name' => 'Jack',
    'last_name' => 'Sparrow',
    'birthdate' => '1994-03-23',
);
$response = $client->call('reformat_data', array(
    'medicalpatient' => $data
));
echo '<pre>';
print_r($response);
echo '</pre>'; */


/**<?php
 * 
 * server.php
require 'vendor/autoload.php';
$server = new soap_server();

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$server->configureWSDL('HospitalApp');
$server->wsdl->schemaTargetNamespace = $namespace;

$server->wsdl->addComplexType(
    'medicalpatient',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'ID' => array('name' => 'ID', 'type' => 'xsd:string'),
        'first_name' => array('name' => 'first_name', 'type' => 'xsd:string'),
        'last_name' => array('name' => 'last_name', 'type' => 'xsd:string'),
        'birthdate' => array('name' => 'birthdate', 'type' => 'xsd:date'),
        'age' => array('name' => 'age', 'type' => 'xsd:number_format'),
    ));

function get_message($name) {
    return "Welcome $name";
}

$server->register('get_message',
    array('name' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Hello World Sederhana'
);

function get_diagnose($category, $name) {
    if($category == 'basic') {
        $medicalrecord = join(', ', array(
            "Fever", "Influenza", "Allergic of Antibiotic"
        ));
        return "The patient: $name diagnoses are: $medicalrecord";
    }
    else {
        return 'The patient doesn\'t have basic medical record';
    }
}

$server->register('get_diagnose',
    array(
        'category' => 'xsd:string',
        'name' => 'xsd:string'
    ),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Get Diagnose Sederhana'
);

function reformat_data($medicalpatient) {
    $medicalpatient['ID'] = 'KODE: ' . $medicalpatient['ID'];
    $medicalpatient['first_name'] = 'Mr. ' . $medicalpatient['first_name'];
    $medicalpatient['age'] = date('Y-m-d') - $medicalpatient['birthdate'];

    return $medicalpatient;
}

$server->register('reformat_data',
    array('medicalpatient' => 'tns:medicalpatient'),
    array('return' => 'tns:medicalpatient'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode mengubah data pasien'
);

$server->service(file_get_contents("php://input"));
exit();

 */
?>