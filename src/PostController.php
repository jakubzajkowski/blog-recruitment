<?php

namespace app\src;

class PostController {
    private Database $database;
    public function __construct() {
        $this->database=new Database();
    }
    public function getPosts(){
        $result = $this->database->query("SELECT * FROM `posts`");
        return $this->database->fetchArray($result);
    }

}