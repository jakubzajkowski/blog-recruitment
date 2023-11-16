<?php
require_once __DIR__ . "/../../vendor/autoload.php";
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $postController = new \app\src\PostController();

        echo json_encode($response);
    } catch (Error $e) {
        echo json_encode(['error' => $e]);
    }
}