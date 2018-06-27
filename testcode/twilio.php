<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once '/path/to/vendor/autoload.php';

use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/console
$sid    = "AC09abf9989ca5cb66f219c5a4c4108bd2";
$token  = "your_auth_token";
$twilio = new Client($sid, $token);

$binding = $twilio->notify->v1->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                              ->bindings
                              ->create("00000001", "sms", "+1651000000000");

print($binding->sid);
