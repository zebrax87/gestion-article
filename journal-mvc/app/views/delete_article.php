<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer l'article</title>
    <link rel="stylesheet" href="./mod_delete.css">
</head>
<body>
    <div class="navbar">
        <h1 class="navbar-title">SUPPRIMER L'ARTICLE</h1>
        <div class="navbar-links">
            <a href="../../public/index.php">Accueil</a>
        </div>
    </div>
    <br>
    <div class="container">
        <h2>Confirmation de suppression</h2>
        <p>Êtes-vous sûr de vouloir supprimer cet article ?</p>
        <form action="../../public/index.php?action=delete" method="post">
            <!-- Ajoute un champ caché pour stocker l'ID de l'article à supprimer -->
            <input type="hidden" name="article_id" value="<?php echo $_GET['id']; ?>">
            <button type="submit" name="id" value="<?php echo $_GET['id']; ?>" class="btn btn-danger">Oui, supprimer l'article</button>
            <a href="index.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>
