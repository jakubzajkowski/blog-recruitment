<?php
require_once __DIR__ . "/../../vendor/autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $postController = new \app\src\PostController();
        $title = $_POST['title'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $urlImg = '';

        if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
            $dir = "../../uploads/";
            $file = $dir . basename($_FILES["img"]["name"]);
            move_uploaded_file($_FILES["img"]["tmp_name"], $file);
            $urlImg="/blog/uploads/".$_FILES['img']['name'];
        }
        $postController->createPost($title,$description,$content,$author,$urlImg);

        echo "Post Added";
        header("Location: /blog/admin");
        exit;
    } catch (Error $e) {
        echo "Error not added";
    }
}