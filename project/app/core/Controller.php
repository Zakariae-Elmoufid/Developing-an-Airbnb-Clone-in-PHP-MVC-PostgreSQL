<?php

namespace App\core;


class Controller
{
    protected function view($view, $data = [])
    {
        $viewPath = __DIR__ . '/../views/' . str_replace('.', '/', $view) . '.php';
    
        if (file_exists($viewPath)) {
            // Extract data to make variables available to view
            extract($data);
            require_once $viewPath;
        } else {
            die("View '$view' not found!");
        }
    }

    protected function redirect($file)
    {
        var_dump($file);
        exit;
        require_once __DIR__ . '/../views/'.$file;
        exit;
    }

    protected function isAuthenticated($role)
    {
        return Session::get('id') !== null && Session::get('role') === $role;
    }

    protected function requireAuth()
    {
        if (!$this->isAuthenticated()) {
            Session::setFlash('error', 'you must login.');
            $this->redirect('/login');
        }
    }

    public function users($table) {
        $data = findAll($table);
        return $data;
    }

}
