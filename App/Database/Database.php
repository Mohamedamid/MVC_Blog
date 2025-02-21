<?php 
namespace App\Database;
use Pdo;
class Database {
    private static $instance = null;
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=blog_laravel", "root", "");
    }

    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}
?>