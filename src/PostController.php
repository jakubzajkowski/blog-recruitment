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
    public function getPost(string $id):array{
        $result = $this->database->query("SELECT * FROM `posts` WHERE id=$id");
        return $this->database->fetchArray($result);
    }
}