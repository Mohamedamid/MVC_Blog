<?php
namespace App\Models;
use App\Database\Database;
use PDOException;

class Article {
    private $id;
    private $title;
    private $content;

    public function __construct($title, $content, $id = null) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    private function getConnection(){
        return Database::getConnection();
    }

    public function create($user_id, $category) {
        try {
            $conn = $this->getConnection();
            $stmt = $conn->prepare('INSERT INTO article(title, content, user_id, id_category) VALUES(:title, :content, :user_id, :id_category)');
            $stmt->execute([
                ':title' => $this->title,
                ':content' => $this->content,
                ':user_id' => $user_id,
                ':id_category' => $category
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($category) {
        try {
            $conn = $this->getConnection();
            $stmt = $conn->prepare('UPDATE article SET title = :title, content = :content, id_category = :categoryid WHERE id = :id');
            $stmt->execute([
                ':title' => $this->title,
                ':content' => $this->content,
                ':categoryid' => $category,
                ':id' => $this->id
            ]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function displayAll() {
        try {
            $conn = $this->getConnection();
            $stmt = $conn->prepare('SELECT ar.id, ar.title, ar.content, cat.name FROM article ar JOIN category cat ON cat.id = ar.id_category');
            $stmt->execute();
            $articles = $stmt->fetchAll();
            return $articles ? $articles : [];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function delete() {
        try {
            $conn = $this->getConnection();
            $stmt = $conn->prepare('DELETE FROM article WHERE id = :id');
            $stmt->execute([':id' => $this->id]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function displayCategory() {
        try {
            $conn = $this->getConnection();
            $stmt = $conn->prepare("SELECT * FROM category");
            $stmt->execute();
            $category = $stmt->fetchAll();
            return $category;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}
