<?php

// app/dao/ArticleDAO.php

require_once __DIR__ . '/../../config.php';

class ArticleDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Méthode pour récupérer tous les articles ou les articles filtrés par catégorie
    public function getAllArticles($categorie = null) {
        $sql = "SELECT Article.id, Article.titre, Article.contenu, Article.dateCreation, Categorie.libelle 
            FROM Article 
            INNER JOIN Categorie ON Article.categorie = Categorie.id";

        if ($categorie) {
            $sql .= " WHERE Categorie.libelle = '$categorie'";
        }

        $sql .= " ORDER BY Article.dateCreation DESC";

        $result = $this->conn->query($sql);
        $articles = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $articles[] = $row;
            }
        }

        return $articles;
    }

    public function addArticle($article) {
        // Récupérer les valeurs des champs de l'article
        $titre = $this->conn->real_escape_string($article['titre']);
        $contenu = $this->conn->real_escape_string($article['contenu']);
        $categorie = $this->conn->real_escape_string($article['categorie']);
        // Récupérer les autres champs du formulaire ici si nécessaire

        // Créer la requête SQL pour l'insertion
        $sql = "INSERT INTO article (titre, contenu, categorie) VALUES ('$titre', '$contenu', '$categorie')";
        // Ajoute les autres champs du formulaire à la requête SQL si nécessaire

        // Exécuter la requête
        $result = $this->conn->query($sql);

        return $result;
    }

    // Méthode pour récupérer un article par son ID
    public function getArticleById($id) {
        // Vérifier si l'ID est valide
        if (!is_numeric($id) || $id <= 0) {
            return null;
        }

        $sql = "SELECT Article.id, Article.titre, Article.contenu, Article.dateCreation, Categorie.libelle 
            FROM Article 
            INNER JOIN Categorie ON Article.categorie = Categorie.id
            WHERE Article.id = $id";

        $result = $this->conn->query($sql);

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Méthode pour mettre à jour un article dans la base de données
    public function updateArticle($article) {
        // Vérifier si l'ID de l'article est valide
        if (!isset($article['id']) || !is_numeric($article['id']) || $article['id'] <= 0) {
            return false;
        }

        // Récupérer les valeurs des champs de l'article
        $id = $article['id'];
        $titre = $this->conn->real_escape_string($article['titre']);
        $contenu = $this->conn->real_escape_string($article['contenu']);
        // Récupérer les autres champs du formulaire ici si nécessaire

        // Créer la requête SQL pour la mise à jour
        $sql = "UPDATE article SET titre='$titre', contenu='$contenu' WHERE id=$id";
        // Ajouter les autres champs du formulaire à la requête SQL si nécessaire

        // Exécuter la requête
        $result = $this->conn->query($sql);

        return $result;
    }

    // Méthode pour supprimer un article par son ID
    public function deleteArticleById($id) {
        // Vérifiez si l'ID de l'article est valide
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }

        // Créer la requête SQL pour la suppression de l'article
        $sql = "DELETE FROM Article WHERE id = $id";

        // Exécuter la requête
        $result = $this->conn->query($sql);

        // Vérifier si la suppression a réussi
        return $this->conn->affected_rows > 0;
    }

    // ...
}

