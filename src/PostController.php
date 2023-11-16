<?php

namespace app\src;

class PostController {
    public Database $database;
    public function __construct() {
        $this->database=new Database();
    }
    public function getPosts():array{
        $result = $this->database->query("SELECT * FROM `posts` ORDER BY date DESC");
        return $this->database->fetchArray($result);
    }
    public function getPost(int $id):array{
        $result = $this->database->query("SELECT * FROM `posts` WHERE id=$id");
        return $this->database->fetchArray($result);
    }
    public function updatePost(int $id,string $title,string $description,string $content, string $author, string $img){
        $query="UPDATE `posts` SET title = $title, description = $description,content=$content, author = $author, img = $img  WHERE id=$id";
        $result = $this->database->query($query);
        return $this->database->fetchArray($result);
    }
    public function createPost(string $title,string $description,string $content, string $author, string $img){
        $query="INSERT INTO `posts`(`title`, `description`, `content`, `author`, `img`) VALUES ('$title', '$description', '$content', '$author', '$img')";
        $result = $this->database->query($query);
        return$this->database->fetchArray($result);
    }
    public function deletePost(int $id){
        $result = $this->database->query("DELETE FROM `posts` WHERE id=$id");
        return $result;
    }
}