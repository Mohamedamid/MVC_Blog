<?php 
namespace App\Controllers;
use App\Models\User;

class LoginController
{
    public function login(): void{
        if(isset($_POST['submit'])){
            $userLogin = new User($_POST['email'],$_POST['password']);
            $return = $userLogin->Login();
            if($return){
                // require 'Resources/Views/articleView.php';
                header('location: /');
            }else{
                require 'Resources/Views/Login.php';
            }
            
        }else{
            require 'Resources/Views/Login.php';
        } 
    }
}