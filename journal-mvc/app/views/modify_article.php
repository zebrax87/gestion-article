<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
    <link rel="stylesheet" href="./mod_delete.css">
</head>
<body>
    <div class="navbar">
        <h1 class="navbar-title">MODIFIER L'ARTICLE</h1>
        <div class="navbar-links">
            <a href="../../public/index.php">Accueil</a>
        </div>
    </div>
    <br>
    <div class="container">
        <h2>Formulaire de modification d'article</h2>
        <form action="update_article.php" method="post">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" required>
            <br>
            <label for="contenu">Contenu :</label>
            <textarea name="contenu" id="contenu" rows="4" required></textarea>
            <br>
            <!-- Ajoute les autres champs du formulaire ici si nécessaire -->
            <br>
            <button type="submit" class="btn btn-primary">Modifier l'article</button>
        </form>
    </div>
</body>
</html>
