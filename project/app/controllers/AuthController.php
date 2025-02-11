<?php
namespace App\controllers;

use App\classes\Users;
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