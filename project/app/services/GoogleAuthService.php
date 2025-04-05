<?php
namespace App\services;

use App\config\Google;
use App\classes\Users;
use App\core\Session;
use Exception;
use Google\Service\Oauth2;

class GoogleAuthService
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

    public function handleCallback(string $code): array
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
            $user = $this->findOrCreateUser($google_user);

            return [
                'success' => true,
                'user' => $user
            ];

        } catch (Exception $e) {
            error_log("Google callback error: " . $e->getMessage());
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    private function findOrCreateUser($google_user): object
    {
        try {
            // Check if user exists by email
            $user = $this->userModel->findByEmail($google_user->email);

            if (!$user) {
                // Generate username from email if name not provided
                $username = $google_user->name ?? explode('@', $google_user->email)[0];
                
                // Generate a random password for Google users
                $password = bin2hex(random_bytes(16));
                
                // Create new user
                $success = $this->userModel->create(
                    $username,
                    $google_user->email,
                    null, // phone is optional
                    $password
                );

                if (!$success) {
                    throw new Exception("Failed to create user account");
                }

                // Fetch the newly created user
                $user = $this->userModel->findByEmail($google_user->email);
                
                if (!$user) {
                    throw new Exception("Failed to retrieve created user");
                }
            }

            return $user;

        } catch (Exception $e) {
            error_log("User creation/fetch error: " . $e->getMessage());
            throw new Exception("Failed to process user data");
        }
    }
}