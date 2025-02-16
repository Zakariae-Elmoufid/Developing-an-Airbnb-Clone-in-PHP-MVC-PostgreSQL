<?php

namespace App\core;


class Controller
{
    protected function view($view, $data = [])

    { 
        
        extract($data);

        $viewPath = __DIR__ . '/../views/' . str_replace('.', '/', $view) . '.php';
    
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("View '$view' not found!");
        }
    }

    protected function redirect($file)
    {
        header("Location:".$file);
        exit;
    }

    protected function isAuthenticated($role)
    {
        $user = Session::get('user');
        return isset($user) && $user->id !== null && $user->role_id === $role;
    }

    protected function requireAuth($role)
    {
        if (!$this->isAuthenticated($role)) {
            Session::setFlash('error', 'you must login.');
            $this->redirect('/login');
        }
    }

    public function users($table) {
        $data = findAll($table);
        return $data;
    }

}
