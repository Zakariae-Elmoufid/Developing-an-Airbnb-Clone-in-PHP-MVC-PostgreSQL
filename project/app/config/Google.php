<?php
namespace App\config;

use Dotenv\Dotenv;
use Google\Client;
use Exception;

class Google
{
    private static $client = null;

    public static function getClient(): Client
    {
        if (self::$client === null) {
            try {
                // Load environment variables
                $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
                $dotenv->load();
                
                // Validate required environment variables
                self::validateConfig();
                
                self::$client = new Client();
                self::$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
                self::$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
                self::$client->setRedirectUri($_ENV['APP_URL'] . '/google-callback');
                self::$client->setAccessType('offline');
                self::$client->setPrompt('select_account consent');
                
                // Add required scopes
                self::$client->addScope("email");
                self::$client->addScope("profile");
            } catch (Exception $e) {
                error_log("Google Client Configuration Error: " . $e->getMessage());
                throw new Exception("Failed to initialize Google client");
            }
        }
        return self::$client;
    }

    private static function validateConfig(): void
    {
        $required = ['GOOGLE_CLIENT_ID', 'GOOGLE_CLIENT_SECRET', 'APP_URL'];
        foreach ($required as $key) {
            if (empty($_ENV[$key])) {
                throw new Exception("Missing required configuration: {$key}");
            }
        }
    }
}