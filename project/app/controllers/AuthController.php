<?php
namespace App\controllers;

use App\classes\Users;
use App\core\Controller;
use App\core\Session;
use App\requests\LoginRequest;
use App\requests\RegisterRequest;
use App\controllers\AuthService;
use Exception;

class AuthController extends Controller
{
    private $userModel;
    private $googleAuthService;

    public function __construct() 
    {
        Session::start();
        $this->userModel = new Users();
        $this->googleAuthService = new AuthService($this->userModel);
    }

    public function registerview()
    {
        $roles = $this->userModel->getRoles();
        $this->view('register', ['roles' => $roles]); 
    }

    public function loginView()
    {
        $this->view('login'); 
    }

    public function selectRoleView() 
    {
        if (!Session::get('temp_user')) {
            header('Location: /login');
            exit;
        }
        
        $roles = $this->userModel->getRoles();
        $this->view('select_role', ['roles' => $roles]);
    }

    public function selectRole() 
    {
        try {
            error_log('SelectRole method called');
            
            // 1. Check temp_user
            $tempUser = Session::get('temp_user');
            error_log('Temp user data: ' . print_r($tempUser, true));
            
            if (!$tempUser) {
                error_log('No temp_user found in session');
                throw new Exception('Session expired. Please try again.');
            }
    
            // 2. Check role_id
            $roleId = $_POST['role_id'] ?? null;
            error_log('POST data: ' . print_r($_POST, true));
            error_log('Selected role_id: ' . $roleId);
            
            if (!$roleId) {
                throw new Exception('Role not selected');
            }
    
            // 3. Verify we have all required user data
            if (!isset($tempUser['username']) || !isset($tempUser['email']) || !isset($tempUser['password'])) {
                error_log('Missing required user data');
                throw new Exception('Invalid user data');
            }
    
            // 4. Check if email already exists
            $existingUser = $this->userModel->findByEmail($tempUser['email']);
            if ($existingUser) {
                error_log('Email already exists: ' . $tempUser['email']);
                throw new Exception('Email already registered');
            }
            
            // 5. Create user
            error_log('Attempting to create user with data: ' . print_r([
                'username' => $tempUser['username'],
                'email' => $tempUser['email'],
                'role_id' => $roleId
            ], true));
            
            $success = $this->userModel->create(
                $tempUser['username'],
                $tempUser['email'],
                null,
                $tempUser['password'],
                $roleId
            );
    
            if (!$success) {
                error_log('User creation failed');
                throw new Exception('Failed to create user account');
            }
            
            error_log('User created successfully');
    
            // 6. Get and verify created user
            $user = $this->userModel->findByEmail($tempUser['email']);
            if (!$user) {
                error_log('Could not find created user');
                throw new Exception('User creation verification failed');
            }
            
            // 7. Set session
            Session::set('user', $user);
            Session::set('authenticated', true);
    
            error_log('Redirecting to dashboard');
            header('Location: /dashboard');
            exit;
    
        } catch (Exception $e) {
            error_log('Error in selectRole: ' . $e->getMessage());
            error_log('Stack trace: ' . $e->getTraceAsString());
            Session::set('error', $e->getMessage());
            header('Location: /select-role');
            exit;
        }
    }

    public function googleLoginView() 
    {
        try {
            $authUrl = $this->googleAuthService->getAuthUrl();
            header('Location: ' . $authUrl);
            exit();
        } catch (Exception $e) {
            error_log('Google Login Error: ' . $e->getMessage());
            Session::set('error', 'Google login is temporarily unavailable');
            header('Location: /login');
            exit();
        }
    }

    public function googleCallback() 
{
    try {
        if (!isset($_GET['code'])) {
            throw new Exception('Authorization code not provided');
        }

        $result = $this->googleAuthService->handleCallback($_GET['code']);

        if (!$result->success) {  // Changed from array to object access
            throw new Exception($result->error);
        }

        // Check if the user property is an array with needsRole
        if (is_array($result->user) && isset($result->user['needsRole'])) {
            header('Location: ' . $result->user['redirectTo']);
            exit();
        }

        // Set user session
        Session::set('user', $result->user);
        Session::set('authenticated', true);
        
        header('Location: /dashboard');
        exit();

    } catch (Exception $e) {
        error_log('Google Callback Error: ' . $e->getMessage());
        Session::set('error', 'Google authentication failed: ' . $e->getMessage());
        header('Location: /login');
        exit();
    }
}
    
    public function register() 
    {
        try {
            $request = new RegisterRequest($_POST);
            
            if (!$request->validate()) {
                Session::set('error', $request->getErrors());
                header('Location: /register');
                exit;
            }
            
            // Check if email already exists
            if ($this->userModel->findByEmail($_POST['email'])) {
                Session::set('error', 'Email already exists');
                header('Location: /register');
                exit;
            }
            
            // Check if username already exists
            if ($this->userModel->findByUsername($_POST['username'])) {
                Session::set('error', 'Username already exists');
                header('Location: /register');
                exit;
            }
            
            // Get role_id from POST data
            $roleId = $_POST['role_id'] ?? 3; // Default to Traveler if not specified
            
            // Create user with role
            $success = $this->userModel->create(
                $_POST['username'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['password'],
                $roleId
            );
            
            if (!$success) {
                throw new Exception('Failed to create account');
            }
            
            Session::set('success', 'Registration successful! Please login.');
            header('Location: /login');
            exit;
            
        } catch (Exception $e) {
            error_log('Registration Error: ' . $e->getMessage());
            Session::set('error', $e->getMessage());
            header('Location: /register');
            exit;
        }
    }
    
    public function login() 
    {
        try {
            $request = new LoginRequest($_POST);
            
            if (!$request->validate()) {
                Session::set('error', $request->getErrors());
                header('Location: /login');
                exit;
            }
            
            $user = $this->userModel->findByEmail($_POST['email']);
            
            if (!$user || !password_verify($_POST['password'], $user->password)) {
                Session::set('error', 'Invalid email or password');
                header('Location: /login');
                exit;
            }
            
            // Set session
            Session::set('user', $user);
            Session::set('authenticated', true);
            
            header('Location: /dashboard');
            exit;
            
        } catch (Exception $e) {
            error_log('Login Error: ' . $e->getMessage());
            Session::set('error', $e->getMessage());
            header('Location: /login');
            exit;
        }
    }
    
    public function logout() 
    {
        Session::destroy();
        header('Location: /login');
        exit;
    }
}