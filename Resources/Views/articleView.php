<?php
if(!isset($_SESSION['user_id'])){
    header('location: /login');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Blog avec Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-200">
    <!-- Header & Navbar -->
    <header class="bg-purple-700 text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-3xl font-extrabold">Blog MVC</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="/" class="hover:text-gray-300">Accueil</a></li>
                    <li><a href="/addarticle" class="hover:text-gray-300">Ajouter un article</a></li>
                    <li><a href="/logout" class="hover:text-gray-300">logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contenu Home -->
    <main class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-6 text-gray-700">Liste des Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($articles as $article){?>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-purple-700"> <?= $article['title']?> </h3>
                <p class="text-gray-600 font-medium">Catégorie: <?= $article['name']?> </p>
                <p class="text-gray-700 mt-2"> <?= substr($article['content'], 0, 100) . '...'; ?> </p>
                <div class="mt-4 flex justify-between">
                    <a href="updateArticle?id=<?= $article['id']?>" class="text-blue-500 hover:text-blue-700 font-medium">Modifier</a>
                    <a href="delete?id=<?= $article['id']?>" class="text-red-500 hover:text-red-700 font-medium">Supprimer</a>
                </div>
            </div>
            <?php }?>
        </div>
    </main>
</body>
</html>