<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités Polytechniciennes</title>
    <link rel="stylesheet" href="./styles.css">
    <!-- Ajoute le lien vers le fichier Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="navbar">
        <h1 class="navbar-title">ACTUALITES POLYTECHNICIENNE</h1>
        <div class="navbar-links">
            <a href="index.php">Toutes</a>
            <a href="index.php?categorie=sport">Sport</a>
            <a href="index.php?categorie=sante">Santé</a>
            <a href="index.php?categorie=education">Education</a>
            <a href="index.php?categorie=politique">Politique</a>
            <!-- Ajoute le bouton Bootstrap pour ajouter un article -->
            <a href="./../app/views/add_article.php" class="btn btn-primary">Ajouter un article</a>
        </div>
    </div>
    <br>
    <div class="actualites">
        <h2>Les dernières actualités</h2>
    </div>

    <?php if (isset($_GET['delete_success']) && $_GET['delete_success'] === 'true'): ?>
    <p>L'article a été supprimé avec succès.</p>
    <?php endif; ?>

    <?php if (isset($_GET['delete_error']) && $_GET['delete_error'] === 'true'): ?>
        <p>Une erreur s'est produite lors de la suppression de l'article.</p>
    <?php endif; ?>

    <div class="container">
        <!-- Le reste du contenu de la page -->
    </div>

    <div class="container">
        <?php foreach ($articles as $article): ?>
            <div class="container-child">
                <h3><?php echo $article['titre']; ?></h3>
                <p><?php echo $article['contenu']; ?></p>
                <!-- Ajouter les boutons Modifier et Supprimer pour chaque article -->
                <div class="d-flex">
                    <a href="./../app/views/modify_article.php?id=<?php echo $article['id']; ?>" class="btn btn-primary mr-2">Modifier</a>
                    <a href="./../app/views/delete_article.php?action=delete&id=<?php echo $article['id']; ?>" class="btn btn-danger delete-btn">Supprimer</a>
                </div>
                <br>
            </div>
        <?php endforeach; ?>
        <?php if (empty($articles)): ?>
            <p>Aucun article trouvé.</p>
        <?php endif; ?>
    </div>

</body>
</html>

