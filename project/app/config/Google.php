<?php

namespace App\config;
require __DIR__ . "/../../vendor/autoload.php";
use Google\Client;


class Google
{
    private static $client = null;
    public static function getClient()
    {
        if (self::$client === null) {

            self::$client = new Client();
            self::$client->setClientId('324854061920-8ufcmrcrlqsp7rsublkbd426lorvgedp.apps.googleusercontent.com');
            self::$client->setClientSecret('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');
            self::$client->setRedirectUri('http://localhost/google-callback');
            self::$client->addScope("email");
            self::$client->addScope("profile");
        }
        return self::$client;
    }
}