<?php

namespace App\controllers;


class JsonResponse {
    public static function send($data, int $status = 200): void {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }
}