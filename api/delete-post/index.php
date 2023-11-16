<?php
require_once __DIR__ . "/../../vendor/autoload.php";
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $postController = new \app\src\PostController();
        $data = file_get_contents("php://input");
        $req = json_decode($data, true);
        $id=$req['id'];
        $result = $postController->deletePost($id);
        echo $result;
    } catch (Error $e) {
        echo json_encode(['error' => $e]);
    }
}