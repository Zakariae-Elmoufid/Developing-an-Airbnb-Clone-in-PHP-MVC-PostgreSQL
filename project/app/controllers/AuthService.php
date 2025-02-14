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

    public function handleCallback(string $code, string $mode = 'login'): object
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

            // Check if user exists
            $existingUser = $this->userModel->findByEmail($google_user->email);

            if ($mode === 'login') {
                if (!$existingUser) {
                    return (object)[
                        'success' => false,
                        'error' => 'No account found with this email. Please register first.'
                    ];
                }
                return (object)[
                    'success' => true,
                    'user' => $existingUser
                ];
            }

            // Handle registration
            if ($mode === 'register') {
                if ($existingUser) {
                    return (object)[
                        'success' => false,
                        'error' => 'Email already registered. Please login instead.'
                    ];
                }

                // Store temp user data for role selection
                $tempUser = [
                    'username' => $google_user->name ?? explode('@', $google_user->email)[0],
                    'email' => $google_user->email,
                    'password' => bin2hex(random_bytes(16))
                ];
                
                Session::set('temp_user', $tempUser);
                
                return (object)[
                    'success' => true,
                    'user' => [
                        'needsRole' => true,
                        'redirectTo' => '/select-role'
                    ]
                ];
            }

        } catch (Exception $e) {
            error_log("Google callback error: " . $e->getMessage());
            return (object)[
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}