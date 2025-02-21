<?php 
namespace App\Controllers;
use App\Models\User;
// use App\Database\Database;

class RegisterController{

    public function register(): void{
        if(isset($_POST['submit'])){
            $newUser = new User( $_POST['email'], $_POST['password'], null, $_POST['username'],);
            $result = $newUser->Register();
            if ($result){
                echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                            <span class='block sm:inline'>Inscription réussie</span>
                        </div>";
            } else {
                echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                            <span class='block sm:inline'>Échec de l'inscription</span>
                        </div>";
            }
            require 'Resources/Views/Register.php';
        }else{
            require 'Resources/Views/Register.php';
        }
    }
}