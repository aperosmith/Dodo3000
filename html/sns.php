<?php
require dirname( __FILE__ ) . '/vendor/autoload.php';
use Aws\Sns\SnsClient;

$client = SnsClient::factory(
    array(
        'profile' => 'Dodo3000',
        'region'  => 'eu-west-1',
        'version' => 'latest',
    )
);

$message = array_pop( $argv );

$payload = array(
    'TopicArn' => 'arn:aws:sns:eu-west-1:003852675037:Dodo3000',
    'Message' => 'message',
    'MessageStructure' => 'string',
);

$client->publish( $payload );
