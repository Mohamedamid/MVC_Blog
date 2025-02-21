<?php 
namespace Routes;
use App\Controllers\AddArticleController;
use App\Database\Database;
use App\Controllers\ArticleController;
use App\Controllers\RegisterController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;

require_once '../vendor/autoload.php';
class Router
{
    private array $Routes = [
        'GET' => [
            '/' => [articleController::class, 'index'],
            '/login' => [loginController::class, 'login'],
            '/register' => [registerController::class, 'register'],
            '/addarticle' => [ArticleController::class, 'create'],
            '/updateArticle' => [ArticleController::class, 'edit'],
            '/delete' => [ArticleController::class, 'delete'],
            '/logout' => [LogoutController::class, 'logout']
        ],
        'POST' => [
            '/login' => [loginController::class, 'login'],
            '/register' => [registerController::class, 'register'],
            '/addarticle' => [ArticleController::class, 'create'],
            '/updateArticle' => [ArticleController::class, 'edit']        ]
    ];

    public function dispatch($uri, $method){
       
        if(isset($this->Routes[$method][$uri])){
            $class = $this->Routes[$method][$uri][0];
            $function = $this->Routes[$method][$uri][1];
            $route = new $class;
            $route->$function();
        }else{
            echo 'not found 404';
        }

    }

}