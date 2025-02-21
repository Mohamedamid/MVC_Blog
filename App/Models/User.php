<?php

namespace App\Models;

use App\Database\Database;

use Pdo;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($email, $password, $id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function Login(): bool
    {

            $pdo = new Database();
            $conn = $pdo::getConnection();

            $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                return true;
            } else {
                return false;
            }

    }
    public function Register(): mixed
    {
        $pdo = new Database();
        $conn = $pdo::getConnection();
        $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $result = $stmt->execute();
        return $result;
    }
}
?>