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
        $query="UPDATE `posts` SET title = :title, description = :description,content=:content, author = :author, img =:img  WHERE id=:id";
        $statement = $this->database->pdo->prepare($query);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':content', $content);
        $statement->bindParam(':author', $author);
        $statement->bindParam(':img', $img);
        $statement->bindParam(':id', $id);

        $statement->execute();
        return "updated";
    }
    public function createPost(string $title,string $description,string $content, string $author, string $img){
        $query = "INSERT INTO `posts`(`title`, `description`, `content`, `author`, `img`) VALUES (:title, :description, :content, :author, :img)";
        $statement = $this->database->pdo->prepare($query);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':content', $content);
        $statement->bindParam(':author', $author);
        $statement->bindParam(':img', $img);

        $statement->execute();
        return "added";
    }
    public function deletePost(int $id){
        $check = $this->database->query("SELECT * FROM `posts` WHERE id=$id");
        if ($check){
            $result = $this->database->query("DELETE FROM `posts` WHERE id=$id");
            return "Post deleted";
        }
        else{
            return "No post with that id";
        }
    }
}