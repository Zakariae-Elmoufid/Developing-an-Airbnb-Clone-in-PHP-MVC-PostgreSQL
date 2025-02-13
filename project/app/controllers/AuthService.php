<?php
namespace App\controllers;

use App\config\Google;
use App\classes\Users;
use App\core\Session;
use Exception;
use Google\Service\Oauth2;

class AuthService
{
    private $userModel;

    public function __construct(Users $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAuthUrl(): string
    {
        try {
            $client = Google::getClient();
            return $client->createAuthUrl();
        } catch (Exception $e) {
            error_log("Failed to create auth URL: " . $e->getMessage());
            throw new Exception("Authentication system temporarily unavailable");
        }
    }

    public function handleCallback(string $code): object
{
    try {
        $client = Google::getClient();
        $token = $client->fetchAccessTokenWithAuthCode($code);

        if (isset($token['error'])) {
            throw new Exception($token['error_description'] ?? 'Failed to get access token');
        }

        $client->setAccessToken($token);
        
        // Get user info from Google
        $google_service = new Oauth2($client);
        $google_user = $google_service->userinfo->get();

        // Find or create user
        $result = $this->findOrCreateUser($google_user);

        return (object)[
            'success' => true,
            'user' => $result
        ];

    } catch (Exception $e) {
        error_log("Google callback error: " . $e->getMessage());
        return (object)[
            'success' => false,
            'error' => $e->getMessage()
        ];
    }
}

    private function findOrCreateUser($google_user): object|array
    {
        try {
            // Check if user exists by email
            $user = $this->userModel->findByEmail($google_user->email);

            if (!$user) {
                // Store temporary user data in session
                $tempUser = [
                    'username' => $google_user->name ?? explode('@', $google_user->email)[0],
                    'email' => $google_user->email,
                    'password' => bin2hex(random_bytes(16))
                ];
                
                Session::set('temp_user', $tempUser);
                
                return [
                    'needsRole' => true,
                    'redirectTo' => '/select-role'
                ];
            }

            return $user;

        } catch (Exception $e) {
            error_log("User creation/fetch error: " . $e->getMessage());
            throw new Exception("Failed to process user data");
        }
    }
}