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

    public function googleLoginView($mode = 'login') 
{
    // If the route is /google-register, force registration mode
    if ($_SERVER['REQUEST_URI'] === '/google-register') {
        $mode = 'register';
    }
    
    try {
        Session::set('auth_mode', $mode); // Store whether this is login or register
        Session::set('auth_mode', $mode);
        $authUrl = $this->googleAuthService->getAuthUrl();
        header('Location: ' . $authUrl);
        exit();
    } catch (Exception $e) {
        error_log('Google Login Error: ' . $e->getMessage());
        Session::set('error', 'Google authentication is temporarily unavailable');
        header('Location: /login');
        exit();
    }
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
        
        // 1. Check temp_user with more detailed logging
        $tempUser = Session::get('temp_user');
        error_log('Temp user data: ' . print_r($tempUser, true));
        
        if (!$tempUser) {
            error_log('No temp_user found in session');
            throw new Exception('Session expired. Please try again.');
        }

        // 2. Validate POST data
        if (!isset($_POST['role_id'])) {
            error_log('No role_id in POST data');
            throw new Exception('Please select a role');
        }

        $roleId = $_POST['role_id'];
        error_log('Selected role_id: ' . $roleId);

        // 3. Validate role_id is valid (assuming roles are 2 for Owner and 3 for Traveler)
        if (!in_array($roleId, [2, 3])) {
            error_log('Invalid role_id selected: ' . $roleId);
            throw new Exception('Invalid role selected');
        }

        // 4. Check required user data
        $requiredFields = ['username', 'email', 'password'];
        foreach ($requiredFields as $field) {
            if (!isset($tempUser[$field]) || empty($tempUser[$field])) {
                error_log("Missing required field: {$field}");
                throw new Exception('Invalid user data: missing ' . $field);
            }
        }

        // 5. Create user with additional logging
        error_log('Creating user with data: ' . print_r([
            'username' => $tempUser['username'],
            'email' => $tempUser['email'],
            'role_id' => $roleId
        ], true));
        
        $success = $this->userModel->create(
            $tempUser['username'],
            $tempUser['email'],
            $tempUser['phone'] ?? null, // Handle phone from both registration methods
            $tempUser['password'],
            $roleId
        );

        if (!$success) {
            error_log('User creation failed in database');
            throw new Exception('Failed to create user account');
        }
        
        // 6. Get created user
        $user = $this->userModel->findByEmail($tempUser['email']);
        if (!$user) {
            error_log('User not found after creation');
            throw new Exception('User creation verification failed');
        }
        
        // 7. Set session and clean up
        Session::set('user', $user);
        Session::set('authenticated', true);
        Session::set('success', 'Registration successful!');
        
        // Clear temporary data
        Session::set('temp_user', null);
        Session::set('auth_mode', null);

        error_log('Registration successful, redirecting to dashboard');
        if( Session::get('user')->role_id == 3)
        {
            header('Location: /accommodation');
            exit;
        }
        elseif( Session::get('user')->role_id == 1)
        {
            header('Location: /admin');
            exit;
        }
        elseif( Session::get('user')->role_id == 2)
        {
            header('Location: /dashboard');
            exit;
        }
        

    } catch (Exception $e) {
        error_log('Error in selectRole: ' . $e->getMessage());
        error_log('Stack trace: ' . $e->getTraceAsString());
        Session::set('error', $e->getMessage());
        header('Location: /select-role');
        exit;
    }
}

public function googleCallback() 
{
    try {
        if (!isset($_GET['code'])) {
            throw new Exception('Authorization code not provided');
        }

        $mode = Session::get('auth_mode', 'login');
        $result = $this->googleAuthService->handleCallback($_GET['code'], $mode);

        if (!$result->success) {
            throw new Exception($result->error);
        }

        // Debug log to check the data
        error_log('Google callback result: ' . print_r($result, true));

        if ($mode === 'register') {
            if (isset($result->user['email'])) {
                // Store the user data in session with all required fields
                Session::set('temp_user', [
                    'username' => $result->user['name'] ?? explode('@', $result->user['email'])[0],
                    'email' => $result->user['email'],
                    'password' => bin2hex(random_bytes(16))  
                ]);
                
                error_log('Stored temp_user data: ' . print_r(Session::get('temp_user'), true));
                
                header('Location: /select-role');
                exit();
            }
        }

        Session::set('user', $result->user);
        Session::set('authenticated', true);
        
        if( Session::get('user')->role_id == 3)
        {
            header('Location: /accommodation');
            exit;
        }
        elseif( Session::get('user')->role_id == 1)
        {
            header('Location: /admin');
            exit;
        }
        elseif( Session::get('user')->role_id == 2)
        {
            header('Location: /dashboard');
            exit;
        }

    } catch (Exception $e) {
        error_log('Google Callback Error: ' . $e->getMessage());
        Session::set('error', $e->getMessage());
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
        
        // Store user data in session (similar to Google registration)
        Session::set('temp_user', [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'password' => $_POST['password']
        ]);
        
        // Redirect to role selection
        header('Location: /select-role');
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
            //testing
            // Set session
            Session::set('user', $user);
            Session::set('authenticated', true);
            
            if( Session::get('user')->role_id == 3)
        {
            header('Location: /accommodation');
            exit;
        }
        elseif( Session::get('user')->role_id == 1)
        {
            header('Location: /admin');
            exit;
        }
        elseif( Session::get('user')->role_id == 2)
        {
            header('Location: /dashboard');
            exit;
        }
            
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