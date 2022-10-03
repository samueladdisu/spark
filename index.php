<?php

require 'vendor/autoload.php';

use SparkPost\SparkPost;
use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

$httpClient = new GuzzleAdapter(new Client());
$sparky = new SparkPost($httpClient, ['key' => '']);

$sparky->setOptions(['async' => false]);
$results = $sparky->transmissions->post([
  'options' => [
    'sandbox' => true
  ],
  'content' => [
    'from' => 'testing@sparkpostbox.com',
    'subject' => 'Oh hey!',
    'html' => '<html><body><p>Testing SparkPost - the world\'s most awesomest email service!</p></body></html>'
  ],
  'recipients' => [
    ['address' => ['email'=>'developers+php@sparkpost.com']]
  ]
]);