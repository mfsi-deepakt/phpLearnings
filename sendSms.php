<?php
/**
 * MyClass File Doc Comment
 *
 * PHP version 7
 *
 * @category MyClass
 * @package  MyPackage
 * @author   Deepak Tomar <sdeepak2610@gmail.com>
 * @license  General public license
 * @link     www.xyz.com
 */
require 'vendor/autoload.php';
$sid  
    = "AC0ca326e2f94762992fddb47efb2dd624"; // Your Account SID from www.twilio.com/console
$token 
    = "1934b9587b8bdfd046eb3aa032873a13"; // Your Auth Token from www.twilio.com/console

$client = new Twilio\Rest\Client($sid, $token);
$message = $client->messages->create(
    '+918052728442', // Text this number
    array(
    'from' => '+18324632633', // From a valid Twilio number
    'body' => 'Hey vps kya kr rhe ho!'
    )
);

print "Message sent!";
