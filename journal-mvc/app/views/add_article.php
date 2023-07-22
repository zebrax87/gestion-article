<!-- app/views/add_article.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="navbar">
        <h1 class="navbar-title">AJOUTER UN ARTICLE</h1>
        <div class="navbar-links">
            <a href="../../public/index.php">Accueil</a>
        </div>
    </div>
    <br>
    <div class="container">
        <h2>Formulaire d'ajout d'article</h2>
        <form action="../../public/index.php?action=save" method="post">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" required>
            <br>
            <label for="contenu">Contenu :</label>
            <textarea name="contenu" id="contenu" rows="4" required></textarea>
            <br>
            <label for="categorie">Catégorie :</label>
            <select name="categorie" id="categorie" required>
                <option value="1">Sport</option>
                <option value="2">Santé</option>
                <option value="3">Éducation</option>
                <option value="4">Politique</option>
            </select>
            <!-- Ajoute les autres champs du formulaire ici si nécessaire -->
            <br>
            <button type="submit">Ajouter l'article</button>
        </form>
    </div>
</body>
</html>
