<?php
namespace App\controllers;

use App\classes\Users;
use App\config\Google;
use App\core\Controller;
use App\core\Session;
use App\requests\LoginRequest;
use App\requests\RegisterRequest;

class AuthController extends Controller
{
    private $authService;

    public function __construct() {
        Session::start();
        $this->authService = new AuthService(new Users());
    }

    public function registerview(){
        $this->view('register'); 
      }
      public function loginView(){
        $this->view('login'); 
      }

      public function googleLoginView() {
        $client = Google::getClient();
        $google_login_url = $client->createAuthUrl();
      
        header('Location: ' . $google_login_url); 
        exit();
    }

    public function googleCallback() {
   
        error_log('Entering Google Callback...');

        $client = Google::getClient();
      
        if (isset($_GET['code'])) {
            // Exchange the authorization code for an access token
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            error_log('Token: ' . print_r($token, true));

           
            
            if (!isset($token['error'])) {
                $client->setAccessToken($token);
                $google_service = new \Google\Service\Oauth2($client);
                $google_user = $google_service->userinfo->get(); // Fetch the user info
                error_log('User Data: ' . print_r($google_user, true));


                // Handle the user data (save to session or database)
                Session::set('user', [
                    'id' => $google_user->id,
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'picture' => $google_user->picture
                ]);

                header('Location: /dashboard');
                exit();
            } else {
                error_log('Google API error: ' . print_r($token, true));
                Session::set('error', 'Error fetching Google user data.');
                header('Location: /login');
                exit();
            }
        }
    }

          
  
    
    public function showLoginForm() {
        return require_once __DIR__ . '/../../views/login.php';
    }
    
    public function showRegisterForm() {
        return require_once __DIR__ . '/../../views/register.php';
    }
    
    public function register() {
        try {
            $request = new RegisterRequest($_POST);
            
            if (!$request->validate()) {
                Session::set('error', $request->getErrors());
                header('Location: /register');
                exit;
            }
            
            $this->authService->register($request->getData());
            
            Session::set('success', 'Registration successful! Please login.');
            header('Location: /login');
            exit;
            
        } catch (\Exception $e) {
            Session::set('error', $e->getMessage());
            header('Location: /register');
            exit;
        }
    }
    
    public function login() {
        try {
            $request = new LoginRequest($_POST);
            
            if (!$request->validate()) {
                Session::set('error', $request->getErrors());
                header('Location: /login');
                exit;
            }
            
            $this->authService->login($request->getData());
            
            header('Location: /dashboard');
            exit;
            
        } catch (\Exception $e) {
            Session::set('error', $e->getMessage());
            header('Location: /login');
            exit;
        }
    }
    
    public function logout() {
        Session::destroy();
        setcookie('remember_token', '', time() - 3600, '/');
        header('Location: /login');
        exit;
    }
      
}