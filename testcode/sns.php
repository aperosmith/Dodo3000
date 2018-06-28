<?php
require dirname( __FILE__ ) . '/vendor/autoload.php';
use Aws\Sns\SnsClient;

$client = SnsClient::factory(
    array(
        'profile' => 'Dieu',
        'region'  => 'eu-west-1',
        'version' => 'latest',
    )
);

$message = array_pop( $argv );

$payload = array(
    'TopicArn' => 'arn:aws:sns:eu-west-1:063295812460:Dieu',
    'Message' => $message,
    'MessageStructure' => 'string',
);
$client->publish( $payload );
