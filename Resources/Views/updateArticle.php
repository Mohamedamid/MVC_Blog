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
        <!-- Formulaire Ajouter un Article -->
        <div class="mt-10 bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Modifier un Article</h2>
            <form action="" method="POST" class="space-y-4">
                <div>
                    <label class="block text-gray-700">Titre de l'Article</label>
                    <input type="text" name="title" placeholder="Your title...."
                        class="w-full p-2 border border-gray-300 rounded mt-1" required>
                </div>
                <div>
                    <label class="block text-gray-700">Contenu</label>
                    <textarea name="content" rows="5" placeholder="Your content...."
                        class="w-full p-2 border border-gray-300 rounded mt-1" required></textarea>
                </div>
                <div>
                    <label class="block text-gray-700">Catégorie</label>
                    <select name="category" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                        <option value="" selected>Choisir votre catégorie</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['id'] ?>"> <?= $category['name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="modifier"
                        class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800">Modifier</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>