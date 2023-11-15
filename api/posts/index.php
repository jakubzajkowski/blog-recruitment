<?php
require_once __DIR__."/../../vendor/autoload.php";
header("Content-Type: application/json");
if (true) {
    try {
        $postController = new \app\src\PostController();
        $response = $postController->getPosts();
        echo json_encode($response);
    }catch (Exception $e){
        echo json_encode(['error'=>$e]);
    }
}