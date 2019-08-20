<?php

use Elasticsearch\ClientBuilder;

require '../vendor/autoload.php';


$hosts = [
    '192.168.33.70:9200',         // IP + Port
];
$client = ClientBuilder::create()
    ->setHosts($hosts)
    ->build();


$params = [
    'index' => 'my_index',
    'type' => 'my_type',
    'body' => [
        'query' => [
            'match' => [
                'testField' => 'abc'
            ]
        ]
    ]
];

$response = $client->search($params);

echo "<pre>";
print_r($response);