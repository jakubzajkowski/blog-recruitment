<?php
require_once __DIR__."/../../vendor/autoload.php";
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $postController = new \app\src\PostController();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $response = $postController->getPost($id)[0];
        }
        else{
            $response = $postController->getPosts();
        }
        echo json_encode($response);
    }catch (Error $e){
        echo json_encode(['error'=>$e]);
    }
}