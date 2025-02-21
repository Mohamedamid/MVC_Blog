<?php
namespace App\Controllers;
use App\Models\Article;

class ArticleController
{
    public function index()
    {
        $affichage = new Article(null, null);
        $articles = $affichage->displayAll();
        require 'Resources/Views/articleView.php';
    }
    public function create()
    {
        $result = new Article(null, null, null);
        $categories = $result->displayCategory();
        if (isset($_POST['Ajouter'])) {
            $addArticle = new Article($_POST['title'], $_POST['content']);
            $addArticle->create($_SESSION['user_id'], $_POST['category']);
            echo "<script>
         document.addEventListener('DOMContentLoaded', function() {
             Swal.fire({
                 icon: 'success',
                 title: 'Inscription réussie',
                 showConfirmButton: false,
                 timer: 2000
             });
         });
       </script>";
            require 'Resources/Views/addArticle.php';
        } else {
            require 'Resources/Views/addArticle.php';
        }
    }
    public function edit()
    {
        $result = new Article(null, null, null);
        $categories = $result->displayCategory();



        if (isset($_POST['modifier'])) {
            $addArticle = new Article($_POST['title'], $_POST['content'], $_GET['id']);
            $addArticle->update( $_POST["category"]);
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Modifier réussie',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
          </script>";
            // require 'Resources/Views/articleView.php';
            header('location: /');
            exit;
        } else {
            require 'Resources/Views/updateArticle.php';

        }
    }
    public function delete()
    {
        $deleteArticle = new Article(null, null, $_GET['id']);
        $deleteArticle->delete();
        header('location: /');
    }

}